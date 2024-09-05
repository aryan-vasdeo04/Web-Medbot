<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <section class="login-box" id="hospital-login-form">
            <h1> Hospital Login</h1>
            <form action="loginhos.php" method="post">
                <input type="text" placeholder="Email" required>
                <input type="password" placeholder="Password" required>
                <button class="login-button" type="submit">Login</button>
            </form>
        </section>
    </div>
    <script src="login.js"></script>
</body>
</html>
