<?php
include_once "classes/Felhasznalo.php";
include_once "common/fuggvenyek.php";
session_start();

$hibak = [];

if (!isset($_SESSION["user"])) {
    header("Location: bejelentkezes.php");
}

$felhasznalok = adatokBetoltese("data/felhasznalok.txt");

if (isset($_POST["change-gender-submit-btn"])) {

    $felhasznalonev = $_SESSION["user"]->getFelhasznalonev();
    $ujNem = "other";

    if (isset($_POST["new-gender"])) {
        $ujNem = $_POST["new-gender"];
    }
    else {
        $hibak[] = "Nem választott nemet!";
    }

    foreach ($felhasznalok as $felhasznalo) {

        if ($felhasznalo->getFelhasznalonev() === $felhasznalonev) {

            if (count($hibak) === 0) {
                $felhasznalo->setNem($ujNem);
                adatokMentese("data/felhasznalok.txt", $felhasznalok);
                $_SESSION["user"] = $felhasznalo;
                header("Location: change-gender.php?sikeres=true");
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
?>

<!-- FŐ TARTALOM -->
<main>

    <section>
        <?php

        if (isset($_GET["sikeres"])) {
            echo '<section>';
            echo "<div class='sikeres'>Sikeresen megváltoztattad a nemedet!</div>";
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
        <h2>Nem módosítása</h2>

            <img src="assets/img/loginPicture.jpg" alt="Avatar" style="height:150px">
            <form action="change-gender.php" method="POST" autocomplete="off">

                <div>
                    Új nem:
                    <label> Férfi <input type="radio" name="new-gender" value="male"></label>
                    <label> Nő <input type="radio" name="new-gender" value="female"> </label>
                    <label> Egyéb <input type="radio" name="new-gender" value="other"> </label>
                </div>

                <input type="submit" name="change-gender-submit-btn" value="Módosítás">
            </form>

            <form action="profile.php?changeInDetails=true" method="POST">
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