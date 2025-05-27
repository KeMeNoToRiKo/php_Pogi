<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "soniqueo_db";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn -> connect_error)
    {
        die("Connection failed: " . $conn -> connect_error);
    }

    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = [];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        $errors[] = "Invalid email format.";
    }

    if ($password !== $confirm_password)
    {
        $errors[] = "Passwords do not match.";
    } 

    if (strlen($password) < 6)
    {
        $errors[] = "Password must be at least 6 characters.";
    }

    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt -> bind_param("s", $email);
    $stmt -> execute();
    $stmt -> store_result();

    if ($stmt -> num_rows > 0)
    {
        $errors[] = "Email is already registered.";
    }

    $stmt -> close();

    $success = false;

    if (empty($errors))
    {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn -> prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $first_name, $last_name, $email, $hashed_password);
        if ($stmt->execute())
        {
            $success = true;
        } else {
            $errors[] = "Database error: " . $stmt -> error;
        }

        $stmt -> close();
    }

    $conn -> close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration Result</title>
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
            <div class="login-container">
                <?php if ($success): ?>
                    <div class="alert alert-success">
                        Registration successful! <a href="login.php" class="btn btn-dark">Go to login</a>.
                    </div>
                <?php else: ?>
                    <div class="alert alert-danger">
                        <h5 class="mb-3">There were some issues:</h5>
                        <ul class="text-start">
                            <?php foreach ($errors as $error): ?>
                                <li><?= htmlspecialchars($error) ?></li>
                            <?php endforeach; ?>
                        </ul>
                        <a href="registration.php" class="btn btn-outline-dark mt-3">Back to Registration</a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</body>
</html>