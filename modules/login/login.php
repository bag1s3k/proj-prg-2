<?php
    session_start();
    require_once "../../config.php";

    $error = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $identifier = $_POST["identifier"] ?? "";
        $password = $_POST["password"] ?? "";

        if (!empty($identifier) && !empty($password)) {
            $query = "SELECT * FROM users WHERE username = ? OR email = ? LIMIT 1";
            $stmt = mysqli_prepare($con, $query); # ready
            mysqli_stmt_bind_param($stmt, "ss", $identifier, $identifier); # steady
            mysqli_stmt_execute($stmt); # go
            $result = mysqli_stmt_get_result($stmt);

            if ($result && mysqli_num_rows($result) > 0) {
                $user_data = mysqli_fetch_assoc($result);
                
                if ($user_data["password"] === $password) {
                    $_SESSION["user_id"] = $user_data["id"];
                    $_SESSION["username"] = $user_data["username"];
                    $_SESSION["login"] = true;

                    header("Location: " . url("index.php"));
                    die;
                }
            }
            $error = "Wrong username/email or password";
        } else {
            $error = "Please enter your credentials";
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

    <title>Login</title>
</head>
<body class="center-flex">
    <div class="login-container">
        <h1>Sign In</h1><br>
        
        <?php if($error): ?>
            <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        
        <?php if(isset($_GET['success'])): ?>
            <p style="color: green;"><?php echo htmlspecialchars($_GET['success']); ?></p>
        <?php endif; ?>

        <form action="login.php" method="post" class="center-flex">
            <div class="form-container">
                <input type="text" name="identifier" placeholder="Username or Email" class="input-field" required><br>
                <input type="password" name="password" placeholder="Password" class="input-field" required><br>
                <input type="submit" value="SIGN IN" class="sign-in input-field">
            </div>
        </form>

        <p>Don't have an account?</p>
        <a href="signup.php" class="href-clean">SIGN UP NOW</a>
    </div>
</body>
</html>
