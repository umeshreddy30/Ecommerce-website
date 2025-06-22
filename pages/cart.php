<?php
session_start();
include '../includes/db.php';

// Initialize cart if it doesn't exist
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Handle add to cart
if (isset($_POST['add_to_cart']) && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    
    // Check if product exists in cart
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['quantity']++;
    } else {
        // Get product details from database
        $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$product_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($product) {
            $_SESSION['cart'][$product_id] = [
                'name' => $product['name'],
                'price' => $product['price'],
                'quantity' => 1
            ];
        }
    }
    
    // Redirect back to home page
    header('Location: ../index.php');
    exit();
}

// Calculate total
$total = 0;
foreach ($_SESSION['cart'] as $item) {
    $total += $item['price'] * $item['quantity'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .cart-items {
            margin: 2rem 0;
        }
        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background: white;
            margin-bottom: 1rem;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .cart-total {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 1rem 0;
        }
        .checkout-button {
            background-color: #4CAF50;
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1.1rem;
        }
        .checkout-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <h1>Shopping Cart</h1>
            <nav>
                <a href="../index.php">Home</a>
                <a href="login.php">Login</a>
                <a href="register.php">Register</a>
            </nav>
        </div>
    </header>
    
    <div class="main-container">
        <main>
            <?php if (empty($_SESSION['cart'])) : ?>
                <p>Your cart is empty.</p>
            <?php else : ?>
                <div class="cart-items">
                    <?php foreach ($_SESSION['cart'] as $product_id => $item) : ?>
                        <div class="cart-item">
                            <div>
                                <h3><?= htmlspecialchars($item['name']); ?></h3>
                                <p>Price: $<?= number_format($item['price'], 2); ?></p>
                                <p>Quantity: <?= $item['quantity']; ?></p>
                            </div>
                            <div>
                                <p>Subtotal: $<?= number_format($item['price'] * $item['quantity'], 2); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <div class="cart-total">
                    Total: $<?= number_format($total, 2); ?>
                </div>
                
                <button class="checkout-button">Proceed to Checkout</button>
            <?php endif; ?>
        </main>
    </div>
    
    <footer>
        <p>&copy; <?= date('Y'); ?> Online Store. All rights reserved.</p>
    </footer>
</body>
</html> 