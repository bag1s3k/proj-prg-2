<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="modules/nav/topnav.css">
    <link rel="stylesheet" href="modules/login/login.css">

    <link rel="icon" href="images/icons/favicon.png" type="image/x-icon">

    <title>Lendly</title>
</head>
<body>
    <?php include "modules/nav/topnav.php"; ?>

    <div id="first-page">
        <div>
            <h1>Premium Quality Products</h1>
            <p>Discover our exclusive collection of sports equipment to borrow</p>
            <a href="#products-h1" class="href-clean">Explore</a>
        </div>
    </div>

    <h1 id="products-h1">Products</h1>
    <nav id="products-nav" class="">
        <a class="href-clean" href="http://">Team Sports</a>
        <a class="href-clean" href="http://">Individual Sports</a>
        <a class="href-clean" href="http://">Endurance Sports</a>
        <a class="href-clean" href="http://">Precision Sports</a>
    </nav>

    <div id="cards-container" class="center-flex fixed-width">
        <div class="card">
            <img src="images/sports-images/soccer-ball.jpg" alt="soccer ball">
            <div id="description">
                <h2>Soccer ball</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus molestias</p>
                <div id="bottom">
                    <p>50 KČ/h</p>
                    <button class="center-flex">
                        <img src="images/icons/shopping-cart.png">
                        <p>Add</p>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <footer>
        <h1>Lendly</h1>
        <div id="hrefs">
            <a href="#" class="href-clean">About</a>
            <a href="#" class="href-clean">Services</a>
            <a href="#" class="href-clean">Press</a>
            <a href="#" class="href-clean">Careers</a>
            <a href="#" class="href-clean">FAQ</a>
            <a href="#" class="href-clean">Legal</a>
            <a href="#" class="href-clean">Contact</a>
        </div>

        <h2>Stay in touch</h2>
        <div id="socials">
            <a href="#">
                <img src="images/icons/instagram.png" alt="">
            </a>
            <a href="#">
                <img src="images/icons/facebook.png" alt="">
            </a>
            <a href="#">
                <img src="images/icons/twitter.png" alt="">
            </a>
            <a href="#">
                <img src="images/icons/pinterest.png" alt="">
            </a>
            <a href="#">
                <img src="images/icons/reddit.png" alt="">
            </a>
        </div>

        <p>© bag1s3k all rights reserverd</p>
    </footer>
</body>
</html>