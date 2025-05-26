<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body>
    <header class="text-white py-3">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="../assets/logo-.png" alt="Soniqueo Logo" style="height: 40px; margin-right: 10px;">
                <span class="fs-3 fw-bold">Soniqueo</span>
            </div>
            <form class="d-flex" style="width: 250px;">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
            </form>

            <div class="d-flex align-items-center gap-3">
                <i class="bi bi-wechat fs-4"></i>
                <i class="bi bi-person-circle fs-4"></i>
            </div>
        </div>
        <nav class="mt-3">
            <div class="container">
                <div class="d-flex justify-content-center gap-4">
                    <a href="#" class="text-white mx-2 text-decoration-none">Shop</a>
                    <a href="#" class="text-white mx-2 text-decoration-none">New Arrivals</a>
                    <a href="#" class="text-white mx-2 text-decoration-none">Sale</a>
                </div>
            </div>
        </nav>
    </header>

    <!-- MAIN -->

    <section class="hero-container text-center text-white py-5">
        <div class="container">
            <p class="fs-5 mb-4">Find your sound. Play your soul. Only at Soniqueo.</p>
        </div>
        <div class="banner mx-auto mb-4">
            <img src="https://images.pexels.com/photos/164936/pexels-photo-164936.jpeg" alt="Guitar Hero" class="img-fluid w-100" style="object-fit: cover; height: 250px;">
        </div>
    </section>

    <!-- shop -->
    <section class="shop-container text-center py-5">
        <div class="container">
            <h2 class="mb-4" style="font-family: 'Georgia', serif;">Shop</h2>
            <div class="row justify-content-center mb-4">
                <div class="col-6 col-sm-4 col-md-2 mb-3">
                    <img src="https://images.pexels.com/photos/374870/pexels-photo-374870.jpeg" class="rounded-circle mb-2" style="width: 100px; height: 100px; object-fit: cover;" alt="Lifestyle">
                    <div>Lifestyle</div>
                </div>
                <div class="col-6 col-sm-4 col-md-2 mb-3">
                    <img src="https://images.pexels.com/photos/164936/pexels-photo-164936.jpeg" class="rounded-circle mb-2" style="width: 100px; height: 100px; object-fit: cover;" alt="Guitars">
                    <div>Guitars</div>
                </div>
                <div class="col-6 col-sm-4 col-md-2 mb-3">
                    <img src="https://images.pexels.com/photos/164936/pexels-photo-164936.jpeg?auto=compress&fit=crop&w=100&q=80" class="rounded-circle mb-2" style="width: 100px; height: 100px; object-fit: cover;" alt="Drums & Percussion">
                    <div>Drums & Percussion</div>
                </div>
                <div class="col-6 col-sm-4 col-md-2 mb-3">
                    <img src="https://images.pexels.com/photos/164936/pexels-photo-164936.jpeg?auto=compress&fit=crop&w=100&q=80" class="rounded-circle mb-2" style="width: 100px; height: 100px; object-fit: cover;" alt="Recordings">
                    <div>Recordings</div>
                </div>
                <div class="col-6 col-sm-4 col-md-2 mb-3">
                    <img src="https://images.pexels.com/photos/164936/pexels-photo-164936.jpeg?auto=compress&fit=crop&w=100&q=80" class="rounded-circle mb-2" style="width: 100px; height: 100px; object-fit: cover;" alt="Amplifiers and Effects">
                    <div>Amplifiers and Effects</div>
                </div>
            </div>
        </div>
    </section>
    <footer class="text-center py-2">
        <div class="container">
            <p class="mb-0">© 2025 Soniqueo. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>