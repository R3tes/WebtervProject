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
        <h2 class="kozepre">Bejelentkezés</h2>
        <div class="felhasznaloform">
            <img src="assets/img/loginPicture.jpg" alt="login avatar" id="loginavatar">
            <form action="#" method="POST" enctype="multipart/form-data">
                <label for="username">Felhasználónév:</label>
                <input type="text" id="username" name="felhasznalonev" placeholder="Add meg a felhasználóneved"
                       required>

                <label for="jelszo">Jelszó:</label>
                <input type="password" name="password" id="jelszo" placeholder="Add meg a jelszavad" required>

                <input type="submit" name="logingomb" value="Bejelentkezés">

                <label class="felhasznaloformCheckbox"><input type="checkbox" name="rememberMe"/> Emlékezz rám</label>

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