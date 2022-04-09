<?php
include_once "common/fuggvenyek.php";
session_start();

    if(!isset($_SESSION["user"])) {
        header("Location: bejelentkezes.php");
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

</main>

<!-- LÁBLÉC -->

<?php
include_once "common/footer.php";
?>

</body>
</html>
