<?php

session_start();

if (!isset($_SESSION["user"])) {
    header("Location: bejelentkezes.php");
}

session_unset();
session_destroy();

header("Location: bejelentkezes.php");