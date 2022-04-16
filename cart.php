<?php
include_once "common/fuggvenyek.php";
include_once "classes/Felhasznalo.php";
include_once "classes/Termek.php";
include_once "classes/CartItem.php";
include_once "classes/Order.php";
session_start();

if (!isset($_SESSION["user"])) {
    header("Location: bejelentkezes.php");
}

if (isset($_SESSION["user"]) && $_SESSION["user"]->isAdmin()) {
    header("Location: orders.php");
}

$felhasznalo = $_SESSION["user"];
$kosar = $felhasznalo->getKosar();

if (isset($_GET["removeCartItem"])) {
    $torlendoItemNeve = $_GET["itemName"];
    $ujKosar = [];

    foreach ($kosar as $item) {
        if ($item->getNev() !== $torlendoItemNeve) {
            $ujKosar[] = $item;
        }
        if ($item->getNev() === $torlendoItemNeve && $item->getKosarMennyiseg() !== 1) {
            $item->setKosarMennyiseg($item->getKosarMennyiseg() - 1);
            $ujKosar[] = $item;
        }
    }

    $felhasznalo->setKosar($ujKosar);
    modifyUser("data/felhasznalok.txt", $felhasznalo);
    header("Location: cart.php");
}

if (isset($_GET["orderButton"])) {
    $rendelesek = adatokBetoltese("data/rendelesek.txt");

    $rendeles = new Order($felhasznalo->getFelhasznalonev(), $kosar);
    $rendelesek[] = $rendeles;
    adatokMentese("data/rendelesek.txt", $rendelesek);

    $felhasznalo->setKosar([]);
    modifyUser("data/felhasznalok.txt", $felhasznalo);
    header("Location: cart.php?siker=true");
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
    <section>
    <h2 class="kozepre">Kosaram</h2>
    </section>

    <?php
    if (isset($_GET["siker"])) {
        echo "<div class='sikeres'><p>Sikeres rendelés!</p></div>";
    }
    ?>

    <?php if (count($kosar) > 0) { ?>
        <table class="cartTable">
            <thead>
                <tr>
                    <th>Termék neve</th>
                    <th>Mennyiség (db)</th>
                    <th>Ár (összesített)</th>
                    <th>Törlés</th>
                </tr>
            </thead>
            <?php foreach ($kosar as $item) { ?>
            <tbody>
                <tr>
                    <td><?php echo $item->getNev(); ?></td>
                    <td><?php echo $item->getKosarMennyiseg(); ?></td>
                    <td><?php echo $item->getAr() . " Ft"; ?></td>
                    <td>
                        <form action="cart.php" method="GET" class="cart-delete-form">
                            <input type="hidden" name="itemName" value="<?php echo $item->getNev(); ?>">
                            <input type="submit" name="removeCartItem" value="Törlés a kosárból">
                        </form>
                    </td>
                </tr>
            </tbody>
            <?php } ?>
            <tr class="total-sum">
                <th colspan="4">Végösszeg: <?php echo vegosszeg($kosar) ?> Ft</th>
            </tr>
        </table>

        <form action="cart.php" method="GET" class="order-form">
            <input type="submit" name="orderButton" value="Rendelés">
        </form>
    <?php } else { ?>
        <p class="kozepre">A kosarad jelenleg üres!</p>
    <?php } ?>

    <hr class="invisiblepagebreak">

</main>

<!-- LÁBLÉC -->

<?php
include_once "common/footer.php";
?>

</body>
</html>
