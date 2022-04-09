<?php
include_once "classes/Felhasznalo.php";
include_once "common/fuggvenyek.php";
session_start();

$users = adatokBetoltese("data/felhasznalok.txt");

$hibak = [];

if (isset($_POST["regisztraciogomb"])) {
    $felhasznalonev = $_POST["felhasznalonev"];
    $jelszo = $_POST["password"];
    $ellenorzoJelszo = $_POST["ellpassword"];
    $email = $_POST["email"];
    $nem = "other";
    $jelolonegyzetek = [];

    if (isset($_POST["gender"])) {
        $nem = $_POST["gender"];
    }

    if (isset($_POST["kotelezocheckbox"])) {
        $jelolonegyzetek = $_POST["kotelezocheckbox"];
    }

    if (trim($felhasznalonev) === "" || trim($jelszo) === "" || trim($ellenorzoJelszo) === "" || trim($email) === "") {
        $hibak[] = "Minden kötelezően kitöltendő mezőt ki kell tölteni!";
    }

    if (strlen($felhasznalonev) > 50) {
        $hibak[] = "A felhasználónév maximum 50 karakter lehet!";
    }

    foreach ($users as $felhasznalo) {
        if ($felhasznalo->getFelhasznalonev() === $felhasznalonev) {
            $hibak[] = "A felhasználónév már foglalt!";
        }
    }

    if (strlen($jelszo) < 8) {
        $hibak[] = "A jelszónak legalább 8 karakter hosszúnak kell lennie!";
    }

    if (!preg_match("/[A-Z]/", $jelszo) || !preg_match("/[a-z]/", $jelszo)) {
        $hibak[] = "A jelszónak tartalmaznia kell kis- és nagybetűt is!";
    }

    if (!preg_match("/[0-9]/", $jelszo)) {
        $hibak[] = "A jelszónak tartalmaznia kell számjegyet!";
    }

    if (!preg_match("/[0-9a-z.-]+@([0-9a-z-]+\.)+[a-z]{2,4}/", $email)) {
        $hibak[] = "A megadott e-mail cím formátuma nem megfelelő!";
    }

    if ($jelszo !== $ellenorzoJelszo) {
        $hibak[] = "A két jelszó nem egyezik!";
    }
    foreach ($users as $felhasznalo) {
        if ($felhasznalo->getEmail() === $email) {
            $hibak[] = "Az e-mail cím már foglalt!";
        }
    }

    profilkepFeltoltese($hibak, $felhasznalonev);

    if (count($jelolonegyzetek) < 2) {
        $hibak[] = "Mindkét kötelező jelölőnégyzetet be kell jelölni!";
    }

    if (count($hibak) === 0) {
        $jelszo = password_hash($jelszo, PASSWORD_DEFAULT);
        $felhasznalo = new Felhasznalo($felhasznalonev, $jelszo, $email, $nem);
        $users[] = $felhasznalo;
        adatokMentese("data/felhasznalok.txt", $users);
        header("Location: regisztracio.php?sikeresMuvelet=true");
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

    <?php
    if(isset($_GET["sikeresMuvelet"])) {
        echo '<section>';
        echo "<div class='sikeres'><p>Sikeres regisztráció!</p></div>";
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

    <section>
        <h2 class="kozepre">Regisztráció</h2>
        <div class="felhasznaloform">
            <form action="regisztracio.php" method="POST" enctype="multipart/form-data">
                <fieldset>
                    <legend>Felhasználói adatok</legend>
                    <label for="username" class="requiredmezo">Felhasználónév (max. 50 karakter):</label>
                    <input type="text" id="username" name="felhasznalonev" required maxlength="50" <?php if (isset($_POST["felhasznalonev"])) echo "value='" . $_POST["felhasznalonev"] . "'" ?>>

                    <label for="jelszo" class="requiredmezo">Jelszó (min. 8 karakter, min. egy kis ÉS nagy betű):</label>
                    <input type="password" name="password" id="jelszo" required>

                    <label for="jelszoCheck" class="requiredmezo">Jelszó ismét:</label>
                    <input type="password" name="ellpassword" id="jelszoCheck" required>

                    <label for="email" class="requiredmezo">E-mail cím: </label>
                    <input type="email" name="email" id="email" placeholder="nagysandor.ahodito@gmail.com" <?php if (isset($_POST["email"])) echo "value='" . $_POST["email"] . "'" ?>>
                </fieldset>

                <div>
                    Nem:
                    <label> Férfi <input type="radio" name="gender" value="male" <?php if (isset($_POST["gender"]) && $_POST["gender"] === "male") echo "checked"; ?>> </label>
                    <label> Nő <input type="radio" name="gender" value="female" <?php if (isset($_POST["gender"]) && $_POST["gender"] === "female") echo "checked"; ?>> </label>
                    <label> Egyéb <input type="radio" name="gender" value="other" <?php if (isset($_POST["gender"]) && $_POST["gender"] === "other") echo "checked"; ?>> </label>
                </div>

                <label class="felhasznaloformCheckbox">
                    <input type="checkbox" name="checkbox" value="sub-to-newsletter" checked>
                    Értesítsen a weboldal a legújabb eseményekről.
                </label>
                <label class="felhasznaloformCheckbox requiredmezo">
                    <input type="checkbox" name="kotelezocheckbox[]" value="accept-terms-and-conditions" required>
                    Elfogadom a <a href="https://www.youtube.com/watch?v=WGTYu_B-U9o">felhasználási feltételeket</a>.
                </label>
                <label class="felhasznaloformCheckbox requiredmezo">
                    <input type="checkbox" name="kotelezocheckbox[]" value="confirm-data" required>
                    Nyilatkozom, hogy a megadott adatok a valóságnak megfelelnek még akkor is, ha nem.
                </label>

                <label for="avatar">Profilkép (max. 500 MB): <input type="file" name="profile-picture" id="avatar"> </label>

                <input type="submit" name="regisztraciogomb" value="Regisztráció">
                <input type="reset" name="resetgomb" value="Törlés">

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