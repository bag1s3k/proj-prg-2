<?php
    session_start();
    require_once "../../config.php";

    $error = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        if (!empty($username) && !empty($email) && !empty($password)) {
            $check_query = "SELECT id FROM users WHERE username = ? OR email = ? LIMIT 1";
            $stmt = mysqli_prepare($con, $check_query); # ready
            mysqli_stmt_bind_param($stmt, "ss", $username, $email); # steady
            mysqli_stmt_execute($stmt); # go
            $check_result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($check_result) > 0) {
                $error = "Username or email already exists";
            } else {
                $query = "INSERT INTO users (username, email, password, date) VALUES (?, ?, ?, NOW())";
                $stmt = mysqli_prepare($con, $query);
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashed_password);
                mysqli_stmt_execute($stmt);

                header("Location: " . url("modules/login/login.php?success=Account created successfully!"));
                die;
            }
        } else {
            $error = "Please enter some valid information";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="../../global.css">

    <title>Sign Up</title>
</head>
<body class="center-flex">
    <div class="login-container">
        <h1>Sign Up</h1><br>
        
        <?php if($error): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form action="signup.php" method="post" class="center-flex">
            <div class="form-container">
                <input type="text" name="username" placeholder="Username" class="input-field" required><br>
                <input type="email" name="email" placeholder="Email" class="input-field" required><br>
                <input type="password" name="password" placeholder="Password" class="input-field" required><br>
                <input type="submit" value="SIGN UP" class="sign-in input-field">
            </div>
        </form>

        <p>Already have an account?</p>
        <a href="login.php" class="href-clean">LOG IN NOW</a>
    </div>
</body>
</html>
