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

<style>
    @import "../../global.css";

    .admin-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        padding: 20px;
        background: white;
        box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
        border-radius: 8px;
    }
    
    .btn-add {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        border-radius: 5px;
        font-weight: bold;
        transition: background-color 0.2s;
    }

    .btn-add:hover {
        background-color: #45a049;
    }

    .product-list {
        display: flex;
        flex-direction: column;
        gap: 15px;
        padding: 10px 0;
    }

    .product-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: white;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 15px 20px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
        transition: box-shadow 0.2s ease;
    }

    .product-row:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .product-info {
        display: flex;
        align-items: center;
        gap: 20px;
    }

    .row-img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 6px;
    }

    .row-title {
        margin: 0;
        font-size: 1.2rem;
        color: #333;
    }

    .btn-delete {
        background-color: #f44336;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        transition: background-color 0.2s;
    }

    .btn-delete:hover {
        background-color: #d32f2f;
    }
</style>

<div class="admin-container">
    <div class="admin-header">
        <h2>Products management</h2>
        <a href="add_product.php" class="btn-add">+ Přidat produkt</a>
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
                        <button type="submit" class="btn-delete">Odebrat</button>
                    </form>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>Žádné produkty k zobrazení.</p>
        <?php endif; ?>
    </div>
</div>