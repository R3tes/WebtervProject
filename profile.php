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
<!-- FEJL??C/MEN?? -->

<?php
include_once "common/header.php";

$felhasznalo = $_SESSION["user"];
?>

<!-- F?? TARTALOM -->
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
        echo '<div class="sikertelen"><p>Sikertelen tilt??s, val??sz??n??leg nincs ilyen felhaszn??l??!</p></div>';
        echo '</section>';
    }

    if (!$sikeresFeloldas) {
        echo '<section>';
        echo '<div class="sikertelen"><p>Nem siker??lt feloldani a tilt??st, val??sz??n??leg nincs ilyen felhaszn??l??!</p></div>';
        echo '</section>';
    }



    ?>

    <section>

        <div class="change-data-container">
            <h1>Profilk??p:</h1>

            <img src="<?php echo $profilkep; ?>" alt="Profilk??p" height="250" width="250">

            <form action="profile.php" method="POST" enctype="multipart/form-data" class="profilkep">
                <label style="font-weight: bold"> V??lassz profilk??pet (max. 5 MB):
                    <input type="file" name="profile-picture">
                </label>
                <br>
                <input type="submit" name="upload-btn" value="Profilk??p m??dos??t??sa">
            </form>
        </div>


        <?php
        if ($felhasznalo->getNem() === "male") {
            $nemE = "F??rfi";
        } else if ($felhasznalo->getNem() === "female") {
            $nemE = "N??";
        } else {
            $nemE = "Egy??b";
        }

        ?>

        <table class="profiladatok">
            <tr>
                <th colspan="3">Felhaszn??l??i adatok</th>
            </tr>

            <tr>
                <th>Felhaszn??l??n??v</th>
                <td><?php echo $felhasznalo->getFelhasznalonev(); ?></td>
                <td>
                    <form action="change-usrname.php" method="POST" enctype="multipart/form-data">
                        <input type="submit" name="change-usrname-btn" value="M??dos??t??s">
                    </form>
                </td>
            </tr>
            <tr>
                <th>E-mail c??m</th>
                <td><?php echo $felhasznalo->getEmail(); ?></td>
                <td>
                    <form action="change-email.php" method="POST" enctype="multipart/form-data">
                        <input type="submit" name="change-email-btn" value="M??dos??t??s">
                    </form>
                </td>
            </tr>
            <tr>
                <th>Nem</th>
                <td><?php echo $nemE; ?></td>
                <td>
                    <form action="change-gender.php" method="POST" enctype="multipart/form-data">
                        <input type="submit" name="change-gender-btn" value="M??dos??t??s">
                    </form>
                </td>
            </tr>
            <tr>
                <th colspan="3">
                    <form action="change-psw.php" method="POST" enctype="multipart/form-data">
                        <input type="submit" name="change-psw-btn" value="Jelsz?? m??dos??t??sa">
                    </form>
                </th>
            </tr>
            <tr>
                <th colspan="3">
                    <form action="delete-profile.php" method="POST" enctype="multipart/form-data">
                        <input type="submit" name="delete-profile-btn" value="Profil t??rl??se">
                    </form>
                </th>
            </tr>
        </table>

        <div class="kilepes" style="margin-bottom:30px">
            <form action="user-message.php" method="POST" enctype="multipart/form-data">
                <input type="submit" name="forward-to-um" value="??zeneteim" style="background-color: #66ccff" onmouseover="this.style.backgroundColor='white';" onmouseout="this.style.backgroundColor='#66ccff';">
            </form>
        </div>

        <div class="kilepes">
            <form action="kijelentkezes.php" method="POST">
                <input type="submit" name="logout-btn" value="Kijelentkez??s">
            </form>
        </div>

        <hr class="invisiblepagebreak">

        <?php
        if ($_SESSION["user"]->isAdmin()) {

            echo '<h2 class="kozepre">Adminisztr??ci??s fel??let</h2>';

            $messages = adatokBetoltese("data/uzenetek.txt");

            echo '<h2 class="kozepre">??zenetek</h2>';

            $sorszam = 1;

            foreach ($messages as $msg) {
                echo '<div class="message-container">';
                echo '<ul>';
                echo '<li>Sorsz??m: ' . $sorszam . '</li>';
                echo '<li>K??ld??: ' . $msg->getKuldoNev() . ' </li>';
                echo '<li>K??ld?? e-mail c??me: ' . $msg->getKuldoEmail() . ' </li>';
                echo '<li>??zenet: ' . $msg->getUzenet() . ' </li>';
                echo '</ul>';
                echo '</div>';
                $sorszam++;
            }

            echo '<h2 class="kozepre">Felhaszn??l?? letilt??sa</h2>';
            echo '<p>Regisztr??lt felhaszn??l??k: </p>';
            echo '<div class="message-container">';
            echo '<ul>';
            foreach ($felhasznalok as $felhasznalo) {
                echo '<li>' . $felhasznalo->getFelhasznalonev() . '</li>';
            }
            echo '</ul>';
            echo '</div>';
            echo '<div class="felhasznaloform adminButtons" style="margin-left:10px">';
            echo '<form action="profile.php" method="POST" enctype="multipart/form-data">';

            echo '<label for="block-user">Letiltand?? felhaszn??l??: </label>';
            echo '<input type="text" name="user-to-be-blocked" id="block-user" required >';

            echo '<input type="submit" name="block-user-btn" value="Letilt??s">';

            echo '</form>';
            echo '</div>';
            echo '<div class="felhasznaloform adminButtons" style="margin-left:10px">';
            echo '<form action="profile.php" method="POST" enctype="multipart/form-data">';

            echo '<label for="block-user">Letilt??s felold??sa a k??vetkez?? felhaszn??l??n: </label>';
            echo '<input type="text" name="user-to-be-unblocked" id="unblock-user" required>';

            echo '<input type="submit" name="unblock-user-btn" value="Tilt??s felold??sa">';

            echo '</form>';
            echo '</div>';
        }
        ?>

        <hr class="invisiblepagebreak">

    </section>
</main>

<!-- L??BL??C -->

<?php
include_once "common/footer.php";
?>
</body>
</html>