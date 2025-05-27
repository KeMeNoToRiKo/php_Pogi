<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'products.php';

function displayCategory($title, $items) {
    echo "<h2>$title</h2><div class='product-grid'>";
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
</head>
<body>
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
