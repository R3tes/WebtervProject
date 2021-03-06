<?php
    include_once "common/fuggvenyek.php";
    date_default_timezone_set("Europe/Budapest");
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
        <img src="assets/img/hirek1.jpg" alt="nvidia konferencia" class="topimage">
        <h2 class="insidearticleheader kozepre">Az orosz játékosok büntetése: A Microsoft és az Xbox is leállít szolgáltatásokat Oroszországban</h2>
        <div class="insidearticledatum"><p>Péntek, 2022. március 4.</p><p>Ismeretlen szerző</p></div>
        <div class="insidearticledisclaimer"><span>A cikk nem saját. Forrása <a href="https://leet.hu/2022/03/04/az-orosz-jatekosok-buntetese-a-microsoft-es-az-xbox-is-leallit-szolgaltatasokat-oroszorszagban/" target="_blank">itt</a> elérhető, kizárólag placeholder célból lett a tartalmi lényeg átmásolva.</span></div>
    </section>

    <section>
        <p>A lengyel CD Projekt RED példáját követve a Microsoft is úgy döntött, hogy eleget tesz az ukrán kormányzat kérésének, miszerint állítsanak le minden szolgáltatást Oroszországban.</p>
        <p>Mykhailo Fedorov ukrán miniszterelnök-helyettes ugyan a játékszolgáltatások és platformok totális elérhetetlenségét kérte a játékipari szereplőktől, a redmondi vállalat egyelőre úgy tűnik nem lesz ennyire szigorú. Legalábbis a vállalat bejelentése alapján, amelyben azt írják,</p>
        <p class="kiemeltSzoveg kozepre">hogy minden Microsofthoz tartozó új termék és szolgáltatás értékesítését határozatlan időre beszüntetik Oroszországban.</p>
        <p>Ennek értelmében az orosz civilek-játékosok (akik szintén olyannyira felelősek a háborúért, mint az menekülő-ellenálló ukrán lakosság) nem vásárolhat újabb játékokat sem Xboxon, sem a Microsoft Store-ban PC-n, új felhasználók nem fizethetnek elő Oroszországban a Game Pass-ra és a Microsoft bármelyik másik Windows-szolgáltatására, illetve a fizikai termékek árusítását (konzol, kontroller stb.) is beszüntetik.</p>
        <p>Vagyis elviekben a meglévő orosz felhasználók továbbra is elérik még a profiljaikat és a játékaikat, csupán újakat nem lehet vásárolni. Továbbá feltételezhetjük, hogy a meglévő havi előfizetések nem fognak frissülni, amennyiben a háborús helyzet fennáll. Emellett az USA, az EU és a brit kormányzat tagjaival együttműködve leállítják az oroszországi üzleti tevékenységünk számos aspektusát – de erre nem tértek ki részletesen.</p>
        <p>A Microsoft továbbá azt is megemlítette, hogy beszáll az ukrán kibervédelembe is, vagyis a Microsoft emberei (ha nem is szó szerint, de) az Anonymous hackercsapat oldalán veszi fel a kesztyűt az orosz támadókkal szemben. A vállalat a civilek segítésébe is beszáll, és mozgósítja a Microsoft Philanthropies és az ENSZ ügyekkel foglalkozó csapatait, hogy technológiai és pénzügyi támogatást nyújtsanak a civilek és a humanitárius szervezetek kibertámadásokkal szembeni védelmében.</p>
        <p>Más játékipari szereplő még nem jelentett be hasonló szankciókat Oroszországgal szemben, de a Microsoft gigászát könnyen követheti majd a Sony, az Epic Games és a Valve is, akiket ugyancsak felszólítottak hasonló korlátozások bevezetésére.</p>
        <p><a href="hirek.php" id="backtohirek">Vissza a hírekhez</a></p>
    </section>

</main>

<!-- LÁBLÉC -->

<?php
include_once "common/footer.php";
?>
</body>
</html>