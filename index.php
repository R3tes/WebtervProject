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
        <h2>Legfrisebb híreink...</h2>
        <div class="fooldalkepesszoveg">
            <img src="assets/img/hirek3.jpg" alt="George RR Martin" class="fooldalhirkep">
            <div>
                <div class="articleinformacio">
                    <div class="articledatum">
                    </div>
                    <h2 class="articlecim fooldalhircim"><a href="hirek_3.php">George R. R. Martin rendkívül
                        büszke az Elden Ring sikerére </a></h2>
                    <p class="articleszoveg">
                        A világhírű fantasy író blogposztjában magasztalta a játékot és a FromSoftware fejlesztőit.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <hr>

    <section>
        <h2>E heti nyereményjátékunk</h2>
        <div class="fooldalkepesszoveg">
            <img src="assets/img/tarsasjatek.png" alt="Társasjáték" id="fooldalnyeremenyjatekkep">
            <p>Az e heti nyereményjátékunk keretében a tied lehet három vadonatúj
                <span class="kiemeltSzoveg">Piatnik Activity Club Edition</span>
                felnőtt társasjáték egyike! De ez még nem minden... Ha márciusban minden héten teljesíted az alapvető
                követelményeket,
                esélyed lehet nyerni egy <span class="kiemeltSzoveg">Xbox Series X-et</span> is!
                <a href="nyeremenyjatek.php" id="nyjreszvetel"> Vegyen részt a nyereményjátékban! </a>
            </p>
        </div>
    </section>

    <hr>

    <section>
        <h2>Retrózás</h2>
        <div class="fooldalkepesszoveg">
            <img src="assets/img/critics3.jpg" alt="Playstation Classic" class="fooldalhirkep">
            <div>
                <div class="articleinformacio">
                    <div class="articledatum">
                    </div>
                    <h2 class="articlecim fooldalhircim"><a href="gamecritics_3.php">Régi konzol új külsőben</a></h2>
                    <p class="articleszoveg">
                        Megjelent a közkedvelt ám már forgalomból kivont Playstation 1 felújított változata Playstation Classic néven.
                    </p>
                </div>
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