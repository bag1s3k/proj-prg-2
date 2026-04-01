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
    <link rel="stylesheet" href="<?php echo url('modules/nav/topnav.css'); ?>">

    <title>Account Settings</title>
</head>
<body>
    <?php include "../nav/topnav.php"; ?>

    <div class="fixed-width" style="margin: 2em auto;">
        <h1>Vítejte, <?php echo htmlspecialchars($_SESSION["username"] ?? 'Uživateli'); ?></h1>
        <p>Tento obsah vidí pouze přihlášení uživatelé.</p>
        <br>
        <a href="<?php echo url('index.php'); ?>">Zpět na hlavní stránku</a><br><br>
        <a href="<?php echo url('modules/logout/logout.php'); ?>" style="color: red;">Odhlásit se</a>
    </div>
</body>
</html>
