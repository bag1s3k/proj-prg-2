<?php
    if (!defined('BASE_URL')) {
        define('BASE_URL', '/');
    }

    require_once "connection.php";
    require_once "functions.php";

    function url($path) {
        return BASE_URL . ltrim($path, '/');
    }
?>
