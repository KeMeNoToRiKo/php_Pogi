<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "soniqueo_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = trim($_POST['email']);
$password = $_POST['password'];

$errors = [];
$success = false;

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
} else {
    $stmt = $conn->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $user_id;
            $success = true;
            header("Location: orderpage.php"); // 👈 redirect to protected page
            exit();
        } else {
            $errors[] = "Incorrect password.";
        }
    } else {
        $errors[] = "No account found with that email.";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Result</title>
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

    <section class="text-center mt-5">
        <div class="login-container">
            <?php if (!$success): ?>
                <div class="alert alert-danger">
                    <h5 class="mb-3">Login failed:</h5>
                    <ul class="text-start">
                        <?php foreach ($errors as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <a href="login.php" class="btn btn-outline-dark mt-3">Try Again</a>
                </div>
            <?php endif; ?>
        </div>
    </section>
</body>
</html>
