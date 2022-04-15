<header class="header ontop" id="ontop">

    <div class="logo">
        <a href="index.php">
            <img src="assets/img/long_logo.png" alt="gameter logo">
        </a>
    </div>

    <div class="logo_without_img">
        <a href="index.php">
            <img src="assets/img/long_logo_without_img.png" alt="gameter">
        </a>
    </div>

    <nav>
        <input type="checkbox" class="toggle-menu">
        <div class="hamburger"></div>

        <ul class="menu">
            <?php
                include_once "common/fuggvenyek.php";
                navigacioGeneralasa();
            ?>
        </ul>
    </nav>

</header>
