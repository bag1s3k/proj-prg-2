<?php
    session_start();
    require_once "../../config.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST["title"] ?? "";
        $description = $_POST["description"] ?? "";
        $image_url = $_POST["image_url"] ?? "";

        if (!empty($title) && !empty($description) && !empty($image_url)) {
            $query = "INSERT INTO products (title, description, image_url, available) VALUES (?, ?, ?, 0)";
            $stmt = mysqli_prepare($con, $query);
            mysqli_stmt_bind_param($stmt, "sss", $title, $description, $image_url);

            mysqli_stmt_execute($stmt);
        }
    }
?>

<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="account.css">
    <link rel="stylesheet" href="add_product.css">
    <title>Přidat produkt</title>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <a href="account.php" class="back-link">← Zpět na účet</a>
            <h2>Přidat nový produkt</h2><br>

            <form action="add_product.php" method="POST">
                <div class="form-group">
                    <label>Název produktu (Title)</label>
                    <input type="text" name="title" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Popis (Description)</label>
                    <textarea name="description" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label>URL obrázku (Image URL)</label>
                    <input type="url" name="image_url" class="form-control" placeholder="https://example.com/image.jpg" required>
                </div>

                <button type="submit" class="btn-submit">Uložit produkt</button>
            </form>
        </div>
    </div>
</body>
</html>