<?php
    include_once "classes/Felhasznalo.php";
    include_once "common/fuggvenyek.php";
    session_start();

    $hibak = [];

    if (!isset($_SESSION["user"])) {
        header("Location: bejelentkezes.php");
    }

    $felhasznalok = adatokBetoltese("data/felhasznalok.txt");

    $torlendoFelhasznalo = $_SESSION["user"];

    if (($key = array_search($torlendoFelhasznalo, $felhasznalok)) !== false) {
        unset($felhasznalok[$key]);
        adatokMentese("data/felhasznalok.txt", $felhasznalok); 
        session_unset();
        session_destroy();
        header("Location: bejelentkezes.php.php");
    }
    else {
        header("Location: profile.php");
    }
