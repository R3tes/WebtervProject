<?php
include_once("classes/Versenyzo.php");
include_once "common/fuggvenyek.php";
session_start();

$versenyzok = adatokBetoltese("data/versenyzok.txt");

$hibak = [];

if (isset($_POST["jelentkezes"])) {
    $teljesNev = $_POST["versenyzoNeve"];
    $szulDatum = $_POST["versenyzoSzulDatum"];
    $email = $_POST["versenyzoEmail"];
    $azonosito = $_POST["versenyzoId"];
    $nem = $_POST["versenyzoNem"];
    $kontroller = $_POST["versenyzoHozKontroller"];
    $tapasztalat = $_POST["versenyzoXP"];
    $bemutatkozas = $_POST["versenyzoBemutatkozas"];

    if (trim($teljesNev) === "" || trim($szulDatum) === "" || trim($email) === "") {
        $hibak[] = "Nem töltött ki minden szükséges mezőt mezőt!";
    }

    if (!preg_match("/[0-9a-z.-]+@([0-9a-z-]+\.)+[a-z]{2,4}/", $email)) {
        $hibak[] = "A megadott e-mail cím formátuma nem megfelelő!";
    }

    if (count($hibak) === 0) {
        $ujversenyzo = new Versenyzo($teljesNev, $szulDatum, $email, $azonosito, $nem, $kontroller, $tapasztalat, $bemutatkozas);
        $versenyzok[] = $ujversenyzo;
        adatokMentese("data/versenyzok.txt", $versenyzok);
        header("Location: bajnoksag.php?sikeresUzi=true");
    }

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

    <section id="bajnoksagSzovegsection">
        <h2>Hosszú fennállásunk alkalmából Smash Bros. bajnokságot rendezünk!</h2>

        <img src="assets/img/smashBrosBajnoksag.jpg" alt="bajnoksag" class="bajnoksag-img anim-zoomin">

        <div class="bajnoksagszoveg">
            <p>
                Weboldalunk 10 éves fennállását megünnepelvén egy <span
                    class="kiemeltSzoveg">Super Smash Bros. Ultimate</span>
                videjátékos bajnokságot hírdetünk, az idei PlayIT show keretein belül fogunk megszervezni
                <span class="kiemeltSzoveg">2022.06.10-én a Hungexpoban</span> Budapesten. Nintendo Switch játékkonzolt
                valamint frissítőket is
                biztosítunk a versenyben résztvevők számára. Kontrollert pedig saját igény szerint lehet hozni,
                ennek hiányában azonban ezt is tudunk szolgáltatni. Ezen felül csak magatokat és legprofibb
                játéktudásotokat kell elhozni.
                <br> <br>
                Pontos cím: <span class="kiemeltSzoveg">1101 Budapest X. kerület, Albertirsai út 10.</span>
            </p>
            <p>
                Mindezeken felül azonban a nyeremények se maradnak el.
                A legjobban teljesítők <span class="kiemeltSzoveg">Monitort, számítógép házat, egyéb perifériákat</span>,
                valamint minden jelentkező között ajándék utalványokat osztunk ki.
            </p>
        </div>

        <h2>Amennyiben részt szeretnél venni a bajnokságban töltsd ki az alábbi jelentkező lapot!</h2>
    </section>

    <?php

    if(isset($_GET["sikeresUzi"])) {
        echo "<div><p>A jelentkezés a versenyre sikeresen megtörtént! Várunk a hejszínen.</p></div>";
    }

    if (count($hibak) > 0) {
        echo "<div>";
        foreach ($hibak as $hiba) {
            echo "<p>" . $hiba . "</p>";
        }
        echo "</div>";
    }

    ?>

    <section id="bajnoksagsection">
        <div class="bajnoksagform">
            <form action="bajnoksag.php" method="POST">
                <fieldset>
                    <legend>Személyes adatok</legend>
                    <label for="username" class="requiredmezo">Teljes neve:</label>
                    <input type="text" id="username" name="versenyzoNeve" required maxlength="50">

                    <label for="bDate" class="requiredmezo">Születési dátum:</label>
                    <input type="date" name="versenyzoSzulDatum" id="bDate" min="1950-01-01"/>

                    <label for="email" class="requiredmezo">E-mail cím: </label>
                    <input type="email" name="versenyzoEmail" id="email">

                    <label>Versenyző azonosító: </label>
                        <input type="number" name="versenyzoId" value="555" disabled>

                </fieldset>

                <fieldset>
                    <legend>Egyéb adatok</legend>
                    <div>
                        Nem:
                        <label> Férfi <input type="radio" name="versenyzoNem" value="male"></label>
                        <label> Nő <input type="radio" name="versenyzoNem" value="female"></label>
                        <label> Egyéb <input type="radio" name="versenyzoNem" value="other"></label>
                    </div>

                    <label class="felhasznaloformCheckbox">
                        <input type="checkbox" name="versenyzoHozKontroller" value="controller">
                        Hozok saját kontrollert
                    </label>

                    <label for="exp">Vettem már részt előleg hasonló versenyeken:</label>
                    <select id="exp" name="versenyzoXP">
                        <option disabled selected value>-Válassz-</option>
                        <option value="yes">Igen</option>
                        <option value="no">Nem</option>
                    </select>

                    <br>

                    <label for="introduction">Bemutatkozás: (max. 2000 karakter): </label> <br>
                    <textarea id="introduction" name="versenyzoBemutatkozas" maxlength="2000" placeholder="Rövid bemutatkozás"></textarea>

                </fieldset>

                <input type="submit" name="jelentkezes" value="Jelentkezés">
                <input type="reset" name="resetgomb" value="Adatok törlése">

            </form>
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