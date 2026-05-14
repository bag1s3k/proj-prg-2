<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
        $delete_id = $_POST['delete_id'];
        $del_query = "DELETE FROM products WHERE id = ?";
        $stmt = mysqli_prepare($con, $del_query);
        mysqli_stmt_bind_param($stmt, "i", $delete_id);
        mysqli_stmt_execute($stmt);
        header("Location: account.php");
        die;
    }

    $query = "SELECT products.*, users.username FROM products LEFT JOIN users ON products.available = users.id ORDER BY products.id DESC";
    $result = mysqli_query($con, $query);
?>

<link rel="stylesheet" href="add_product.css">

<div class="admin-container">
    <div class="admin-header">
        <h2>Products management</h2>
        <a href="add_product.php" class="btn-add">+ Add product</a>
    </div>

    <div class="product-list">
        <?php if ($result && mysqli_num_rows($result) > 0): ?>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <div class="product-row <?php if ($row['available'] > 0) { echo 'product-unavailable'; } ?>">
                    <div class="product-info">
                        <img src="<?php echo htmlspecialchars($row['image_url']); ?>" alt="Product" class="row-img">
                        <h3 class="row-title"><?php echo htmlspecialchars($row['title']); ?></h3>
                        <p><?php echo $row['username'] ? htmlspecialchars($row['username']) : ""; ?></p>
                    </div>
                    
                    <form method="POST" onsubmit="return confirm('Opravdu odstranit?');">
                        <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                        <button type="submit" class="btn-delete">Remove</button>
                    </form>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Žádné produkty k zobrazení.</p>
        <?php endif; ?>
    </div>
</div>