<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Dashboard — s1mplehack</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/dashboard.css">
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand logo-accent" href="#">s1mplehack Dashboard</a>
        <div class="ms-auto d-flex gap-3 align-items-center">
            <span class="text-light">Hello, <?php echo $_SESSION['username']; ?></span>
            <a href="logout.php" class="btn btn-sm btn-outline-light">Logout</a>
        </div>
    </div>
</nav>

<main class="container py-5">
    <h2 class="mb-4 glow-text">Security Dashboard</h2>
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card-glow">
                <div class="card-title">Active Users</div>
                <p class="muted-sm">42 currently online</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-glow">
                <div class="card-title">Recent Logins</div>
                <p class="muted-sm">3 logins in the last hour</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card-glow">
                <div class="card-title">Security Alerts</div>
                <p class="muted-sm">No critical alerts</p>
            </div>
        </div>
    </div>

    <section>
        <h4 class="glow-text mb-3">Quick Security Tips</h4>
        <div class="grid-cards">
            <div class="card-tip">Use strong passwords</div>
            <div class="card-tip">Enable 2FA</div>
            <div class="card-tip">Update software regularly</div>
            <div class="card-tip">Monitor logs</div>
            <div class="card-tip">Use a WAF</div>
            <div class="card-tip">Encrypt sensitive data</div>
        </div>
    </section>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
