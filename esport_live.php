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
        <h2 class="hirheader">A legfrisseb és legizgalmasabb E-sport pillanatok videón egy helyen</h2>
    </section>

    <section>
        <div class="articlepost">
            <video controls class="eSportvid">
                <source src="assets/videos/CSGO_moments.mp4" type="video/mp4"/>
                CS:GO Legjobb pillanatok
            </video>
            <div>
                <p class="eSportvidInfo">
                    Nézd vissza 2021 legütősebb CS:GO E-sport pillanatait
                </p>
                <p class="eSportvidSzoveg">
                    Válogatás a 2021-es CS:GO E-sport világának legütösebb pillanataiból. Ezeket látni kell!
                </p>
            </div>
        </div>
    </section>

    <hr>

    <section>
        <div class="articlepost">
            <video controls class="eSportvid">
                <source src="assets/videos/LoL_stream.mp4" type="video/mp4"/>
                League of Legends nyitó nap
            </video>
            <div>
                <p class="eSportvidInfo">
                    Nézd vissza a League of Legends 2022-es szezonjának nyitó élő közvetítését
                </p>
                <p class="eSportvidSzoveg">
                    Ha lemaradtál volna lesd meg a League of Legends legújabb szenjoának nyitó napi közvetítését,
                    ahol megtudhatod a legfrissebb változtatásokat a játékról!
                </p>
            </div>
        </div>
    </section>

    <hr>

    <section>
        <div class="articlepost">
            <video controls class="eSportvid">
                <source src="assets/videos/Dota_2_final.mp4" type="video/mp4"/>
                Dota 2 nemzetközi finálé
            </video>
            <div>
                <p class="eSportvidInfo">
                    TEAM SPIRIT vs PSG LGD Dota 2 18 millió dolláros nagy fináléja
                </p>
                <p class="eSportvidSzoveg">
                    Nézd vissza a Dota 2 nemzetközi E-sport bajnokságának nagy fináléját melyben a TEAM SPIRIT küzd meg
                    PSG LGD-vel a 18 millió dolláros fődíjért
                </p>
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