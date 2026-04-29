<style>
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
        <div class="product-row">
            <div class="product-info">
                <img src="https://images.unsplash.com/photo-1516035069371-29a1b244cc32?auto=format&fit=crop&q=80&w=600" alt="Zrcadlovka" class="row-img">
                <h3 class="row-title">Zrcadlovka</h3>
            </div>
            <button class="btn-delete">Odebrat</button>
        </div>
    </div>
</div>