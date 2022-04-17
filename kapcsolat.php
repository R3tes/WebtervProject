<?php
    include_once("classes/Uzenet.php");
    include_once "common/fuggvenyek.php";
    session_start();

    $uzenetek = adatokBetoltese("data/uzenetek.txt");

    $hibak = [];

    if (isset($_POST["kontaktelkuld"])) {
        $teljesNev = $_POST["kontaktteljesnev"];
        $kontaktEmail = $_POST["kontaktemailcim"];
        $uzenet = $_POST["kontaktuzenete"];

        if (trim($teljesNev) === "" || trim($kontaktEmail) === "" || trim($uzenet) === "") {
            $hibak[] = "Nem töltött ki minden mezőt!";
        }

        if (!preg_match("/[0-9a-z.-]+@([0-9a-z-]+\.)+[a-z]{2,4}/", $kontaktEmail)) {
            $hibak[] = "A megadott e-mail cím formátuma nem megfelelő!";
        }

        if (count($hibak) === 0) {
            $ujuzenet = new Uzenet($teljesNev, $kontaktEmail, $uzenet);
            $uzenetek[] = $ujuzenet;
            adatokMentese("data/uzenetek.txt", $uzenetek);
            header("Location: kapcsolat.php?sikeresUzi=true");
        }

    }

?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <title>Gameter</title>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="assets/css/style.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/img/flameicon_with_letters.png"/>
</head>
<body>
<!-- FEJLÉC/MENÜ -->

<?php
    include_once "common/header.php";
?>

<!-- FŐ TARTALOM -->
<main>
    <section>
        <h2>Ha kérdése van, esetleg valamilyen problémát észlelt, lépjen kapcsolatba velünk!</h2>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2759.131819859142!2d20.144824815755417!3d46.24760718884785!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4744886ffd180d6f%3A0x30f85d1d5e79483d!2sSzeged%2C%20Aradi%20v%C3%A9rtan%C3%BAk%20tere%2C%206720!5e0!3m2!1sen!2shu!4v1646916792093!5m2!1sen!2shu" class="kontaktterkep"></iframe>
        <div class="kontaktinfo">
            <p>Gameter NVC.</p>
            <p>Nemlétező tér 66, Szeged, 6720</p>
            <p>Telefonszám: 767(5544)296-29-11</p>
            <p>(Hétfőtől-péntekig: 08:00-tól 18:00-ig, Szombaton: 08:00-15-00-ig)</p>
            <p>E-mail cím: <span class="kiemeltSzoveg">customer@gameter.hu</span></p>
        </div>
        <hr class="invisiblepagebreak">
        <h2>Amennyiben hibát észlel, forduljon ügyfélszolgálatunkhoz:</h2>

            <?php

                if(isset($_GET["sikeresUzi"])) {
                    echo "<div class='sikeres'><p>Az üzenetét sikeresen megkaptuk, minél hamarabb válaszolunk rá!</p></div>";
                }

                if (count($hibak) > 0) {
                    echo "<div>";
                    foreach ($hibak as $hiba) {
                        echo "<p>" . $hiba . "</p>";
                    }
                    echo "</div>";
                }

            ?>

        <div class="kapcsolatform">
            <form action="kapcsolat.php" method="POST" enctype="multipart/form-data">
                <label for="name" class="requiredmezo">Név</label>
                <input type="text" id="name" name="kontaktteljesnev" placeholder="A neve...">
                <label for="e-mail" class="requiredmezo">E-mail cím</label>
                <input type="email" id="e-mail" name="kontaktemailcim" placeholder="pelda@valami.com">
                <label for="uzenet" class="requiredmezo">Üzenet</label>
                <textarea id="uzenet" name="kontaktuzenete" placeholder="Üzenete..." style="height:170px"></textarea>
                <input type="submit" name="kontaktelkuld" value="Elküldés">
            </form>
        </div>
        <hr class="invisiblepagebreak">
    </section>
</main>

<!-- LÁBLÉC -->

<?php
include_once "common/footer.php";
?>
</body>
</html>