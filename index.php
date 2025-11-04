<?php
session_start();
$loggedIn = isset($_SESSION['user_id']);
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>s1mplehack — Security Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="stylesheet" href="assets/stylemain.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand logo-accent" href="#">s1mplehack</a>
            <div class="ms-auto d-flex gap-2">
                <?php if ($loggedIn): ?>
                <span class="text-light me-2">Hello, <?php echo $_SESSION['username']; ?></span>
                <a href="dashboard.php" class="btn btn-sm btn-accent">Dashboard</a>
                <?php else: ?>
                <a href="login.php" class="btn btn-sm btn-outline-light">Login</a>
                <a href="signup.php" class="btn btn-sm btn-accent">Sign Up</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <main class="container py-5">
        <section class="card card-auth p-4 mb-4">
            <div class="hero">
                <div class="hero-left">
                    <h1 class="logo-accent">Security Dashboard — s1mplehack</h1>
                    <p class="muted-sm">A modern control center and learning hub for app security. The cards below show
                        tips and tools to improve defensive practices.</p>
                    <div class="mt-3 d-flex gap-2">
                        <a class="btn btn-accent" href="#cards">Get Started</a>
                        <a class="btn btn-outline-accent" href="#security">Learn More</a>
                    </div>
                </div>
                <div class="hero-right text-end">
                    <div
                        style="width:220px;height:120px;border-radius:12px;background:linear-gradient(90deg,rgba(0,210,122,0.06),rgba(0,210,122,0.02));display:flex;align-items:center;justify-content:center;box-shadow:0 10px 30px rgba(0,0,0,0.6);">
                        <div>
                            <div class="small-muted">Server Status</div>
                            <div style="font-weight:700;font-size:22px;color:var(--accent)">Secure</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="cards" class="mb-4">
            <h4 class="mb-3">Quick Security Tools</h4>
            <div class="grid-cards">
                <div class="card-glow">
                    <div class="d-flex align-items-start gap-3 mb-2">
                        <div class="icon-circle">A1</div>
                        <div>
                            <h5>WAF Protection</h5>
                            <div class="muted-sm">Use a Web Application Firewall to filter suspicious traffic and block
                                common attacks.</div>
                        </div>
                    </div>
                </div>
                <div class="card-glow">
                    <div class="d-flex align-items-start gap-3 mb-2">
                        <div class="icon-circle">S</div>
                        <div>
                            <h5>Full TLS</h5>
                            <div class="muted-sm">Enable HTTPS with valid certificates and enforce HSTS.</div>
                        </div>
                    </div>
                </div>
                <div class="card-glow">
                    <div class="d-flex align-items-start gap-3 mb-2">
                        <div class="icon-circle">CS</div>
                        <div>
                            <h5>CSRF Defense</h5>
                            <div class="muted-sm">Use CSRF tokens to prevent forged requests.</div>
                        </div>
                    </div>
                </div>
                <div class="card-glow">
                    <div class="d-flex align-items-start gap-3 mb-2">
                        <div class="icon-circle">PW</div>
                        <div>
                            <h5>Password Hashing</h5>
                            <div class="muted-sm">Store passwords securely with Argon2id or bcrypt.</div>
                        </div>
                    </div>
                </div>
                <div class="card-glow">
                    <div class="d-flex align-items-start gap-3 mb-2">
                        <div class="icon-circle">RL</div>
                        <div>
                            <h5>Rate Limiting</h5>
                            <div class="muted-sm">Limit login attempts to stop brute-force attacks.</div>
                        </div>
                    </div>
                </div>
                <div class="card-glow">
                    <div class="d-flex align-items-start gap-3 mb-2">
                        <div class="icon-circle">LG</div>
                        <div>
                            <h5>Logging & Audit</h5>
                            <div class="muted-sm">Monitor logs and keep periodic backups for incident analysis.</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="security" class="card card-auth p-4">
            <h4 class="mb-3 glow-text">Security Awareness</h4>
            <p class="muted-sm glow-text">This section introduces common attack vectors and defensive measures to raise
                awareness and strengthen security. The content here is ethical and defensive only.</p>

            <div class="row mt-3 glow-text">
                <div class="col-md-6">
                    <h6>Common Attack Types</h6>
                    <ul>
                        <li><strong>Phishing:</strong> Social engineering via fake emails. <em>Defense:</em> User
                            training and MFA.</li>
                        <li><strong>SQL Injection:</strong> Injecting malicious SQL. <em>Defense:</em> Prepared
                            statements and parameter binding.</li>
                        <li><strong>XSS:</strong> Injecting scripts in web pages. <em>Defense:</em> Escape output and
                            apply CSP.</li>
                        <li><strong>CSRF:</strong> Forged cross-site requests. <em>Defense:</em> CSRF tokens and origin
                            checks.</li>
                        <li><strong>Brute-force:</strong> Guessing passwords. <em>Defense:</em> Rate limiting and
                            CAPTCHA.</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <h6>Developer Tips</h6>
                    <ol>
                        <li>Always use HTTPS; mark cookies Secure and HttpOnly.</li>
                        <li>Hash passwords with Argon2id; never store plain text.</li>
                        <li>Escape all user output and enforce a strict CSP.</li>
                        <li>Validate and sanitize all input; use prepared statements.</li>
                        <li>Log all access and review logs regularly.</li>
                    </ol>
                </div>
            </div>

            <hr>
            <p class="muted-sm glow-text">For an ethical penetration checklist or secure deployment guide, ask to
                generate a defensive-only tutorial.</p>
        </section>

        <section class="github-box text-center my-5">
            <div class="glass-card p-4">
                <img src="https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/github.svg" alt="GitHub Logo" width="50"
                    height="50" class="github-logo mb-3">
                <h5 class="text-light mb-2">Check out our GitHub Repository</h5>
                <p class="muted-sm mb-3">Explore the source code, contribute, or star the project.</p>
                <a href="https://github.com/yourusername" target="_blank" class="btn btn-glow">Visit GitHub</a>
            </div>
        </section>


        <footer class="mt-4 small-muted text-center">© s1mplehack — Security Learning & Defensive Tools</footer>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>