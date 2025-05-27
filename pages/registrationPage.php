<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/registration.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
</head>

<body>

    <!-- Header -->
    <header class="text-white py-3">
        <div class="container d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="../assets/SoniqueoLOGO.png" alt="Soniqueo Logo" style="height: 40px; margin-right: 10px;">
                <span class="fs-3 fw-bold">Soniqueo</span>
            </div>
            <div class="d-flex align-items-center gap-3">
                <i class="bi bi-wechat fs-4"></i>
                <i class="bi bi-person-circle fs-4"></i>
                <i class="bi bi-telephone fs-4"></i>
            </div>
        </div>
    </header>

    <!-- Main Section -->
    <section>
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="login-container p-4">
                <h3 class="text-center text-white mb-4">Create your account</h3>
                <form action="register_process.php" method="post" id="registrationForm">
                    <div class="mb-3">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="first_name" class="form-control" placeholder="First name" required>
                            </div>
                            <div class="col">
                                <input type="text" name="last_name" class="form-control" placeholder="Last name" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="mb-3">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password" required>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-custom w-100">Create Account</button>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <p class="text-white">Already have an account? <a href="loginPage.php">Log in</a></p>
                </div>
            </div>
        </div>
    </section>
    <?php include 'footer.php'; ?>

    <script src="../js/registration.js"></script>
</body>

</html>
