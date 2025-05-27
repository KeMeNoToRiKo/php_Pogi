a<?php include 'products.php'; ?>

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
    function displayCategory($title, $items) {
        echo "<h2>$title</h2><div class='product-grid'>";
        foreach ($items as $item) {
            echo "
            <div class='product-box'>
                <img src='{$item['image']}' alt='{$item['name']}' class='product-image'>
                <h3 class='product-name'>{$item['name']}</h3>
                <p class='product-price'>₱" . number_format($item['price']) . "</p>
                <a href='#' class='order-button'>Order Now</a>
            </div>";
        }
        echo "</div>";
    }

    displayCategory("Guitars", $GuitarsList);
    displayCategory("Drums and Percussion", $DrumsandPercussionList);
    displayCategory("Recording Gear", $RecordingsList);
    displayCategory("Lifestyle Accessories", $LifeStyleList);
    displayCategory("Amplifiers and Effects", $AmplifierandEffectsList);
    ?>
</body>
</html>
