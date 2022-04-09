<?php
    include_once "classes/Felhasznalo.php";
    include_once "common/fuggvenyek.php";
    session_start();

    $hibak = [];

    if (!isset($_SESSION["user"])) {
        header("Location: bejelentkezes.php");
    }

    $felhasznalok = adatokBetoltese("data/felhasznalok.txt");
    
    if (isset($_POST["change-psw-submit-btn"])) {
        $felhasznalonev = $_SESSION["user"]->getFelhasznalonev();
        $jelszo = $_POST["old-psw"];
        $ujJelszo = $_POST["new-psw"];
        $ellenorzoJelszo = $_POST["new-psw-again"];

        foreach ($felhasznalok as $felhasznalo) {

            if ($felhasznalo->getFelhasznalonev() === $felhasznalonev) {

                if (!password_verify($jelszo, $felhasznalo->getJelszo())) {
                    $hibak[] = "A jelszó nem egyezik az eddigivel!";  
                }

                if (strlen($ujJelszo) < 8) {
                    $hibak[] = "A jelszónak legalább 8 karakter hosszúnak kell lennie!";
                }
            
                if (!preg_match("/[A-Z]/", $ujJelszo) || !preg_match("/[a-z]/", $ujJelszo)) {
                    $hibak[] = "A jelszónak tartalmaznia kell kis- és nagybetűt is!";
                }
            
                if (!preg_match("/[0-9]/", $ujJelszo)) {
                    $hibak[] = "A jelszónak tartalmaznia kell számjegyet!";
                }

                if (trim($jelszo) === "" || trim($ellenorzoJelszo) === "" || trim($ujJelszo) === "") {
                    $hibak[] = "Minden kötelezően kitöltendő mezőt ki kell tölteni!";
                }

                if ($ujJelszo !== $ellenorzoJelszo) {
                    $hibak[] = "A két jelszó nem egyezik!";
                    echo $ujJelszo;
                    echo $ellenorzoJelszo;
                }

                if (count($hibak) === 0) {
                    $uj_jelszo = password_hash($ujJelszo, PASSWORD_DEFAULT);
                    $felhasznalo->setJelszo($uj_jelszo);
                    adatokMentese("data/felhasznalok.txt", $felhasznalok); 
                    header("Location: change-psw.php?sikeres=true");
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
                echo '<section';
                echo "<div class>Sikeresen megváltoztattad a jelszavad!</div>";
                echo '</section>';
            }

            if (count($hibak) > 0) {
                echo '<section>';
                echo "<div class>";

                foreach ($hibak as $hiba) {
                    echo "<p>" . $hiba . "</p>";
                }

                echo "</div>";
                echo '</section>';
            }
        ?>
        <div class="change-data-container">
            <h2>Jelszó módosítása</h2>
            <img src="assets/img/loginPicture.jpg" alt="Avatar" style="height:150px">
            <form action="change-psw.php" method="POST" autocomplete="off">
                <label for="old-psw" class="requiredmezo">Régi jelszó: </label>
                <input type="password" name="old-psw" id="old-psw" required>

                <label for="new-psw" class="requiredmezo">Új jelszó (min. 8 karakter, min. egy kis ÉS nagy betű): </label>
                <input type="password" name="new-psw" id="new-psw" required>

                <label for="new-psw-again" class="requiredmezo">Új jelszó újra: </label>
                <input type="password" name="new-psw-again" id="new-psw-again" required>

                <input type="submit" name="change-psw-submit-btn" value="Módosítás">
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