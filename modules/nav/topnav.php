<div id="nav-container" class="center-flex">
    <nav class="fixed-width center-flex">
        <a href="index.php" class="href-clean nav-logo">
            <div class="center-flex">
                <img src="images/icons/favicon.png" alt="Lendly Logo">
                <h1>Lendly</h1>
            </div>
        </a>

        <div id="hrefs">
            <a class="href-clean" href="#products-h1">Products</a>
            <a class="href-clean" href="modules/account/account.php">Borrowed</a>
            <a class="href-clean" href="#">Contact</a>
            <a class="href-clean" href="modules/account/account.php">Notifications</a>
        </div>

        <div class="nav-icons center-flex">
            <a href="modules/cart/cart.php">
                <img src="images/icons/shopping-cart.png" alt="Cart" class="cart-icon">
            </a>
            <a href="modules/account/account.php">
                <img src="images/icons/account-nologin.png" alt="Login" class="user-icon">
            </a>
            <a href="modules/account/account.php" class="href-clean">
                <?php
                    session_start();
    
                    if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
                        echo "Log In";
                    } else {
                        echo "Admin";
                    }
                ?>
            </a>
        </div>

    </nav>
</div>
