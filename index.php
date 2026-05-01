<?php
    require_once "config.php";
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['delete_id'])) {
            $delete_id = $_POST['delete_id'];
            $del_query = "DELETE FROM products WHERE id = ?";
            $stmt = mysqli_prepare($con, $del_query);
            mysqli_stmt_bind_param($stmt, "i", $delete_id);
            mysqli_stmt_execute($stmt);
            header("Location: account.php");
            die;
        }

        if (isset($_POST['borrow_id'])) {
            if (!isset($_SESSION['user_id'])) {
                header("Location: " . url("modules/login/login.php"));
                die;
            }
            $borrow_id = $_POST['borrow_id'];
            $user_id = $_SESSION['user_id'];
            $update_query = "UPDATE products SET available = ? WHERE id = ? AND (available = 0 OR available IS NULL)";
            $stmt = mysqli_prepare($con, $update_query);
            mysqli_stmt_bind_param($stmt, "ii", $user_id, $borrow_id);
            mysqli_stmt_execute($stmt);
            header("Location: index.php#product-" . $borrow_id + 3);
            die;
        }
    }

    $query = "SELECT * FROM products ORDER BY id DESC";
    $result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="<?php echo url('style.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('modules/nav/topnav.css'); ?>">
    <link rel="stylesheet" href="<?php echo url('modules/account/account.css'); ?>">

    <link rel="icon" href="<?php echo url('images/icons/favicon.png'); ?>" type="image/x-icon">

    <title>Lendly</title>
</head>
<body>
    <?php include "modules/nav/topnav.php"; ?>

    <div id="first-page">
        <div>
            <h1>Premium Quality Products</h1>
            <p>Discover our exclusive collection of sports equipment to borrow</p>
            <a href="#products-h1" class="href-clean">Explore</a>
        </div>
    </div>

    <h1 id="products-h1">Products</h1>
    <nav id="products-nav" class="">
        <a class="href-clean">Team Sports</a>
        <a class="href-clean">Individual Sports</a>
        <a class="href-clean">Endurance Sports</a>
        <a class="href-clean">Precision Sports</a>
    </nav>

    <div id="cards-container" class="products-grid fixed-width">
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <article id="product-<?php echo $row['id']; ?>" class="card <?php if ($row['available'] > 0) { echo 'product-unavailable'; } ?>">
                    <img src="<?php echo htmlspecialchars($row["image_url"]); ?>" class="card-img">
                    <div class="card-body">
                        <h3 class="card-title"><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p class="card-desc"><?php echo htmlspecialchars($row['description']); ?></p>
                        <?php if ($row['available'] == 0 || $row['available'] == NULL): ?>
                            <form method="POST">
                                <input type="hidden" name="borrow_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" class="btn-return center-flex" style="gap: 8px;">
                                    <img src="<?php echo url('images/icons/shopping-cart.png'); ?>" style="height: 1.2em; filter: brightness(0) invert(1);">
                                    Add
                                </button>
                            </form>
                        <?php else: ?>
                            <button class="btn-return center-flex" style="gap: 8px; opacity: 0.5; cursor: not-allowed;" disabled>
                                Borrowed
                            </button>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Žádné produkty k zobrazení.</p>
        <?php endif; ?>
    </div>

    <?php include "modules/footer/footer.php"; ?>
</body>
</html>
