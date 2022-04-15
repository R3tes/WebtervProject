<?php
include_once "classes/Felhasznalo.php";
include_once "classes/UserMessage.php";
include_once "common/fuggvenyek.php";
include_once "classes/Uzenet.php";
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: bejelentkezes.php");
}

$felhasznalok = adatokBetoltese("data/felhasznalok.txt");
$uzenetek = adatokBetoltese("data/user-messages.txt");

$hibak = [];

if (isset($_POST["send-message-btn"]) || isset($_POST["send-reply-btn"])) {

    if (isset($_POST["send-message-btn"])) {
        $recipient = $_POST["recipient"];
        $message = $_POST["my-message"];
    }

    if (isset($_POST["send-reply-btn"])) {
        $recipient = $_POST["my-reply-recipient"];
        $message = $_POST["my-reply"];
    }

    if (trim($recipient) === "" || trim($message) === "") {
        $hibak[] = "Valamelyik mezőt nem töltötte ki!";
    }

    $talaltFelhasznalo = false;

    foreach ($felhasznalok as $felhasznalo) {
        if ($felhasznalo->getFelhasznalonev() === $recipient) {
            $talaltFelhasznalo = true;
        }
    }

    if (!$talaltFelhasznalo) {
        $hibak[] = "Nincs ilyen felhasználó!";
    }
    else {
        $u_message = new UserMessage($_SESSION["user"]->getFelhasznalonev(), $recipient, $message);
        $uzenetek[] = $u_message;
        adatokMentese("data/user-messages.txt", $uzenetek);
        header("Location: user-message.php?sikeresKuldes=true");
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
    if (isset($_GET["sikeresKuldes"])) {
        echo '<section>';
        echo '<div class="sikeres"><p>Sikeresen elküldte az üzenetet/válasz!</p></div>';
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

        <h2>Üzenet küldése</h2>
        <div class="felhasznaloform" style="margin-left:10px">
            <form action="user-message.php" method="POST" enctype="multipart/form-data">

                <label for="user" class="requiredmezo">Címzett</label>
                <input type="text" name="recipient" id="user" required>

                <label for="new-message" class="requiredmezo">Üzenet, max. 2000 karakter</label>
                <textarea id="new-message" name="my-message" maxlength="2000" placeholder="Az ég kék..." style="resize:none" required></textarea>

                <input type="submit" name="send-message-btn" value="Küldés">

            </form>
         </div>

        <h2>Postaládám</h2>

        <div class="big-message-container">
        <?php
        foreach ($uzenetek as $msg) {
            if ($msg->getFogado() === $_SESSION["user"]->getFelhasznalonev()) {
                echo '<div class="message-container" style="margin: 0 20px 10px 0;width: 90%">';
                echo '<ul>';
                echo '<li>Küldő: ' . $msg->getKuldo() . ' </li>';
                echo '<li>Időpont: ' .  $msg->getUzenetDatuma()->format("Y-m-d H:i:s") . ' </li>';
                echo '<li>Üzenet: ' . $msg->getUzenet() . '</li>';
                echo '</ul>';
                echo '<form action="user-message.php" method="POST" enctype="multipart/form-data">';
                echo '<input type="hidden" name="my-reply-recipient" value="' . $msg->getKuldo() . '">';
                echo '<input type="hidden" name="my-reply-date" value="' . $msg->getUzenetDatuma()->format("Y-m-md H:i:s") . '">';
                echo '<label for="reply-message" class="requiredmezo">Válasz, max. 2000 karakter</label>';
                echo '<textarea id="reply-message" name="my-reply" maxlength="2000" placeholder="A fű zöld..." style="resize:none" required></textarea>';
                echo '<input type="submit" name="send-reply-btn" value="Válasz küldése">';
                echo '</form>';
                echo '</div>';
            }
        }
        ?>
        </div>

        <div class="backtoprof" style="margin-top:30px">
            <form action="profile.php" method="POST" enctype="multipart/form-data">
                <input type="submit" name="back-to-prof" value="Vissza a profilra" style="background-color: #66ccff" onmouseover="this.style.backgroundColor='white';" onmouseout="this.style.backgroundColor='#66ccff';">
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
