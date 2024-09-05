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
        
        <section class="login-box" id="doctor-login-form">
            <h1> Doctor Login</h1>
            <form action="logindoc.php" method="post">
                <input type="text" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <button class="login-button" type="submit">Login</button>
            </form>
        </section>
        
    </div>
    <script src="login.js"></script>
</body>
</html>
