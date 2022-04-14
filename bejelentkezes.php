<?php
    #admin jogokkal rendelkező felhasználó: admin - pswd: admin
    include_once "classes/Felhasznalo.php";
    include_once "common/fuggvenyek.php";
    session_start();

    $users = adatokBetoltese("data/felhasznalok.txt");

    $sikeresBejelentkezes = true;

    if (isset($_POST["logingomb"])) {
        $felhasznalonev = $_POST["felhasznalonev"];
        $jelszo = $_POST["password"];

        # 4/14
        if (isset($_POST["remember-me"])) {
            setcookie("remember", $felhasznalonev, time() + 2678400); # 31 nap
        }
        else {
            if (isset($_COOKIE["remember"]))  {
                setcookie("remember", "", time() - 3600);
            }
        }
        # //

        foreach ($users as $felhasznalo) {

            if ($felhasznalo->getFelhasznalonev() === $felhasznalonev && password_verify($jelszo, $felhasznalo->getJelszo())) {
                $_SESSION["user"] = $felhasznalo;
                header("Location: profile.php");
            }

        }

        $sikeresBejelentkezes = false;
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
        echo "<section>";
            if (!$sikeresBejelentkezes) {
                echo "<div class='sikertelen'><p>A belépési adatok nem megfelelőek!</p></div>";
            }
        echo "</section>";
        ?>

        <h2 class="kozepre">Bejelentkezés</h2>
        <div class="felhasznaloform">
            <img src="assets/img/loginPicture.jpg" alt="login avatar" id="loginavatar">
            <form action="bejelentkezes.php" method="POST" enctype="multipart/form-data">
                <label for="username">Felhasználónév:</label>
                <input type="text" id="username" name="felhasznalonev" <?php if (isset($_COOKIE["remember"])) echo "value='" . $_COOKIE["remember"] . "'" ?> required>

                <label for="jelszo">Jelszó:</label>
                <input type="password" name="password" id="jelszo" required>

                <input type="submit" name="logingomb" value="Bejelentkezés">

                <label class="felhasznaloformCheckbox"><input type="checkbox" name="remember-me" <?php if (isset($_COOKIE["remember"])) echo "checked"; ?>> Emlékezz rám</label>

            </form>
        </div>
        <p id="registerNow" class="kozepre">Ha még nem regisztráltál, <a href="regisztracio.php">itt</a> megteheted!
        </p>
        <hr class="invisiblepagebreak">
    </section>
</main>

<!-- LÁBLÉC -->

<?php
include_once "common/footer.php";
?>
</body>
</html>