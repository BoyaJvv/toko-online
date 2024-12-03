//
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        /* Reset dan font */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif;
    background-color: #f0f2f5;
    color: #333;
    padding: 20px;
}

.cart-container {
    max-width: 1200px;
    margin: 0 auto;
    background-color: #fff;
    padding: 30px;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.cart-container h1 {
    font-weight: 600;
    text-align: center;
    margin-bottom: 40px;
    color: #444;
}

.cart-grid {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 30px;
}

.cart-items {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.cart-item {
    display: flex;
    background-color: #fafafa;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
}

.cart-item img {
    width: 100px;
    height: 100px;
    border-radius: 8px;
    margin-right: 20px;
}

.item-details {
    flex: 1;
}

.item-details h2 {
    font-weight: 600;
    margin-bottom: 10px;
    color: #555;
}

.item-details p {
    font-weight: 400;
    margin-bottom: 15px;
}

.item-quantity {
    display: flex;
    align-items: center;
}

.item-quantity label {
    margin-right: 10px;
    font-weight: 400;
}

.item-quantity input {
    width: 60px;
    padding: 5px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center;
}

.item-total {
    display: flex;
    flex-direction: column;
    align-items: flex-end;
    justify-content: space-between;
}

.item-total p {
    font-weight: 600;
    color: #666;
    margin-bottom: 15px;
}

.remove-btn {
    background-color: #e74c3c;
    color: #fff;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.remove-btn:hover {
    background-color: #c0392b;
}

.cart-summary {
    background-color: #f8f8f8;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
}

.cart-summary h2 {
    font-weight: 600;
    margin-bottom: 20px;
    color: #444;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    font-weight: 400;
}

.summary-total {
    display: flex;
    justify-content: space-between;
    font-weight: 600;
    font-size: 18px;
    margin-top: 20px;
}

.checkout-btn {
    background-color: #27ae60;
    color: #fff;
    border: none;
    padding: 15px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    transition: background-color 0.3s ease;
    margin-top: 30px;
}

.checkout-btn:hover {
    background-color: #1e8449;
}

/* Responsif untuk perangkat mobile */
@media (max-width: 768px) {
    .cart-grid {
        grid-template-columns: 1fr;
    }

    .cart-summary {
        margin-top: 30px;
    }
}

    </style>
</head>
<body>
    <div class="cart-container">
        <h1>Keranjang Belanja</h1>
        <div class="cart-grid">
            <div class="cart-items">
                <div class="cart-item">
                    <img src="produk1.jpg" alt="Produk 1">
                    <div class="item-details">
                        <h2>Produk 1</h2>
                        <p>Rp 100.000</p>
                        <div class="item-quantity">
                            <label for="quantity1">Jumlah:</label>
                            <input type="number" id="quantity1" value="1" min="1">
                        </div>
                    </div>
                    <div class="item-total">
                        <p>Total: Rp 100.000</p>
                        <button class="remove-btn">Hapus</button>
                    </div>
                </div>
                <div class="cart-item">
                    <img src="produk2.jpg" alt="Produk 2">
                    <div class="item-details">
                        <h2>Produk 2</h2>
                        <p>Rp 150.000</p>
                        <div class="item-quantity">
                            <label for="quantity2">Jumlah:</label>
                            <input type="number" id="quantity2" value="2" min="1">
                        </div>
                    </div>
                    <div class="item-total">
                        <p>Total: Rp 300.000</p>
                        <button class="remove-btn">Hapus</button>
                    </div>
                </div>
                <!-- Tambahkan produk lainnya di sini -->
            </div>
            <div class="cart-summary">
                <h2>Ringkasan Pesanan</h2>
                <div class="summary-item">
                    <p>Subtotal</p>
                    <p>Rp 400.000</p>
                </div>
                <div class="summary-item">
                    <p>Ongkos Kirim</p>
                    <p>Gratis</p>
                </div>
                <div class="summary-total">
                    <h3>Total</h3>
                    <h3>Rp 400.000</h3>
                </div>
                <button class="checkout-btn">Checkout</button>
            </div>
        </div>
    </div>
</body>
</html>