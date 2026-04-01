<?php
    require_once "../../config.php";
    session_start();

    if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
        header("Location: " . url('modules/login/login.html'));
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo url('style.css'); ?>">
    <link rel="stylesheet" href="account.css">
    <link rel="stylesheet" href="<?php echo url('modules/nav/topnav.css'); ?>">

    <title>Account Settings</title>
</head>
<body>
    <?php include "../nav/topnav.php"; ?>

    <main class="container fixed-width">
        
        <section class="profile-section">
            <div class="profile-info">
                <div class="avatar"><?php echo strtoupper($_SESSION["username"][0]); ?></div>
                <div class="profile-details">
                    <h2><?php echo $_SESSION["username"]; ?></h2>
                    <p><?php echo $_SESSION["email"]; ?></p>
                </div>
            </div>
            <a href="<?php echo url("modules/logout/logout.php") ?>" class="btn-logout">Odhlásit se</a>
        </section>

        <h1 class="section-title">Moje aktuální výpůjčky</h1>

        <div class="products-grid">
            <article class="card">
                <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&q=80&w=600" alt="Zrcadlovka" class="card-img">
                <div class="card-body">
                    <h3 class="card-title">Kamera Sony Alpha</h3>
                    <p class="card-desc">Profesionální bezzrcadlovka včetně objektivu 24-70mm a náhradní baterie.</p>
                    <div class="expiration">⏳ Vyprší za: 3 dny</div>
                    <button class="btn-return">Vrátit produkt</button>
                </div>
            </article>
        </div>
    </main>
</body>
</html>
