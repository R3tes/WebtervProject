<?php
    include_once "classes/Felhasznalo.php";
    include_once "common/fuggvenyek.php";
    include_once "classes/Uzenet.php";
    session_start();

    if (!isset($_SESSION["user"])) {
        header("Location: bejelentkezes.php");
    }

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
        if (count($hibak) > 0) {
            echo "<div>";

            foreach ($hibak as $hiba) {
                echo "<p>" . $hiba . "</p>";
            }

            echo "</div>";
        }
    ?>

    <section>

        <h1>Felhasználói adatok</h1>

        <img src="<?php echo $profilkep; ?>" alt="Profilkép" height="200">

        <form action="profile.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="profile-picture">
            <input type="submit" name="upload-btn" value="Profilkép módosítása">
        </form>

        <?php 
            echo "<p>" . $felhasznalo->getFelhasznalonev() . "</p>";
            echo "<p>" . $felhasznalo->getEmail() . "</p>";
        ?>

        <form action="change-psw.php" method="POST" enctype="multipart/form-data">
            <input type="submit" name="change-psw-btn" value="Jelszó módosítása">
        </form>

        <form action="delete-profile.php" method="POST" enctype="multipart/form-data">
            <input type="submit" name="delete-profile-btn" value="Profil törlése">
        </form>

        <form action="kijelentkezes.php" method="POST">
            <input type="submit" name="logout-btn" value="Kijelentkezés">
        </form>

        <?php
        if ($_SESSION["user"]->isAdmin()) {

        echo '<h1>Adminisztrációs felület</h1>';

        $messages = adatokBetoltese("data/uzenetek.txt");

        echo '<h1>Üzenetek</h1>';

        $sorszam = 1;

        foreach ($messages as $msg) {
            echo '<div>';
            echo '<ul>';
            echo '<li>Sorszám: ' . $sorszam . '</li>';
            echo '<li>Küldő: ' . $msg->getKuldoNev() . ' </li>';
            echo '<li>Küldő e-mail címe: ' . $msg->getKuldoEmail() . ' </li>';
            echo '<li>Üzenet: ' . $msg->getUzenet() . ' </li>';
            echo '</ul>';
            echo '</div>';
            $sorszam++;
        }

        }
        ?>

    </section>
</main>

<!-- LÁBLÉC -->

<?php
include_once "common/footer.php";
?>
</body>
</html>