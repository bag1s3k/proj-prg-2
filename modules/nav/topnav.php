<?php
    if (!defined('BASE_URL')) {
        require_once dirname(__DIR__, 2) . "/config.php";
    }
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
?>
<div id="nav-container" class="center-flex">
    <nav class="fixed-width center-flex">
        <a href="<?php echo url('index.php'); ?>" class="href-clean nav-logo">
            <div class="center-flex">
                <img src="<?php echo url('images/icons/favicon.png'); ?>" alt="Lendly Logo">
                <h1>Lendly</h1>
            </div>
        </a>

        <div id="hrefs">
            <a class="href-clean" href="<?php echo url('index.php#products-h1'); ?>">Products</a>
            <a class="href-clean" href="<?php echo url('modules/account/account.php#borrows-navigation'); ?>">Borrowed</a>
            <a class="href-clean" href="<?php echo url("index.php#footer"); ?>">Contact</a>
            <a class="href-clean" href="<?php echo url('modules/account/account.php'); ?>">Notifications</a>
        </div>

        <div class="nav-icons center-flex">
            <a href="<?php echo url('modules/account/account.php'); ?>">
                <img src="<?php echo url('images/icons/shopping-cart.png'); ?>" alt="Cart" class="cart-icon">
            </a>
            <a href="<?php echo url('modules/account/account.php'); ?>">
                <img src="<?php echo url('images/icons/account-nologin.png'); ?>" alt="Login" class="user-icon">
            </a>
            <a href="<?php echo url('modules/account/account.php'); ?>" class="href-clean">
                <?php
                    if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
                        echo "Log In";
                    } else {
                        echo $_SESSION["username"];
                    }
                ?>
            </a>
        </div>

    </nav>
</div>
