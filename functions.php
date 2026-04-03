<?php

function check_login($con) {
    if (isset($_SESSION["user_id"])) {
        $id = (int)$_SESSION["user_id"];
        $query = "SELECT * FROM users WHERE id = ? LIMIT 1";
        
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    header("Location: " . url("modules/login/login.php"));
    die;
}
