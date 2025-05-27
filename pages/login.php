<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/registration.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>
<body>
    <header class="text-white py-3">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="../assets/logo-.png" alt="Soniqueo Logo" style="height: 40px; margin-right: 10px;">
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
        <div class="login-container">
            <h5 class="mb-4 text-white">Log in to your account.</h5>
            <form action="login_process.php" method="post" id="loginForm">
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-custom"><u>login</u></button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
