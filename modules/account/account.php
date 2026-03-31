<?php
    session_start();

    if (!isset($_SESSION["login"]) || $_SESSION["login"] !== true) {
        header("Location: ../login/login.html");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
</head>
<body>
    <h1>Vítejte v nastavení účtu</h1>
    <p>Tento obsah vidí pouze přihlášení uživatelé.</p>
    <a href="../../index.php">Zpět na hlavní stránku</a><br>
    <a href="../logout/logout.php">Log out</a>
</body>
</html>
