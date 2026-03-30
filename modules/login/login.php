<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo $_POST["username"] . "<br>";
        echo $_POST["password"] . "<br>";
    }
?>