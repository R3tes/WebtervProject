<?php
include_once "classes/Felhasznalo.php";
include_once "classes/CartItem.php";
include_once "classes/Order.php";
include_once "common/fuggvenyek.php";
session_start();

if (!isset($_SESSION["user"]) && !$_SESSION["user"]->isAdmin()) {
    header("Location: login.php");
}

$rendelesek = adatokBetoltese("data/rendelesek.txt");

$nemTeljesitettRendelesek = [];
$teljesitettRendelesek = [];

foreach ($rendelesek as $rendeles) {
    if ($rendeles->isShipped()) {
        $teljesitettRendelesek[] = $rendeles;
    } else {
        $nemTeljesitettRendelesek[] = $rendeles;
    }
}

if (isset($_GET["complete-order-btn"])) {
    $megrendelo = $_GET["orderer"];
    $rendelesDatuma = $_GET["order-date"];

    foreach ($rendelesek as $rendeles) {
        if ($rendeles->getCustomer() === $megrendelo && $rendeles->getOrderDate()->format("Y-m-d H:i:s") === $rendelesDatuma) {
            $rendeles->setShipped(true);
        }
    }

    adatokMentese("data/rendelesek.txt", $rendelesek);
    header("Location: orders.php");
}

if (isset($_GET["delete-order-btn"])) {
    $megrendelo = $_GET["orderer"];
    $rendelesDatuma = $_GET["order-date"];

    foreach ($rendelesek as $rendeles) {
        if ($rendeles->getCustomer() === $megrendelo && $rendeles->getOrderDate()->format("Y-m-d H:i:s") === $rendelesDatuma) {
            $result = array_search($rendeles, $rendelesek, true);
            if ($result !== false) {
                unset($rendelesek[$result]);
            }
        }
    }

    adatokMentese("data/rendelesek.txt", $rendelesek);
    header("Location: orders.php?deletedItem=true");
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
<?php
include_once "common/header.php";
?>

<main>
    <h2 class="kozepre">Rendelések</h2>

    <?php

    if (isset($_GET["deletedItem"])) {
        echo "<div class='sikeres'><p>Rendelés sikeresen törölve!</p></div>";
        header('Refresh: 2; url=orders.php');
    }
    ?>

    <?php if (count($rendelesek) > 0) { ?>
        <?php if (count($nemTeljesitettRendelesek) > 0) { ?>
            <h2 class="kozepre">Aktív (nem teljesített) rendelések</h2>
            <table class="ordersTable-rounded">
                <thead>
                    <tr>
                        <th>Rendelést feladó felhasználó</th>
                        <th>Rendelés dátuma</th>
                        <th>Rendelés tartalma</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <?php foreach ($nemTeljesitettRendelesek as $rendeles) { ?>
                    <tbody>
                        <tr>
                            <td><?php echo $rendeles->getCustomer(); ?></td>
                            <td><?php echo $rendeles->getOrderDate()->format("Y-m-d H:i:s"); ?></td>
                            <td><?php echo implode("<br>", $rendeles->getOrderedItems()); ?></td>
                            <td>
                                <form action="orders.php" method="GET"class="complete-order-form">
                                    <input type="hidden" name="orderer"
                                           value="<?php echo $rendeles->getCustomer(); ?>">
                                    <input type="hidden" name="order-date"
                                           value="<?php echo $rendeles->getOrderDate()->format('Y-m-d H:i:s'); ?>">
                                    <input type="submit" name="complete-order-btn" value="Kiszállítás">
                                </form>
                            </td>
                            <td>
                                <form action="orders.php" method="GET" class="delete-order-form">
                                    <input type="hidden" name="orderer" value="<?php echo $rendeles->getCustomer(); ?>">
                                    <input type="hidden" name="order-date"
                                           value="<?php echo $rendeles->getOrderDate()->format('Y-m-d H:i:s'); ?>">
                                    <input type="submit" name="delete-order-btn" value="Törlés">
                                </form>
                            </td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        <?php } else { ?>
            <p class="kozepre">Nincs egy teljesítetlen rendelés sem!</p>
        <?php } ?>

        <?php if (count($teljesitettRendelesek) > 0) { ?>
            <hr class="invisiblepagebreak">
            <hr>
            <h2 class="kozepre">Kiszállított rendelések</h2>
            <table class="ordersTable-rounded">
                <thead>
                    <tr>
                        <th>Rendelést feladó felhasználó</th>
                        <th>Rendelés dátuma</th>
                        <th>Rendelés tartalma</th>

                    </tr>
                </thead>
                <?php foreach ($teljesitettRendelesek as $rendeles) { ?>
                    <tbody>
                        <tr>
                            <td><?php echo $rendeles->getCustomer(); ?></td>
                            <td><?php echo $rendeles->getOrderDate()->format("Y-m-d H:i:s"); ?></td>
                            <td><?php echo implode("<br>", $rendeles->getOrderedItems()); ?></td>
                        </tr>
                    </tbody>
                <?php } ?>
            </table>
        <?php } ?>

        <hr class="invisiblepagebreak">
        <p class="kozepre">Teljes bevétel: <?php echo whatsMyBevetel($teljesitettRendelesek); ?></p>

    <?php } else { ?>
        <hr class="invisiblepagebreak">
        <p class="kozepre">Még egyetlen rendelés sem érkezett!</p>
    <?php } ?>
</main>

<?php
include_once "common/footer.php";
?>
</body>
</html>