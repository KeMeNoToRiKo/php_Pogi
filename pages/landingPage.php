<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Pogi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
</head>
<body>
    <!-- Blurred background effects -->
    <div class="blur-bg blur1"></div>
    <div class="blur-bg blur2"></div>
    <div class="blur-bg blur3"></div>
    <div class="blur-bg blur4"></div>
    <div class="main-content">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-transparent pt-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Brand Name/Website Name</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Hero Section -->
        <div class="container text-center" style="padding-top: 60px; padding-bottom: 60px;">
            <div class="section-title" id="info-title">INFO</div>
            <button class="btn btn-gradient" id="getStartedBtn">Get Started</button>
        </div>
        <!-- About Section -->
        <div class="container text-center">
            <div class="about-title">About our Store</div>
        </div>
        <!-- Footer -->
    </div>
    <footer class="footer">
        <div class="footer-text">FOOTER</div>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById('getStartedBtn').addEventListener('click', function(e) {
        e.preventDefault();
        document.body.classList.add('fade-out');
        setTimeout(function() {
            window.location.href = 'registration.php';
        }, 600); // match CSS transition duration
    });
    </script>
</body>
</html>