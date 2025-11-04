<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header('Location: index.php');
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login — s1mplehack</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/login.css">
    <link rel="icon" type="image/png" href="web\mask32.png">
</head>

<body>
    <div class="login-container">
        <div class="login-card">
            <h2 class="logo-accent">Login</h2>
            <form method="post" action="login.php">
                <div class="mb-3"><input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3"><input type="password" class="form-control" name="password" placeholder="Password"
                        required></div>
                <button type="submit" class="btn btn-accent w-100">Login</button>
            </form>
            <div class="small-muted">Don't have an account? <a href="signup.php" class="text-accent">Sign Up</a></div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>