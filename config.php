<?php
    if (!defined('BASE_URL')) {
        define('BASE_URL', '/');
    }

    // Pomocná funkce pro generování cest
    function url($path) {
        return BASE_URL . ltrim($path, '/');
    }
?>
