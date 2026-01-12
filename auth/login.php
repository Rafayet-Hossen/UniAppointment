<?php
session_start();

// Handle login form submission
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Basic validation
    if (empty($email) || empty($password)) {
        $error = 'Please fill in all fields';
    } else {
        // TODO: Add your database authentication logic here
        // For now, this is just a template
        $error = 'Authentication not implemented yet';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Educational Platform</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>

<body>
    <div class="login-container">
        <div class="login-wrapper">
            <div class="login-header">
                <div class="logo-container">
                    <svg class="logo-icon" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 2L2 7L12 12L22 7L12 2Z" stroke="#F68A21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M2 17L12 22L22 17" stroke="#F68A21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        <path d="M2 12L12 17L22 12" stroke="#F68A21" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </div>
                <h1>Welcome Back</h1>
                <p class="subtitle">Sign in to continue your journey at UIU</p>
            </div>

            <form method="POST" action="" class="login-form">
                <?php if ($error): ?>
                    <div class="error-message">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 18.3333C14.6024 18.3333 18.3333 14.6024 18.3333 10C18.3333 5.39763 14.6024 1.66667 10 1.66667C5.39763 1.66667 1.66667 5.39763 1.66667 10C1.66667 14.6024 5.39763 18.3333 10 18.3333Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10 6.66667V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M10 13.3333H10.0083" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <span><?php echo htmlspecialchars($error); ?></span>
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.5 6.66667L9.0755 11.0504C9.63533 11.4236 10.3647 11.4236 10.9245 11.0504L17.5 6.66667M4.16667 15.8333H15.8333C16.7538 15.8333 17.5 15.0872 17.5 14.1667V5.83333C17.5 4.91286 16.7538 4.16667 15.8333 4.16667H4.16667C3.24619 4.16667 2.5 4.91286 2.5 5.83333V14.1667C2.5 15.0872 3.24619 15.8333 4.16667 15.8333Z" stroke="#666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Enter your email"
                            required
                            autocomplete="email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-wrapper">
                        <svg class="input-icon" width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.8333 9.16667H4.16667C3.24619 9.16667 2.5 9.91286 2.5 10.8333V15.8333C2.5 16.7538 3.24619 17.5 4.16667 17.5H15.8333C16.7538 17.5 17.5 16.7538 17.5 15.8333V10.8333C17.5 9.91286 16.7538 9.16667 15.8333 9.16667Z" stroke="#666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M5.83333 9.16667V5.83333C5.83333 4.45262 6.36905 3.12829 7.30701 2.19033C8.24497 1.25237 9.5693 0.716667 10.95 0.716667C12.3307 0.716667 13.655 1.25237 14.593 2.19033C15.531 3.12829 16.0667 4.45262 16.0667 5.83333V9.16667" stroke="#666" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Enter your password"
                            required
                            autocomplete="current-password">
                    </div>
                </div>

                <div class="form-options">
                    <label class="remember-me">
                        <input type="checkbox" name="remember">
                        <span>Remember me</span>
                    </label>
                    <a href="#" class="forgot-password">Forgot password?</a>
                </div>

                <button type="submit" class="login-button">
                    <span>Sign In</span>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.5 15L12.5 10L7.5 5" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </form>

            <div class="login-footer">
                <p>Don't have an account? <a href="register.php">Sign up here</a></p>
            </div>
        </div>
    </div>
</body>

</html>