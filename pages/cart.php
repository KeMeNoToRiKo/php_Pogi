<?php 
//jojo hello
session_start();

// Handle add to cart from product page
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $productId = $_POST['add_to_cart'];
    $quantity = intval($_POST['quantity'][$productId]); // Ensure it's an integer
    $productData = $_POST['product'][$productId];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Always replace the product quantity with new quantity from form
    $_SESSION['cart'][$productId] = [
        'name' => $productData['name'],
        'price' => $productData['price'],
        'image' => $productData['image'],
        'quantity' => $quantity,
    ];

    header('Location: cart.php');
    exit;
}

// Handle quantity updates from cart
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_quantity'])) {
    $productId = $_POST['product_id'];
    $action = $_POST['action'];

    if (isset($_SESSION['cart'][$productId])) {
        if ($action === 'increment') {
            $_SESSION['cart'][$productId]['quantity'] += 1;
        } elseif ($action === 'decrement' && $_SESSION['cart'][$productId]['quantity'] > 1) {
            $_SESSION['cart'][$productId]['quantity'] -= 1;
        }
    }

    header('Location: cart.php');
    exit;
}

// Handle clear cart
if (isset($_POST['clear_cart'])) {
    unset($_SESSION['cart']);
    header('Location: cart.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Your Cart</title>
    <link rel="stylesheet" href="../css/cart.css" />
</head>
<body>

<header class="main-header">
    <div class="header-left">Mga Pogi Shop</div>
    <div class="header-icons">🛒 🗨️ 👤 📞</div>
</header>

<!-- Back Button -->
<div style="margin: 20px 0;">
    <a href="orderPage.php" class="back-btn">&larr; Back to Product</a>
</div>

<div class="cart-page">
    <div class="cart-items">
        <h2>Cart <span>(items)</span></h2>
        <hr>
        <?php
        $total = 0;
        if (!empty($_SESSION['cart'])):
            foreach ($_SESSION['cart'] as $id => $item):
                $itemTotal = $item['price'] * $item['quantity'];
                $total += $itemTotal;
        ?>
            <div class="cart-item">
                <img src="<?= htmlspecialchars($item['image']) ?>" alt="Product" class="cart-image" />
                <div class="item-info">
                    <p class="name"><?= htmlspecialchars($item['name']) ?></p>
                    <p class="price">₱<?= number_format($item['price'], 2) ?></p>
                    <div class="quantity-controls">
                        <form method="post" style="display:inline;">
                            <input type="hidden" name="update_quantity" value="1" />
                            <input type="hidden" name="product_id" value="<?= htmlspecialchars($id) ?>" />
                            <input type="hidden" name="action" value="decrement" />
                            <button type="submit">-</button>
                        </form>

                        <span><?= htmlspecialchars($item['quantity']) ?></span>

                        <form method="post" style="display:inline;">
                            <input type="hidden" name="update_quantity" value="1" />
                            <input type="hidden" name="product_id" value="<?= htmlspecialchars($id) ?>" />
                            <input type="hidden" name="action" value="increment" />
                            <button type="submit">+</button>
                        </form>
                    </div>
                </div>
            </div>
        <?php
            endforeach;
        else:
            echo "<p>Your cart is empty.</p>";
        endif;
        ?>
    </div>

    <div class="cart-summary">
        <div class="summary-header">
            <h3>Total</h3>
            <span>₱<?= number_format($total, 2) ?></span>
        </div>
        <hr>
        <form method="post" action="receipt.php">
            <button class="checkout-btn" type="submit" name="checkout">Check Out</button>
        </form>
    </div>
</div>

<?php if (!empty($_SESSION['cart'])): ?>
<form method="post" style="margin: 20px;">
    <button name="clear_cart" style="
        padding: 6px 14px;
        background: #f44336;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    ">Clear Cart</button>
</form>
<?php endif; ?>

<footer class="page-footer"></footer>
</body>
</html>
