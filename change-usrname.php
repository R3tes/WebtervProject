<?php
include_once "classes/Felhasznalo.php";
include_once "common/fuggvenyek.php";
session_start();

$hibak = [];

if (!isset($_SESSION["user"])) {
    header("Location: bejelentkezes.php");
}

$felhasznalok = adatokBetoltese("data/felhasznalok.txt");

if (isset($_POST["change-usrname-submit-btn"])) {
    $felhasznalonev = $_SESSION["user"]->getFelhasznalonev();
    $ujFelhasznalonev = $_POST["new-username"];

    foreach ($felhasznalok as $felhasznalo) {

        if ($felhasznalo->getFelhasznalonev() === $felhasznalonev) {

            if (strlen($ujFelhasznalonev) > 50) {
                $hibak[] = "Túl hosszú a felhasználónév!";
            }

            if (trim($ujFelhasznalonev) === "") {
                $hibak[] = "Minden kötelezően kitöltendő mezőt ki kell tölteni!";
            }

            if (count($hibak) === 0) {
                $felhasznalo->setFelhasznalonev($ujFelhasznalonev);
                adatokMentese("data/felhasznalok.txt", $felhasznalok);
                $_SESSION["user"] = $felhasznalo;
                header("Location: change-usrname.php?sikeres=true");
            }

        }

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
$felhasznalo = $_SESSION["user"];
?>

<!-- FŐ TARTALOM -->
<main>

    <section>
        <?php

        if (isset($_GET["sikeres"])) {
            echo '<section>';
            echo "<div class='sikeres'>Sikeresen megváltoztattad a felhasználónevedet!</div>";
            echo '</section>';
        }

        if (count($hibak) > 0) {
            echo '<section>';
            echo "<div class='sikertelen'>";

            foreach ($hibak as $hiba) {
                echo "<p>" . $hiba . "</p>";
            }

            echo "</div>";
            echo '</section>';
        }

        ?>
        <div class="change-data-container">
            <h2 class="kozepre">Felhasználónév módosítása</h2>

            <img src="assets/img/loginPicture.jpg" alt="Avatar" style="height:150px">

            <form action="change-usrname.php" method="POST" autocomplete="off" class="modositButton">

                <label for="new-username" class="requiredmezo">Új felhasználónév (max. 50 karakter): </label>
                <input type="text" name="new-username" id="new-username" required>

                <input type="submit" name="change-usrname-submit-btn" value="Módosítás">
            </form>

            <form action="profile.php?changeInDetails=true" method="POST" class="returnButton">
                <input type="submit" name="back-to-profile-btn" value="Vissza a profilra">
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
