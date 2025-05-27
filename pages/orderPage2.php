<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

include 'products.php';

$allProducts = [$GuitarsList, $DrumsandPercussionList, $RecordingsList, $LifeStyleList, $AmplifierandEffectsList];

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

$errors = [];
$successMessage = "";

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = intval($_POST['product_id']);
    $quantity = intval($_POST['quantity']);
    $user_id = $_SESSION['user_id'];

    if ($quantity < 1) {
        $errors[] = "Quantity must be at least 1.";
    }

    $conn = new mysqli("localhost", "root", "", "soniqueo_db");
    if ($conn->connect_error) {
        $errors[] = "Database connection failed: " . $conn->connect_error;
    } else {
        if (empty($errors)) {
            $stmt = $conn->prepare("INSERT INTO orders (user_id, product_id, quantity) VALUES (?, ?, ?)");
            $stmt->bind_param("isi", $user_id, $product_id, $quantity);

            if ($stmt->execute()) {
                $successMessage = "Order placed successfully!";
            } else {
                $errors[] = "Failed to place order: " . $stmt->error;
            }

            $stmt->close();
        }
        $conn->close();
    }
}

$productId = isset($_GET['id']) ? $_GET['id'] : null;
$product = $productId ? findProductById($productId, $allProducts) : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Product Details</title>
    <link rel="stylesheet" href="../css/order2.css" />
</head>
<body>
    <h1>Product Details</h1>

    <?php if ($product): ?>
        <?php if ($successMessage): ?>
            <div class="alert alert-success"><?= htmlspecialchars($successMessage) ?></div>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?= htmlspecialchars($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="single-product-container">
            <h2 class="single-product-name"><?= htmlspecialchars($product['name']) ?></h2>
            <form action="" method="post" class="product-detail-form">
                <div class="product-detail-container">
                    <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="product-image" />
                    <div class="product-detail-info">
                        <p class="product-description"><?= htmlspecialchars($product['description']) ?></p>
                        <p class="product-price">₱<?= number_format($product['price']) ?></p>

                        <div class="quantity-section">
                            <label for="quantity">Quantity:</label>
                            <input
                                type="number"
                                id="quantity"
                                name="quantity"
                                value="1"
                                min="1"
                                class="quantity-input"
                                required
                            />
                        </div>

                        <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>" />
                        <button type="submit" name="add_to_cart" class="order-button">Add to Cart</button>
                    </div>
                </div>
            </form>
        </div>
    <?php else: ?>
        <p>Product not found.</p>
    <?php endif; ?>
</body>
</html>
