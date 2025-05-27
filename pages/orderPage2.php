<?php include 'products.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Product Details</title>
    <link rel="stylesheet" href="../css/order2.css" />
</head>
<body>
    <?
    //header of orderpage2
    ?>
    <header class="main-header">
  <div class="header-left">Mga Pogi Shop</div>
  <div class="header-icons">🛒 🗨️ 👤 📞</div>
</header>

    <h1>Product Details</h1>

    <?php
    // Helper: Find product by ID in all category arrays
    function findProductById($id, $lists) {
        foreach ($lists as $list) {
            foreach ($list as $product) {
                if ($product['id'] == $id) {
                    return $product;
                }
            }
        }
        return null;
    }

    $allProducts = [$GuitarsList, $DrumsandPercussionList, $RecordingsList, $LifeStyleList, $AmplifierandEffectsList];

    if (isset($_GET['id'])):
        $productId = $_GET['id'];
        $product = findProductById($productId, $allProducts);

        if ($product):
    ?>
        <div class="single-product-container">
            <h2 class="single-product-name"><?= htmlspecialchars($product['name']) ?></h2>

            <form action="cart.php" method="post" class="product-detail-form">

                <div class="product-detail-container">
                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="product-image" />

                    <div class="product-detail-info">
                        <p class="product-description"><?= htmlspecialchars($product['description']) ?></p>
                        <p class="product-price">₱<?= number_format($product['price']) ?></p>

                        <div class="quantity-section">
                            <label for="qty_<?= htmlspecialchars($product['id']) ?>">Quantity:</label>
                            <input
                                type="number"
                                id="qty_<?= htmlspecialchars($product['id']) ?>"
                                name="quantity[<?= htmlspecialchars($product['id']) ?>]"
                                value="1"
                                min="1"
                                class="quantity-input"
                            />
                        </div>

                        <input type="hidden" name="product[<?= htmlspecialchars($product['id']) ?>][name]" value="<?= htmlspecialchars($product['name']) ?>" />
                        <input type="hidden" name="product[<?= htmlspecialchars($product['id']) ?>][price]" value="<?= htmlspecialchars($product['price']) ?>" />
                        <input type="hidden" name="product[<?= htmlspecialchars($product['id']) ?>][image]" value="<?= htmlspecialchars($product['image']) ?>" />

                        <button type="submit" name="add_to_cart" value="<?= htmlspecialchars($product['id']) ?>" class="order-button">
                            Add to Cart
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
    <?php
        else:
            echo "<p>Product not found.</p>";
        endif;
    else:
        echo "<p>No product selected.</p>";
    endif;
    ?>
    <script src="../js/registration.js"></script>
</body>
</html>