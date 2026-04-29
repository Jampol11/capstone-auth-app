<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Capstone Auth - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-light">
<div class="auth-page min-vh-100 d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-5">
                <div class="card shadow-sm">
                    <div class="card-body p-4">
                        <h3 class="mb-3 text-center">Capstone Login</h3>
                        <p class="text-center text-muted mb-4">Secure access to your Capstone module starter.</p>
                        <?php if (!empty($errors)): ?>
                            <div class="alert alert-danger"><?php echo htmlspecialchars($errors[0]); ?></div>
                        <?php endif; ?>
                        <?php if (isset($_GET['status']) && $_GET['status'] === 'registered'): ?>
                            <div class="alert alert-success">Registration successful. Please log in.</div>
                        <?php endif; ?>
                        <form action="index.php?action=login" method="POST" novalidate>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                        <div class="mt-4 text-center">
                            <p class="mb-0">Don't have an account? <a href="index.php?action=register">Register here</a></p>
                        </div>
                    </div>
                </div>
                <p class="text-center text-muted mt-3">Capstone Authentication System</p>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
