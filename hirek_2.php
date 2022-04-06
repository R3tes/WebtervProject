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
<main>

    <section>
        <img src="assets/img/hirek2.jpg" alt="xbox kontroller" class="topimage">
        <h2 class="insidearticleheader kozepre">Az Nvidiát megtámadó hackerek 70 ezer ember adatait tették közzé</h2>
        <div class="insidearticledatum"><p>Szombat, 2022. március 5.</p><p>Ismeretlen szerző</p></div>
        <div class="insidearticledisclaimer"><span>A cikk nem saját. Forrása <a href="https://pcworld.hu/pcwlite/az-nvidiat-megtamado-hackerek-70-ezer-ember-adatait-tettek-kozze-307397.html" target="_blank">itt</a> elérhető, kizárólag placeholder célból lett a tartalmi lényeg átmásolva.</span></div>
    </section>

    <section>
        <p>Az utóbbi pár évben rengeteg cég esett különféle hackertámadások áldozatául, ám a legtipikusabb esetekben a támadok pénzt követelnek vagy egyszerűen figyelmet. A legutóbb a videókártyáiról elhíresült Nvidia került hackerek célkeresztjébe, ám ez a csapat pénz helyett a cég illesztőprogramjainak forráskódját, illetve a kriptobányászatra vonatkozó limitációk megszüntetését követelte.</p>
        <p>A csapat korábban már kiszivárogtatott némi forráskódot, amelyet a cégtől loptak el, most viszont egyel tovább mentek és a cég alkalmazottainak adatait tették elérhetővé. Egészen pontosan 71 355 ember belépési adatai kerültek fel az internetre, ami azért furcsa, mert a publikusan elérhető információk szerint az Nvidiának nagyjából 20 000 alkalmazottja lehet és míg konkrét számokat a cég nem volt hajlandó megosztani, a Tom's Hardware munkatársának is megerősítették, hogy nagyjából ez a nagyságrend tükrözi a valóságot.</p>
        <p>Nyilván ez nem feltétlenül jelenti azt, hogy a kiszivárogtatott adatok hamisak és egyszerű pánikkeltés céljával készültek, arról is lehet szó, hogy az adatbázis minden korábbi alkalmazottat tartalmaz, akár azokat is beleértve, akik kontraktorként vagy hasonló ideiglenes megállapodások keretében dolgoztak a cégnek.</p>
        <p>A nevek és titkosított jelszavak mellett két korábbi driver tanúsítvány is előkerült és bár szerencsére már lejártak, a Windows még most is megengedi, hogy driverek aláírására használjuk őket, szóval nem lepődnénk meg, ha idővel ezekkel is megpróbálna valaki visszaélni.</p>
        <p><a href="hirek.php" id="backtohirek">Vissza a hírekhez</a></p>
    </section>

</main>

<!-- LÁBLÉC -->

<?php
include_once "common/footer.php";
?>
</body>
</html>