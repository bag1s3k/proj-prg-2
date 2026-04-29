<?php
    session_start();
    require_once "../../config.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST["title"] ?? "";
        $description = $_POST["description"] ?? "";
        $image_url = $_POST["image_url"] ?? "";

        if (!empty($title) && !empty($description) && !empty($image_url)) {
            $query = "INSERT INTO products (title, description, image_url, available) VALUES (?, ?, ?, 1)";
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
    <title>Přidat produkt</title>
    <style>
        .form-container {
            max-width: 600px;
            margin: 2rem auto;
            background: white;
            padding: 2rem;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        .form-control {
            width: 100%;
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 1rem;
        }
        textarea.form-control {
            resize: vertical;
            min-height: 100px;
        }
        .btn-submit {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
            font-size: 1rem;
        }
        .btn-submit:hover {
            background-color: var(--primary-hover);
        }
        .alert {
            padding: 1rem;
            border-radius: 6px;
            margin-bottom: 1.5rem;
        }
        .alert-danger { background: #fee2e2; color: #dc2626; }
        .alert-success { background: #f0fdf4; color: #16a34a; }
        .back-link {
            display: inline-block;
            margin-bottom: 1rem;
            text-decoration: none;
            color: var(--text-muted);
        }
    </style>
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