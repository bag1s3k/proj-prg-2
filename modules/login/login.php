<?php
    session_start();


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $password =  $_POST["password"];

        if ($username === "admin" && $password === "admin") {
            $_SESSION["login"] = true;
            header("Location: ../../index.php");
            exit();
        }
    }
?>