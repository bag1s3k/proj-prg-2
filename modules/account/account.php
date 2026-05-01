<?php
    session_start();
    require_once "../../config.php";

    $user_data = check_login($con);
    $user_id = $_SESSION['user_id']; 

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['return_id'])) {
        $return_id = $_POST['return_id'];

        $return_query = "UPDATE products SET available = 0 WHERE id = ? AND available = ?";
        $stmt_return = mysqli_prepare($con, $return_query);
        mysqli_stmt_bind_param($stmt_return, "ii", $return_id, $user_id);
        mysqli_stmt_execute($stmt_return);

        header("Location: " . basename($_SERVER['PHP_SELF']));
        die;
    }

    $borrow_query = "SELECT * FROM products WHERE available = ?";
    $stmt = mysqli_prepare($con, $borrow_query);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $borrowed_result = mysqli_stmt_get_result($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?php echo url('style.css'); ?>">
    <link rel="stylesheet" href="account.css">
    <link rel="stylesheet" href="<?php echo url('modules/nav/topnav.css'); ?>">

    <title>Account Settings</title>
</head>
<body>
    <?php include "../nav/topnav.php"; ?>

    <main class="container fixed-width">
        
        <section class="profile-section">
            <div class="profile-info">
                <div class="avatar"><?php echo strtoupper(htmlspecialchars($user_data["username"][0])); ?></div>
                <div class="profile-details">
                    <h2><?php echo htmlspecialchars($user_data["username"]); ?></h2>
                    <p><?php echo htmlspecialchars($user_data["email"]); ?></p>
                </div>
            </div>
            <a href="<?php echo url("modules/logout/logout.php") ?>" class="btn-logout">Sign Out</a>
        </section>

        <?php 
            if ($_SESSION["username"] === "admin") {
                include "admin_account.php";
            }
        ?>

        <h1 class="section-title" id="borrows-navigation">My current borrows</h1>

        <div class="products-grid">
            <?php if ($borrowed_result && mysqli_num_rows($borrowed_result) > 0): ?>
                
                <?php while($row = mysqli_fetch_assoc($borrowed_result)): ?>
                    <article class="card">
                        <img src="<?php echo htmlspecialchars($row["image_url"]); ?>" alt="<?php echo htmlspecialchars($row["title"]); ?>" class="card-img">
                        <div class="card-body">
                            <h3 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h3>
                            <p class="card-desc"><?php echo htmlspecialchars($row['description']); ?></p>
                            
                            <form method="POST">
                                <input type="hidden" name="return_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn-return">Vrátit produkt</button>
                            </form>
                        </div>
                    </article>
                <?php endwhile; ?>

            <?php else: ?>
                <p>Currently you don't have any borrowed products</p>
            <?php endif; ?>
        </div>
        
    </main>

    <?php include "../footer/footer.php"; ?>
</body>
</html>