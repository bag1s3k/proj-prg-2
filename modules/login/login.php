<?php
    session_start();


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["username"] = $_POST["username"];

        $_SESSION["login"] = true;
        header("Location: ../../index.php");
        exit();
    }
?>