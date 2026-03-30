<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="global.css">
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
            <button>Explore</button>
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
</body>
</html>