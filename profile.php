<?php
include_once "classes/Felhasznalo.php";
include_once "common/fuggvenyek.php";
include_once "classes/Uzenet.php";
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: bejelentkezes.php");
}

$felhasznalok = adatokBetoltese("data/felhasznalok.txt");

define("DEFAULT_PROFILKEP", "assets/img/profile-pictures/default_profile.jpg");
$profilkep = DEFAULT_PROFILKEP;

$utvonal = "assets/img/profile-pictures/" . $_SESSION["user"]->getFelhasznalonev();
$engedelyezettKiterjesztesek = ["png", "jpg", "jpeg"];

foreach ($engedelyezettKiterjesztesek as $kit) {
    if (file_exists("$utvonal.$kit")) {
        $profilkep = "$utvonal.$kit";
    }
}

$hibak = [];

if (isset($_POST["upload-btn"]) && is_uploaded_file($_FILES["profile-picture"]["tmp_name"])) {
    profilkepFeltoltese($hibak, $_SESSION["user"]->getFelhasznalonev());

    if (count($hibak) === 0) {

        $kit = strtolower(pathinfo($_FILES["profile-picture"]["name"], PATHINFO_EXTENSION));
        $utvonal = "assets/img/profile-pictures/" . $_SESSION["user"]->getFelhasznalonev() . "." . $kit;


        if ($utvonal !== $profilkep && $profilkep !== DEFAULT_PROFILKEP) {
            unlink($profilkep);
        }

        header("Location: profile.php");
    }
}

$sikeresTiltas = true;

if (isset($_POST["block-user-btn"])) {

    $sikeresTiltas = false;

    $tiltandoFelhasznalo = $_POST["user-to-be-blocked"];

    foreach ($felhasznalok as $felhasznalo) {
        if ($felhasznalo->getFelhasznalonev() === $tiltandoFelhasznalo) {
            $felhasznalo->setBlocked(true);
            adatokMentese("data/felhasznalok.txt", $felhasznalok);
            $sikeresTiltas = true;
            header("Location: profile.php");
        }
    }

}

$sikeresFeloldas = true;

if (isset($_POST["unblock-user-btn"])) {

    $sikeresFeloldas = false;

    $feloldandoFelhasznalo = $_POST["user-to-be-unblocked"];

    foreach ($felhasznalok as $felhasznalo) {
        if ($felhasznalo->getFelhasznalonev() === $feloldandoFelhasznalo) {
            $felhasznalo->setBlocked(false);
            adatokMentese("data/felhasznalok.txt", $felhasznalok);
            $sikeresFeloldas = true;
            header("location: profile.php");
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

    <?php

    if (isset($_GET["changeInDetails"])) {
        header("Refresh:0");
        header("Location: profile.php");
    }

    if (count($hibak) > 0) {
        echo "<div>";

        foreach ($hibak as $hiba) {
            echo "<p>" . $hiba . "</p>";
        }

        echo "</div>";
    }

    if (!$sikeresTiltas) {
        echo '<section>';
        echo '<div class="sikertelen"><p>Sikertelen tiltás, valószínüleg nincs ilyen felhasználó!</p></div>';
        echo '</section>';
    }

    if (!$sikeresFeloldas) {
        echo '<section>';
        echo '<div class="sikertelen"><p>Nem sikerült feloldani a tiltást, valószínüleg nincs ilyen felhasználó!</p></div>';
        echo '</section>';
    }



    ?>

    <section>

        <div class="change-data-container">
            <h1>Profilkép:</h1>

            <img src="<?php echo $profilkep; ?>" alt="Profilkép" height="250" width="250">

            <form action="profile.php" method="POST" enctype="multipart/form-data" class="profilkep">
                <label style="font-weight: bold"> Válassz profilképet (max. 5 MB):
                    <input type="file" name="profile-picture">
                </label>
                <br>
                <input type="submit" name="upload-btn" value="Profilkép módosítása">
            </form>
        </div>


        <?php
        if ($felhasznalo->getNem() === "male") {
            $nemE = "Férfi";
        } else if ($felhasznalo->getNem() === "female") {
            $nemE = "Nő";
        } else {
            $nemE = "Egyéb";
        }

        ?>

        <table class="profiladatok">
            <tr>
                <th colspan="3">Felhasználói adatok</th>
            </tr>

            <tr>
                <th>Felhasználónév</th>
                <td><?php echo $felhasznalo->getFelhasznalonev(); ?></td>
                <td>
                    <form action="change-usrname.php" method="POST" enctype="multipart/form-data">
                        <input type="submit" name="change-usrname-btn" value="Módosítás">
                    </form>
                </td>
            </tr>
            <tr>
                <th>E-mail cím</th>
                <td><?php echo $felhasznalo->getEmail(); ?></td>
                <td>
                    <form action="change-email.php" method="POST" enctype="multipart/form-data">
                        <input type="submit" name="change-email-btn" value="Módosítás">
                    </form>
                </td>
            </tr>
            <tr>
                <th>Nem</th>
                <td><?php echo $nemE; ?></td>
                <td>
                    <form action="change-gender.php" method="POST" enctype="multipart/form-data">
                        <input type="submit" name="change-gender-btn" value="Módosítás">
                    </form>
                </td>
            </tr>
            <tr>
                <th colspan="3">
                    <form action="change-psw.php" method="POST" enctype="multipart/form-data">
                        <input type="submit" name="change-psw-btn" value="Jelszó módosítása">
                    </form>
                </th>
            </tr>
            <tr>
                <th colspan="3">
                    <form action="delete-profile.php" method="POST" enctype="multipart/form-data">
                        <input type="submit" name="delete-profile-btn" value="Profil törlése">
                    </form>
                </th>
            </tr>
        </table>

        <div class="kilepes" style="margin-bottom:30px">
            <form action="user-message.php" method="POST" enctype="multipart/form-data">
                <input type="submit" name="forward-to-um" value="Üzeneteim" style="background-color: #66ccff" onmouseover="this.style.backgroundColor='white';" onmouseout="this.style.backgroundColor='#66ccff';">
            </form>
        </div>

        <div class="kilepes">
            <form action="kijelentkezes.php" method="POST">
                <input type="submit" name="logout-btn" value="Kijelentkezés">
            </form>
        </div>

        <hr class="invisiblepagebreak">

        <?php
        if ($_SESSION["user"]->isAdmin()) {

            echo '<h2 class="kozepre">Adminisztrációs felület</h2>';

            $messages = adatokBetoltese("data/uzenetek.txt");

            echo '<h2 class="kozepre">Üzenetek</h2>';

            $sorszam = 1;

            foreach ($messages as $msg) {
                echo '<div class="message-container">';
                echo '<ul>';
                echo '<li>Sorszám: ' . $sorszam . '</li>';
                echo '<li>Küldő: ' . $msg->getKuldoNev() . ' </li>';
                echo '<li>Küldő e-mail címe: ' . $msg->getKuldoEmail() . ' </li>';
                echo '<li>Üzenet: ' . $msg->getUzenet() . ' </li>';
                echo '</ul>';
                echo '</div>';
                $sorszam++;
            }

            echo '<h2 class="kozepre">Felhasználó letiltása</h2>';
            echo '<p>Regisztrált felhasználók: </p>';
            echo '<div class="message-container">';
            echo '<ul>';
            foreach ($felhasznalok as $felhasznalo) {
                echo '<li>' . $felhasznalo->getFelhasznalonev() . '</li>';
            }
            echo '</ul>';
            echo '</div>';
            echo '<div class="felhasznaloform adminButtons" style="margin-left:10px">';
            echo '<form action="profile.php" method="POST" enctype="multipart/form-data">';

            echo '<label for="block-user">Letiltandó felhasználó: </label>';
            echo '<input type="text" name="user-to-be-blocked" id="block-user" required >';

            echo '<input type="submit" name="block-user-btn" value="Letiltás">';

            echo '</form>';
            echo '</div>';
            echo '<div class="felhasznaloform adminButtons" style="margin-left:10px">';
            echo '<form action="profile.php" method="POST" enctype="multipart/form-data">';

            echo '<label for="block-user">Letiltás feloldása a következő felhasználón: </label>';
            echo '<input type="text" name="user-to-be-unblocked" id="unblock-user" required>';

            echo '<input type="submit" name="unblock-user-btn" value="Tiltás feloldása">';

            echo '</form>';
            echo '</div>';
        }
        ?>

        <hr class="invisiblepagebreak">

    </section>
</main>

<!-- LÁBLÉC -->

<?php
include_once "common/footer.php";
?>
</body>
</html>