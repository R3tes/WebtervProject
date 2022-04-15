<?php
include_once "common/fuggvenyek.php";
include_once "classes/Felhasznalo.php";
include_once "classes/Termek.php";
include_once "classes/CartItem.php";

session_start();

$termekek = adatokBetoltese("data/termekek.txt");

if (isset($_SESSION["user"]) && isset($_GET["addToCartButton"])) {
    $felhasznalo = $_SESSION["user"];
    $kosar = $felhasznalo->getKosar();
    $termekneve = $_GET["itemName"];

    foreach ($termekek as $termek) {

        if ($termek->getTermekNev() === $termekneve) {
            $item = new CartItem($termek);
            $felhasznalo->kosarbaTesz($item);
        }
    }

    modifyUser("data/felhasznalok.txt", $felhasznalo);
    header("Location: store.php?siker=true");
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
    <?php
    echo "<section>";
    if (isset($_GET["siker"])) {
        echo "<div class='sikeres'><p>A termék sikeresen a kosárba helyeződött!</p></div>";
    }
    echo "</section>";
    ?>

    <section>
        <h2 class="hirheader">Termékeink!</h2>
    </section>

    <table class="storeTable">
        <tr>
            <th>Termék</th>
            <th>Név</th>
            <th>Raktáron (db)</th>
            <th>Ár (1 db)</th>
            <?php if (isset($_SESSION["user"])) { ?>
                <th>Kosárba tétel</th>
            <?php } ?>
        </tr>
        <?php
        $i = 1;
        foreach ($termekek as $termek) { ?>
            <tr>
                <td>
                    <a href="cart.php" class="storelink anim-zoomin">
                        <?php echo '<img src="assets/img/termek_' . $i . '.png" alt="termek" height="100" >' ?>
                    </a>
                </td>
                <td style="max-width: 400px;">
                    <b><?php echo $termek->getTermekNev(); ?></b>
                </td>
                <td>
                    <?php echo $termek->getMennyiseg(); ?>
                </td>
                <td>
                    <?php echo $termek->getAr() . " Ft"; ?>
                </td>
                <?php if (isset($_SESSION["user"])) { ?>
                    <td>
                        <form action="store.php" method="GET">
                            <input type="hidden" name="itemName" value="<?php echo $termek->getTermekNev(); ?>">

                            <?php
                            if ($termek->getMennyiseg() === 0) {
                                echo '<p class="nincsRaktaron">Elfogyott!</p>';
                            } else {
                                echo '<input type="submit" name="addToCartButton" value="Kosárba" class="storeButton">';
                            }
                            ?>
                        </form>
                    </td>
                <?php } ?>
            </tr>
            <?php $i++;
        } ?>
    </table>

    <hr class="invisiblepagebreak">
</main>

<!-- LÁBLÉC -->

<?php
include_once "common/footer.php";
?>
</body>
</html>