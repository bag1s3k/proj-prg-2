<?php
    session_start();
    require_once "../../config.php";

    if (isset($_SESSION["user_id"])) {
        unset($_SESSION["user_id"]);
        unset($_SESSION["username"]);
        unset($_SESSION["login"]);
    }

    header("Location: " . url("index.php"));
    die;
?>
