<?php
include_once "classes/Felhasznalo.php";
include_once "common/fuggvenyek.php";
session_start();

$hibak = [];

if (!isset($_SESSION["user"])) {
    header("Location: bejelentkezes.php");
}

$felhasznalok = adatokBetoltese("data/felhasznalok.txt");

if (isset($_POST["change-email-submit-btn"])) {
    $felhasznalonev = $_SESSION["user"]->getFelhasznalonev();
    $email = $_POST["old-email"];
    $ujEmail = $_POST["new-email"];

    foreach ($felhasznalok as $felhasznalo) {

        if ($felhasznalo->getFelhasznalonev() === $felhasznalonev) {

            if ($email !== $felhasznalo->getEmail()) {
                $hibak[] = "Az régi e-mail cím nem megfelelő!";
            }

            if (trim($ujEmail) === "" || trim($email) === "") {
                $hibak[] = "Minden kötelezően kitöltendő mezőt ki kell tölteni!";
            }

            if (!preg_match("/[0-9a-z.-]+@([0-9a-z-]+\.)+[a-z]{2,4}/", $ujEmail)) {
                $hibak[] = "A megadott e-mail cím formátuma nem megfelelő!";
            }

            if (count($hibak) === 0) {
                $felhasznalo->setEmail($ujEmail);
                adatokMentese("data/felhasznalok.txt", $felhasznalok);
                $_SESSION["user"] = $felhasznalo;
                header("Location: change-email.php?sikeres=true");
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
            echo "<div class='sikeres'>Sikeresen megváltoztattad az e-mailedet!</div>";
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
        <h2>Email módosítása</h2>

            <img src="assets/img/loginPicture.jpg" alt="Avatar" style="height:150px">
            <form action="change-email.php" method="POST" autocomplete="off" class="modositButton">
                <label for="old-email" class="requiredmezo">Régi e-mail: </label>
                <input type="text" name="old-email" id="old-email" required>

                <label for="new-email" class="requiredmezo">Új e-mail: </label>
                <input type="text" name="new-email" id="new-email" required>

                <input type="submit" name="change-email-submit-btn" value="Módosítás">
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