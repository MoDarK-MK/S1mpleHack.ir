<?php
require 'db.php';
session_start();
if($_SERVER['REQUEST_METHOD']==='POST'){
  $username=trim($_POST['username']);
  $email=trim($_POST['email']);
  $password=$_POST['password'];
  $confirm=$_POST['confirm_password'];

  if($password !== $confirm){
      $error = 'Passwords do not match';
  } else {
      $hashed=password_hash($password,PASSWORD_DEFAULT);
      $stmt=$pdo->prepare("SELECT id FROM users WHERE email=?");
      $stmt->execute([$email]);
      if($stmt->rowCount()>0){
          $error='Email already registered';
      } else {
          $stmt=$pdo->prepare("INSERT INTO users(username,email,password) VALUES(?,?,?)");
          $stmt->execute([$username,$email,$hashed]);
          header('Location: login.php');
          exit;
      }
  }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up — GreenMint</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/signup.css">
    <link rel="icon" type="image/png" href="web/mask32.png">
</head>

<body>
    <div class="signup-container">
        <div class="signup-card">
            <h2 class="logo-accent">Sign Up</h2>
            <?php if(isset($error)): ?>
            <div class="alert alert-danger py-2"><?=$error?></div>
            <?php endif; ?>
            <form method="post" action="signup.php">
                <div class="mb-3">
                    <input type="text" class="form-control" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3">
                    <input type="password" id="password" class="form-control" name="password" placeholder="Password"
                        required>
                    <div class="password-strength">
                        <div class="bar"></div>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="password" id="confirm_password" class="form-control" name="confirm_password"
                        placeholder="Confirm Password" required>
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="showPassword">
                    <label class="form-check-label" for="showPassword">Show Password</label>
                </div>
                <button type="submit" class="btn btn-accent w-100">Sign Up</button>
            </form>
            <div class="small-muted text-center mt-3">
                Already have an account? <a href="login.php" class="text-accent">Login</a>
            </div>
        </div>
    </div>

    <script>
    const passwordInput = document.getElementById('password');
    const confirmInput = document.getElementById('confirm_password');
    const bar = document.querySelector('.bar');
    const showPassword = document.getElementById('showPassword');

    passwordInput.addEventListener('input', () => {
        const val = passwordInput.value;
        let strength = 0;
        if (val.length > 5) strength++;
        if (/[A-Z]/.test(val)) strength++;
        if (/[0-9]/.test(val)) strength++;
        if (/[^A-Za-z0-9]/.test(val)) strength++;

        const colors = ['#ff4d4d', '#ff914d', '#ffe14d', '#a2ff4d', '#00d27a'];
        bar.style.width = (strength * 25) + '%';
        bar.style.background = colors[strength] || '#ff4d4d';
    });

    showPassword.addEventListener('change', () => {
        const type = showPassword.checked ? 'text' : 'password';
        passwordInput.type = type;
        confirmInput.type = type;
    });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>