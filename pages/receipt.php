<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit;
}

// Optionally, store order in database here before clearing session

$total = 0;
$items = $_SESSION['cart'];

// Clear the cart after storing the items for receipt
unset($_SESSION['cart']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Receipt</title>
    <link rel="stylesheet" href="../css/receipt.css">
</head>
<body>
<div class="receipt-container">
    <h1>ORDERED SUCCESSFULLY</h1>
    <h2>*RECEIPT*</h2>
    <div class="receipt-box">
        <?php foreach ($items as $item): ?>
            <div class="receipt-item">
                <p><strong><?= htmlspecialchars($item['name']) ?></strong> x<?= $item['quantity'] ?> - ₱<?= number_format($item['price'] * $item['quantity'], 2) ?></p>
            </div>
            <?php $total += $item['price'] * $item['quantity']; ?>
        <?php endforeach; ?>
        <hr>
        <p class="total">Total: ₱<?= number_format($total, 2) ?></p>
    </div>
    <a href="orderPage.php" class="back-to-store">Go Back to Store</a>
</div>
</body>
</html>
