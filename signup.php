<?php
require 'db.php';
session_start();
if($_SERVER['REQUEST_METHOD']==='POST'){
  $username=trim($_POST['username']);
  $email=trim($_POST['email']);
  $password=password_hash($_POST['password'],PASSWORD_DEFAULT);
  $stmt=$pdo->prepare("SELECT id FROM users WHERE email=?");
  $stmt->execute([$email]);
  if($stmt->rowCount()>0){$error='Email already registered';}
  else{
    $stmt=$pdo->prepare("INSERT INTO users(username,email,password) VALUES(?,?,?)");
    $stmt->execute([$username,$email,$password]);
    header('Location: login.php');
    exit;
  }
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sign Up — s1mplehack</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/signup.css">
</head>
<body>
<div class="signup-container">
  <div class="signup-card">
    <h2 class="logo-accent">Sign Up</h2>
    <form method="post" action="signup.php">
      <div class="mb-3">
        <input type="text" class="form-control" name="username" placeholder="Username" required>
      </div>
      <div class="mb-3">
        <input type="email" class="form-control" name="email" placeholder="Email" required>
      </div>
      <div class="mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
      </div>
      <button type="submit" class="btn btn-accent w-100">Sign Up</button>
    </form>
    <div class="small-muted">
      Already have an account? <a href="login.php" class="text-accent">Login</a>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

