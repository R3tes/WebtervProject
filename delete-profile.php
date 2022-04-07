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

        $engedelyezettKiterjesztesek = ["png", "jpg", "jpeg"];
        $utvonal = "assets/img/profile-pictures/" . $_SESSION["user"]->getFelhasznalonev();

        foreach ($engedelyezettKiterjesztesek as $kit) {
            if (is_file("$utvonal.$kit")) {
                unlink("$utvonal.$kit");
            }
        }

        session_unset();
        session_destroy();
        header("Location: bejelentkezes.php");
    }
    else {
        header("Location: profile.php");
    }
