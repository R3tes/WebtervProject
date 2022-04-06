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
        <h2 class="hirheader">Neked ajánljuk!</h2>
    </section>

    <section>
        <div class="kepekegymasMellett">

            <a href="https://www.amazon.com/SteelSeries-Arctis-Wireless-Gaming-Headset/dp/B09KMGHPCY?th=1"
               class="storelink">
                <img src="assets/img/headset.png" alt="fejhallgató" class="storeImage anim-zoomin">
                <p>SteelSeries Arctis 7P+ Wireless Gaming Headset - Lossless 2.4 GHz</p>
            </a>

            <a href="https://www.arukereso.hu/billentyuzet-c3111/white-shark/gk-2106-p744361146/?utm_medium=organic&utm_source=google"
               class="storelink">
                <img src="assets/img/keyboard.png" alt="billentyűzet" class="storeImage anim-zoomin">
                <p>White Shark GK - 2106 Commandos Mechanikus Red Switch Gaming Billentyűzet</p>
            </a>

            <a href="https://www.amazon.com/Glorious-Model-Gaming-Mouse-Minus/dp/B088C43S9R/ref=sr_1_1_sspa?adgrpid=81796059256&gclid=CjwKCAjw_tWRBhAwEiwALxFPoXFo54pkbi8d_ku1Iw_Q_bP3sDPf1EhsV1onO79cllbNq9_CoQtoxxoCT2UQAvD_BwE&hvadid=585362630811&hvdev=c&hvlocint=9076360&hvlocphy=9063072&hvnetw=g&hvqmt=b&hvrand=12924294822454815431&hvtargid=kwd-910879370293&hydadcr=20778_13331681&keywords=glorious+model+d+minus&qid=1647723409&sr=8-1-spons&psc=1&spLa=ZW5jcnlwdGVkUXVhbGlmaWVyPUExV0JHSjlUT1dSQzIwJmVuY3J5cHRlZElkPUEwMTY4MDc4UUpSTlgzTTVTM05HJmVuY3J5cHRlZEFkSWQ9QTAxNTk5NTdaSlZTVDZXRjBONVYmd2lkZ2V0TmFtZT1zcF9hdGYmYWN0aW9uPWNsaWNrUmVkaXJlY3QmZG9Ob3RMb2dDbGljaz10cnVl"
               class="storelink">
                <img src="assets/img/mouse.png" alt="egér" class="storeImage anim-zoomin">
                <p>Glorious PC Gaming Race Model D - RGB USB Gaming Egér</p>
            </a>
        </div>
    </section>

    <section>
        <h2 class="hirheader">Exklúzív ajánlataink</h2>
    </section>

    <section>
        <div class="kepekegymasMellett">

            <a href="https://www.amazon.com/SAMSUNG-FreeSync-Adjustable-Borderless-LF27G35TFWNXZA/dp/B08SJF7TZ2"
               class="storelink">
                <img src="assets/img/monitor.png" alt="monitor" class="storeImage anim-zoomin">
                <p>Samsung Odyssey G3 S27AG300NU 27″ HDMI Display port 144 Hz Monitor</p>
            </a>

            <a href="https://www.emag.hu/white-shark-thunderbolt-rgb-max-150kg-fekete-mubor-gamer-szek-thunderbolt/pd/DWQNVMMBM/"
               class="storelink">
                <img src="assets/img/gamingchair.png" alt="gamer szék" class="storeImage anim-zoomin">
                <p>White Shark Thunderbolt RGB max. 150kg fekete műbőr gamer szék</p>
            </a>

            <a href="https://www.amazon.com/SteelSeries-QcK-Gaming-Surface-Optimized/dp/B07HYXKWS9" class="storelink">
                <img src="assets/img/mousepad.png" alt="egérpad" class="storeImage anim-zoomin">
                <p>SteelSeries QcK Gaming Surface - XL RGB Prism egérpad</p>
            </a>
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