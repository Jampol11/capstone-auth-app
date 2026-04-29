<?php $user = $_SESSION['user'] ?? null; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Capstone Auth - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php?action=home">Capstone</a>
        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="index.php?action=logout">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h1 class="mb-3">Welcome, <?php echo htmlspecialchars($user['firstname'] ?? 'Guest'); ?>!</h1>
                    <p class="lead">You are now logged in to the Capstone authentication system.</p>
                    <p>This secure starter module is ready for dashboard, inventory, or online synthesis integration.</p>
                    <div class="row g-3 mt-4">
                        <div class="col-md-4">
                            <div class="card border-primary h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Dashboard</h5>
                                    <p class="card-text">Add charts, reports, and status widgets for your Capstone project.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-success h-100">
                                <div class="card-body">
                                    <h5 class="card-title">Modules</h5>
                                    <p class="card-text">Connect future Capstone modules like inventory or synthesis systems.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card border-warning h-100">
                                <div class="card-body">
                                    <h5 class="card-title">API Ready</h5>
                                    <p class="card-text">Build REST or API endpoints on top of this secure auth layer.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
