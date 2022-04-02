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
      <h2 class="hirheader">Az elmúlt napok legfontosabb hírei... Egy helyen!</h2>
    </section>

    <section>
      <div class="articlepost">
        <div class="articlepost-img">
          <img src="assets/img/hirek3.jpg" alt="George RR Martin" class="anim-zoomin">
        </div>
        <div class="articleinformacio">
          <div class="articledatum">
            <span>Szombat, </span>
            <span>2022. március 5.</span>
          </div>
          <h2 class="articlecim">George R. R. Martin rendkívül büszke az Elden Ring sikerére</h2>
          <p class="articleszoveg">
            A világhírű fantasy író blogposztjában magasztalta a játékot és a FromSoftware fejlesztőit.
          </p>
          <a href="hirek_3.php" class="reszletesebben">Részletesebben</a>
        </div>
      </div>
    </section>

    <hr>

    <section>
    <div class="articlepost">
      <div class="articlepost-img">
        <img src="assets/img/hirek2.jpg" alt="nvidia konferencia" class="anim-zoomin">
      </div>
      <div class="articleinformacio">
        <div class="articledatum">
          <span>Szombat, </span>
          <span>2022. március 5.</span>
        </div>
        <h2 class="articlecim">Az Nvidiát megtámadó hackerek 70 ezer ember adatait tették közzé</h2>
        <p class="articleszoveg">
          Hatalmas mennyiségű alkalmazott adatait tették elérhetővé a hackerek, de valami nem teljesen stimmel ezekkel a számokkal.
        </p>
        <a href="hirek_2.php" class="reszletesebben">Részletesebben</a>
      </div>
    </div>
    </section>

    <hr>

    <section>
    <div class="articlepost">
      <div class="articlepost-img">
        <img src="assets/img/hirek1.jpg" alt="xbox kontroller" class="anim-zoomin">
      </div>
      <div class="articleinformacio">
        <div class="articledatum">
          <span>Péntek, </span>
          <span>2022. március 4.</span>
        </div>
        <h2 class="articlecim">Az orosz játékosok büntetése: A Microsoft és az Xbox is leállít szolgáltatásokat Oroszországban</h2>
        <p class="articleszoveg">
          A napokban azt kérték a komplett játékipartól, hogy keményen büntessék meg Oroszországot – ennek a kérésnek tesz most készséggel eleget a Microsoft.
        </p>
        <a href="hirek_1.php" class="reszletesebben">Részletesebben</a>
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