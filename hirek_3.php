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

<header class="header" id="ontop">

    <div class="logo">
        <a href="index.php">
            <img src="assets/img/long_logo.png" alt="gameter logo">
        </a>
    </div>

    <div class="logo_without_img">
        <a href="index.php">
            <img src="assets/img/long_logo_without_img.png" alt="gameter">
        </a>
    </div>

    <nav>

        <input type="checkbox" class="toggle-menu">
        <div class="hamburger"></div>

        <ul class="menu">
            <li><a href="index.php">Főoldal</a></li>
            <li  class="active"><a href="hirek.php">Hírek</a></li>
            <li><a href="store.php">Termékeink</a></li>
            <li><a href="esport.php">E-sport</a></li>
            <li><a href="nyeremenyjatek.php">Nyereményjáték</a></li>
            <li><a href="kapcsolat.php">Kapcsolat</a></li>
            <li><a href="gamecritics.php">Játék Kritikák</a></li>
            <li><a href="bejelentkezes.php">Bejelentkezés</a></li>
        </ul>
    </nav>

</header>

<!-- FŐ TARTALOM -->
<main>

    <section>
        <img src="assets/img/hirek3.jpg" alt="xbox kontroller" class="topimage">
        <h2 class="insidearticleheader kozepre">George R. R. Martin rendkívül büszke az Elden Ring sikerére</h2>
        <div class="insidearticledatum"><p>Szombat, 2022. március 5.</p><p>Ismeretlen szerző</p></div>
        <div class="insidearticledisclaimer"><span>A cikk nem saját. Forrása <a href="https://esport1.hu/news/2022/03/05/gaming--elden-ring-george-rr-martin-iro-buszke-a-jatek-hatalmas-sikerere-sensevida" target="_blank">itt</a> elérhető, kizárólag placeholder célból lett a tartalmi lényeg átmásolva.</span></div>
    </section>

    <section>
        <p>Hosszú várakozás után nemrég megjelent 2022 egyik legjobban várt játéka, a FromSoftware gondozásában készült Elden Ring. A Dark Souls, Sekiro, illetve Bloodborne játékokat is jegyző stúdió a kritikák alapján ugyan remek munkát végzett, sokan mégis stabilitási problémákra panaszkodnak, amihez már meg is érkezett a teljesítmény javító frissítés..</p>
        <p>A játék megjelenése kapcsán egyébként megszólalt a történet megalkotásában közreműködő, "A tűz és jég dala" fantasy regénysorozatot jegyző George R.R. Martin is. Az író tavaly decemberben még úgy nyilatkozott, hogy a fejlesztők egy sötét világ építésében kérték a segítségét és annak ellenére, hogy a videójátékok viszonylag távol állnak tőle, lenyűgözte a gyönyörű látvány és belevágott, hogy segítsen új japán barátainak. </p>
        <p>Blogposztjában Martin úgy fogalmaz, hogy az Elden Ring "Nemzedékenként egyszeri mestermunka, gyönyörű és brutális nyitott világgal.", de érintettsége miatt ne hallgassunk rá, inkább győzzenek meg minket a kritikai visszhangok. Mindemellett igyekszik kisebbíteni részvételét a projektben és inkább a FromSoftware csapatát méltatja a kiváló munka miatt. </p>
        <p id="hiridezet"><q>Természetesen minden elismerés Hidetaka Miyazakit és elképesztő fejlesztő csapatát illeti, akik már vagy fél évtizede dolgoznak ezen a játékon és elhatározták, hogy a valaha volt legjobb videójátékot csinálják meg. Megtiszteltetés számomra, hogy találkozhattam és dolgozhattam velük, továbbá még ha csekély mértékben is, de részt vehettem ennek a fantasztikus világnak a megteremtésében és az Elden Ring mérföldkővé tételében.</q></p>
        <p>Érdekesség, hogy az író korábban már kipróbált olyan stratégiai játékokat, mint a Railroad Tycoon, a Romance of the Three Kingdoms, továbbá a Master of Orion, ezért nem lepődnénk meg, ha már saját karakterével kalandozna az Elden Ring világában.</p>
        <p><a href="hirek.php" id="backtohirek">Vissza a hírekhez</a></p>
    </section>

</main>

<!-- LÁBLÉC -->

<?php
include_once "common/footer.php";
?>
</body>
</html>