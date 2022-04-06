<?php
include_once "common/fuggvenyek.php";
session_start();
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
<main id="withoutbg">
    <section>
        <h2 class="hirheader">Minden ami E-sport egy helyen</h2>
    </section>

    <section>
        <div class="eSportArticlepost">

            <div class="eSportArticlepost-img anim-zoomin">
                <img src="assets/img/streaming.jpg" alt="e-sport hiroldal">
            </div>

            <div class="articleinformacio">
                <h2 class="articlecim">Legfrissebb E-sport pillanatok videói</h2>
                <p class="articleszoveg">
                    Nézd vissza ha lemaradtál a legnagyobb leszámolásokat és legjobb rövid pillanatokat:
                    League of Legends / CS:GO / Dota 2 és még sok más kategóriában.
                </p>
                <a href="esport_live.php" class="reszletesebben">Irány a közvetítések</a>
            </div>

        </div>
    </section>

    <hr>

    <section>
        <div class="eSportArticlepost">

            <div class="eSportArticlepost-img anim-zoomin">
                <img src="assets/img/esport_cup.jpg" alt="verseny kupa">
            </div>

            <div class="articleinformacio">
                <h2 class="articlecim">A Gameter e-sport versenyt hírdet</h2>
                <p class="articleszoveg">
                    Az oldal hosszú fennálását megünnepelvén kis csapatunk egy mini bajnokságot hírdet melyben értékes díjakat
                    kapnak a legjobban teljesítők. Jelentkezz és mutasd meg mire vagy képes az idei PlayIT shown rendezett versenyen!
                </p>
                <a href="bajnoksag.php" class="reszletesebben">Verseny részletek</a>
            </div>

        </div>
    </section>
    <hr class="invisiblepagebreak">

</main>

<!-- LÁBLÉC -->

<?php
include_once "common/footer.php";
?>
</body>
</html>