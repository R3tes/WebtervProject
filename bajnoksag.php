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

    <section id="bajnoksagsection">
        <div class="bajnoksagform">
            <form action="#" method="POST">
                <fieldset>
                    <legend>Személyes adatok</legend>
                    <label for="username" class="requiredmezo">Teljes neve:</label>
                    <input type="text" id="username" name="felhasznalonev" required maxlength="50">

                    <label for="bDate" class="requiredmezo">Születési dátum:</label>
                    <input type="date" name="date-of-birth" id="bDate" min="1950-01-01"/>

                    <label for="email" class="requiredmezo">E-mail cím: </label>
                    <input type="email" name="email" id="email">

                    <label>Versenyző azonosító: <input type="number" name="contestant-id" value="69420"
                                                       disabled/></label>
                </fieldset>

                <fieldset>
                    <legend>Egyéb adatok</legend>
                    <div>
                        Nem:
                        <label> Férfi <input type="radio" name="gender" value="male"></label>
                        <label> Nő <input type="radio" name="gender" value="female"></label>
                        <label> Egyéb <input type="radio" name="gender" value="other"></label>
                    </div>

                    <label class="felhasznaloformCheckbox">
                        <input type="checkbox" name="checkbox-04" value="controller">
                        Hozok saját kontrollert
                    </label>

                    <label for="exp">Vettem már részt előleg hasonló versenyeken:</label>
                    <select id="exp">
                        <option disabled selected value>-Válassz-</option>
                        <option value="yes">Igen</option>
                        <option value="no">Nem</option>
                    </select>

                    <br>

                    <label for="introduction">Bemutatkozás: (max. 2000 karakter): </label> <br>
                    <textarea id="introduction" name="intro" maxlength="2000"
                              placeholder="Rövid bemutatkozás"></textarea>

                </fieldset>

                <input type="submit" name="logingomb" value="Jelentkezés">
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