<?php
session_start();

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit;
}

// Your DB connection settings
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'soniqueo_db';

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Replace this with your logged-in user's ID from session or auth system
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;

$total = 0;
$items = $_SESSION['cart'];

// Insert orders into DB
$order_date = date('Y-m-d H:i:s');

$stmt = $conn->prepare("INSERT INTO orders (user_id, product_id, quantity, order_date) VALUES (?, ?, ?, ?)");

foreach ($items as $product_id => $item) {
    $quantity = $item['quantity'];
    $stmt->bind_param("iiis", $user_id, $product_id, $quantity, $order_date);
    $stmt->execute();

    $total += $item['price'] * $quantity;
}

$stmt->close();
$conn->close();

// Clear cart session after inserting to DB
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
        <?php endforeach; ?>
        <hr>
        <p class="total">Total: ₱<?= number_format($total, 2) ?></p>
    </div>
    <a href="orderPage.php" class="back-to-store">Go Back to Store</a>
</div>
</body>
</html>
