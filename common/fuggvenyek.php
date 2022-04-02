<?php

function navigacioGeneralasa()
{
    $aktualisOldal = basename($_SERVER['PHP_SELF'], ".php"); #$_SERVER['REQUEST_URI']

    if ($aktualisOldal === "gamecritics_1" || $aktualisOldal === "gamecritics_2" || $aktualisOldal === "gamecritics_3") {
        $aktualisOldal = "gamecritics";
    } elseif ($aktualisOldal === "hirek_1" || $aktualisOldal === "hirek_2" || $aktualisOldal === "hirek_3") {
        $aktualisOldal = "hirek";
    } elseif ($aktualisOldal === "regisztracio") {
        $aktualisOldal = "bejelentkezes";
    } elseif ($aktualisOldal === "bajnoksag" || $aktualisOldal === "esport_live") {
        $aktualisOldal = "esport";
    }

    echo
        "<li" . ($aktualisOldal === "index" ? " class='active'" : "") . ">" .
        "<a href='index.php'>Főoldal</a>" .
        "</li>" .

        "<li" . ($aktualisOldal === "hirek" ? " class='active'" : "") . ">" .
        "<a href='hirek.php'>Hírek</a>" .
        "</li>" .

        "<li" . ($aktualisOldal === "store" ? " class='active'" : "") . ">" .
        "<a href='store.php'>Termékeink</a>" .
        "</li>" .

        "<li" . ($aktualisOldal === "esport" ? " class='active'" : "") . ">" .
        "<a href='esport.php'>E-Sport</a>" .
        "</li>" .

        "<li" . ($aktualisOldal === "nyeremenyjatek" ? " class='active'" : "") . ">" .
        "<a href='nyeremenyjatek.php'>Nyereményjáték</a>" .
        "</li>" .

        "<li" . ($aktualisOldal === "kapcsolat" ? " class='active'" : "") . ">" .
        "<a href='kapcsolat.php'>Kapcsolat</a>" .
        "</li>" .

        "<li" . ($aktualisOldal === "gamecritics" ? " class='active'" : "") . ">" .
        "<a href='gamecritics.php'>Játék kritikák</a>" .
        "</li>" .

        "<li" . ($aktualisOldal === "bejelentkezes" ? " class='active'" : "") . ">" .
        "<a href='bejelentkezes.php'>Bejelentkezés</a>" .
        "</li>";
}

// Egy függvény, amely a második paraméterben kapott adattömb elemeit szerializálja és elmenti az első paraméterben
// kapott elérési útvonalon található fájlba.

function adatokMentese(string $fajlnev, array $adatok) {
    $file = fopen($fajlnev, "w");

    if (!$file) {
        die("Nem sikerült a fájl megnyitása!");
    }

    foreach ($adatok as $adat) {
        fwrite($file, serialize($adat) . "\n");
    }

    fclose($file);
}

// Egy függvény, amely a paraméterben kapott elérési útvonalon található fájlból beolvassa az adatokat.
// A függvény visszatérési értéke egy tömb, ami a PHP értékké alakított (más szóval deszerializált) adatokat tárolja.

function adatokBetoltese(string $fajlnev): array {
    $file = fopen($fajlnev, "r");
    $adatok = [];

    if (!$file) {
        die("Nem sikerült a fájl megnyitása!");
    }

    while (($sor = fgets($file)) !== false) {
        $adat = unserialize($sor);
        $adatok[] = $adat;
    }

    fclose($file);
    return $adatok;
}
