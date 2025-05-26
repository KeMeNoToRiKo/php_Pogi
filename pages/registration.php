<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - PHP Pogi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../css/style.css" rel="stylesheet">
    <link href="../css/registration.css" rel="stylesheet">
</head>
<body>
    
    <div class="registration-container">
        <div class="reg-box" id="regBox">
            <h5 class="mb-4">Create your account.</h5>
            <form>
                <div class="row mb-3">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="First name" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Last name" required>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" placeholder="Email address" required>
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">create</button>
            </form>
        </div>
        <div class="info-side" id="infoSide">INFO</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Animate on load
    window.onload = function() {
        document.getElementById('infoSide').classList.add('slide');
        document.getElementById('regBox').classList.add('slide-up');
    };
    </script>
</body>
</html>
