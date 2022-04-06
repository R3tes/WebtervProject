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
        <h2 class="hirheader">Legfrissebb videójáték tesztek</h2>
    </section>

    <section>
        <div class="critictspost">
            <div class="critics-img anim-zoomin">
                <img src="assets/img/elden_ring.jpg" alt="Elden Ring kritika">
            </div>
            <div class="articleinformacio">
                <div class="articledatum">
                    <span>2022. Március. 07.</span>
                </div>
                <div class="criticsCim">JÁTÉK TESZT: Elden Ring</div>
                <p class="articleszoveg">
                    Hatalmas várakozás és még hatalmasabb elvárások előzték meg az Elden Ring megjelenést.
                    Vajon sikerült a fejlesztőknek megugrania a lécet? Kritikánkból kiderül!
                </p>
                <a href="gamecritics_1.php" class="reszletesebben">Tovább a kritikához</a>
            </div>
        </div>
    </section>

    <hr>

    <section>
        <div class="critictspost">
            <div class="critics-img anim-zoomin">
                <img src="assets/img/horizon.jpg" alt="Elden Ring kritika">
            </div>
            <div class="articleinformacio">
                <div class="articledatum">
                    <span>2022. Február. 15.</span>
                </div>
                <div class="criticsCim">JÁTÉK TESZT: Horizon: Forbidden West</div>
                <p class="articleszoveg">
                    A Guerilla Games 2017-es meglepetésszerű sikerjátékának a Horizon Zero Dawn-nak a folytatása
                    megérkezett.
                    Sikerült vajon a fejlesztőcsapatnak az előző játékukkal állított lécet megugrani? Kritikánkból
                    kiderül!
                </p>
                <a href="gamecritics_2.php" class="reszletesebben">Tovább a kritikához</a>
            </div>
        </div>
    </section>

    <hr>

    <section>
        <div class="critictspost">
            <div class="critics-img anim-zoomin">
                <img src="assets/img/psclassic.jpg" alt="Playstation Classic">
            </div>
            <div class="articleinformacio">
                <div class="articledatum">
                    <span>2022. Január. 05.</span>
                </div>
                <div class="criticsCim">HARDVER TESZT: PlayStation Classic</div>
                <p class="articleszoveg">
                    Egy olyan korban, ahol a retro sikkessé vált és látszólag mindenki szívesen vált jegyet a nosztalgia
                    vasútra egy-egy felújított mozi, játék, vagy esetünkben konzol formájában,
                    a Sony-féle cégóriások szinte lubickolni tetszenek, hiszen viszonylag kevés erőfeszítéssel jelentős
                    profitot tudnak bezsebelni.
                </p>
                <a href="gamecritics_3.php" class="reszletesebben">Tovább a kritikához</a>
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