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
        <section class="login-box" id="user-login-form">
            <h1>User Login</h1>
            <form action="loginuser.php" method="post">
                <input type="text" placeholder="email" name="email" required>
                <input type="password" placeholder="password" name="password" required>
                <button class="login-button" type="submit">Login</button>
            </form>
        </section>
    </div>
</body>
</html>
