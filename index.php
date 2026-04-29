<?php
    require_once "config.php";
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        $del_query = "DELETE FROM products WHERE id = ?";
        $stmt = mysqli_prepare($con, $del_query);
        mysqli_stmt_bind_param($stmt, "i", $delete_id);
        mysqli_stmt_execute($stmt);
        header("Location: account.php");
        die;
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
        <a class="href-clean" href="#">Team Sports</a>
        <a class="href-clean" href="#">Individual Sports</a>
        <a class="href-clean" href="#">Endurance Sports</a>
        <a class="href-clean" href="#">Precision Sports</a>
    </nav>

    <div id="cards-container" class="center-flex fixed-width">
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="card">
                    <img src="<?php echo htmlspecialchars($row["image_url"]); ?>">
                    <div id="description">
                        <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus molestias</p>
                        <div id="bottom">
                            <p>50 KČ/h</p>
                            <button class="center-flex">
                                <img src="<?php echo url('images/icons/shopping-cart.png'); ?>">
                                <p>Add</p>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Žádné produkty k zobrazení.</p>
        <?php endif; ?>
    </div>

    <?php include "modules/footer/footer.php"; ?>
</body>
</html>
