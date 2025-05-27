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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/order.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body>

    <!-- HEADER -->
    <header class="text-white py-3" style="background: linear-gradient(to right, #000000, #1a1a80);">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="../assets/SoniqueoLOGO.png" alt="Soniqueo Logo" style="height: 40px; margin-right: 10px;">
                <span class="fs-3 fw-bold">Soniqueo</span>
            </div>

            <form class="d-flex" style="width: 250px;">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>

            <div class="d-flex align-items-center gap-3">
                <i class="bi bi-wechat fs-4"></i>
                <i class="bi bi-person-circle fs-4"></i>
            </div>
        </div>

        <!-- NAVIGATION -->
        <nav class="mt-3">
            <div class="container">
                <div class="d-flex justify-content-center gap-4">
                    <a href="#" class="text-white text-decoration-none fw-semibold">Shop</a>
                    <a href="#" class="text-white text-decoration-none fw-semibold">New Arrivals</a>
                    <a href="#" class="text-white text-decoration-none fw-semibold">Sale</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main class="container my-5">
        <?php
        function displayCategory($title, $items) {
            echo "<h2 class='text-center mb-4'>" . htmlspecialchars($title) . "</h2>";
            echo "<div class='product-grid'>";
            foreach ($items as $item) {
                $id = urlencode($item['id']);
                $name = htmlspecialchars($item['name']);
                $price = number_format($item['price']);
                $image = htmlspecialchars($item['image']);

                echo "
                    <div class='product-box'>
                        <img src='{$image}' alt='{$name}' class='product-image'>
                        <h3 class='product-name'>{$name}</h3>
                        <p class='product-price'>₱{$price}</p>
                        <a href='orderpage2.php?id={$id}' class='order-button'>Order Now</a>
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
    </main>

    <!-- FOOTER -->
    <footer class="text-white py-4 mt-5" style="background: linear-gradient(to right, #000000, #1a1a80);">
        <div class="container d-flex flex-column flex-md-row align-items-center justify-content-between">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <img src="../assets/logo-.png" alt="Soniqueo Logo" style="height: 40px; margin-right: 10px;">
                <span class="fs-5 fw-bold">Soniqueo</span>
            </div>

            <div class="text-center mb-3 mb-md-0">
                <p class="mb-0">© 2025 Soniqueo. All rights reserved.</p>
            </div>

            <div class="d-flex align-items-center gap-3">
                <a href="#" class="text-white"><i class="bi bi-facebook fs-5"></i></a>
                <a href="#" class="text-white"><i class="bi bi-twitter fs-5"></i></a>
                <a href="#" class="text-white"><i class="bi bi-instagram fs-5"></i></a>
            </div>
        </div>
    </footer>

=======
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
