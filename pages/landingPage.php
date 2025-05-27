<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/style.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
</head>
<body>

  <!-- Header -->
  <header class="text-white py-3">
    <div class="container d-flex align-items-center justify-content-between">
      <div class="d-flex align-items-center">
        <img src="../assets/SoniqueoLOGO.png" alt="Soniqueo Logo" style="height: 40px; margin-right: 10px;" />
        <span class="fs-3 fw-bold">Soniqueo</span>
      </div>
      <form class="d-flex" style="width: 250px;">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
        <button class="btn btn-outline-light" type="submit"><i class="bi bi-search"></i></button>
      </form>
      <div class="d-flex align-items-center gap-3">
        <i class="bi bi-wechat fs-4"></i>
        <i class="bi bi-person-circle fs-4"></i>
      </div>
    </div>

    <nav class="mt-3">
      <div class="container d-flex justify-content-center gap-4">
        <a href="#" class="text-white text-decoration-none">Shop</a>
        <a href="#" class="text-white text-decoration-none">New Arrivals</a>
        <a href="#" class="text-white text-decoration-none">Sale</a>
      </div>
    </nav>
  </header>

  <!-- Hero Section -->
  <section class="hero-container text-center text-white">
    <div class="container py-5">
      <p class="fs-5 mb-4">Find your sound. Play your soul. Only at Soniqueo.</p>
        <section class="hero-container position-relative" style="height: 50vh; overflow: hidden;">
        <img src="../assets/showcase.jpg" alt="band"
        class="w-100 h-100"
        style="object-fit: cover; display: block; border-radius: 20px" />
</section>
  <!-- Shop Now Button -->
      <a href="loginPage.php" class="btn btn-primary mt-4 px-4 py-2 fs-5">Shop Now</a>
    </div>

  </div>

  </section>

  <!-- Shop Section -->
  <section class="shop-container text-center py-5">
    <div class="container">
      <h2 class="mb-4" style="font-family: 'Georgia', serif;">Features</h2>
      <div class="row justify-content-center">
        <!-- Lifestyle -->
        <div class="col-6 col-sm-4 col-md-2 mb-3">
          <img src="../assets/AirPods.jpg" alt="Lifestyle" class="rounded-circle mb-2" style="width: 100px; height: 100px; object-fit: cover;" />
          <div>Lifestyle</div>
        </div>
        <!-- Guitars -->
        <div class="col-6 col-sm-4 col-md-2 mb-3">
          <img src="../assets/White_guitar.jpg" alt="Guitars" class="rounded-circle mb-2" style="width: 100px; height: 100px; object-fit: cover;" />
          <div>Guitars</div>
        </div>
        <!-- Drums -->
        <div class="col-6 col-sm-4 col-md-2 mb-3">
          <img src="../assets/Cream_drum.jpg" alt="Drums & Percussion" class="rounded-circle mb-2" style="width: 100px; height: 100px; object-fit: cover;" />
          <div>Drums & Percussion</div>
        </div>
        <!-- Recordings -->
        <div class="col-6 col-sm-4 col-md-2 mb-3">
          <img src="../assets/Microphone2.jpg" alt="Recordings" class="rounded-circle mb-2" style="width: 100px; height: 100px; object-fit: cover;" />
          <div>Recordings</div>
        </div>
        <!-- Amplifiers -->
        <div class="col-6 col-sm-4 col-md-2 mb-3">
          <img src="../assets/amplifier3.jpg" alt="Amplifiers and Effects" class="rounded-circle mb-2" style="width: 100px; height: 100px; object-fit: cover;" />
          <div>Amplifiers and Effects</div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-center py-2">
    <div class="container">
      <p class="mb-0">© 2025 Soniqueo. All rights reserved.</p>
    </div>
  </footer>

</body>
</html>
