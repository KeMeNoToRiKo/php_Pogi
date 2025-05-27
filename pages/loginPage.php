<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/login.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" />
</head>
<body>
    <header class="text-white py-3">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="../assets/SoniqueoLOGO.png" alt="Soniqueo Logo" style="height: 40px; margin-right: 10px;" />
                <span class="fs-3 fw-bold">Soniqueo</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <i class="bi bi-wechat fs-4"></i>
                <i class="bi bi-person-circle fs-4"></i>
                <i class="bi bi-telephone fs-4"></i>
            </div>
        </div>
    </header>

    <section>
        <div class="login-container container mt-5" style="max-width: 400px;">
            <h5 class="login-text mb-4 text-center text-white">Login</h5>
            <form action="login_process.php" method="post" id="loginForm">
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required autofocus />
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required />
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-custom w-100">Login</button>
                </div>
            </form>
            <div class="text-center mt-3">
                <p class="text-white">
                    Don't have an account? <a href="registrationPage.php" class="text-decoration-underline text-white">Register here</a>
                </p>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>
</body>
</html>
