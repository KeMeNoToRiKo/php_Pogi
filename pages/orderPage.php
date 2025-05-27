<?php
session_start();

// Handle logout
if (isset($_POST['logout'])) {
    session_destroy();
    header('Location: loginPage.php');
    exit();  // Always exit after redirect
}

if (!isset($_SESSION['user_id'])) {
    header('Location: loginPage.php');
    exit();  // Always exit after redirect
}

include 'products.php';

function displayCategory($title, $items) {
    echo "<h2>" . htmlspecialchars($title) . "</h2><div class='product-grid'>";
    foreach ($items as $item) {
        echo "
        <div class='product-box'>
            <img src='" . htmlspecialchars($item['image']) . "' alt='" . htmlspecialchars($item['name']) . "' class='product-image'>
            <h3 class='product-name'>" . htmlspecialchars($item['name']) . "</h3>
            <p class='product-price'>₱" . number_format($item['price']) . "</p>
            <a href='orderpage2.php?id=" . urlencode($item['id']) . "' class='order-button'>Order Now</a>
        </div>";
    }
    echo "</div>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Products</title>
    <link rel="stylesheet" href="../css/order.css">
    <link rel="stylesheet" href="../css/logout.css">  <!-- CSS for logout button -->
</head>
<body>
    <div class="top-buttons">
        <!-- Cart button (right of logout) -->
        <form action="cart.php" method="get">
            <button type="submit" class="cart-button">Cart</button>
        </form>

        <!-- Logout button (left) -->
        <form method="post">
            <button type="submit" name="logout" class="logout-button">Logout</button>
        </form>

        
    </div>

    <h1>Shop | New Arrivals | Sale</h1>

    <?php
    displayCategory("Guitars", $GuitarsList);
    displayCategory("Drums and Percussion", $DrumsandPercussionList);
    displayCategory("Recording Gear", $RecordingsList);
    displayCategory("Lifestyle Accessories", $LifeStyleList);
    displayCategory("Amplifiers and Effects", $AmplifierandEffectsList);
    ?>
</body>
</html>
