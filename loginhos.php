<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Hospital Login</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "connect.php";
        $email = $_POST["email"];
        $password = $_POST["password"];
        $sql = "SELECT * FROM hospital WHERE email='$email' AND password='$password'";
        $result = mysqli_query($database, $sql);
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $email = $row['email'];
            $name = $row['name'];
            $address = $row['address'];
            $phone = $row['phone'];
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['name'] = $name;
            $_SESSION['phone'] = $phone;
            $_SESSION['email'] = $email;
            $_SESSION['address'] = $address;
            // header("Location: .php");
        } else {
            echo "Invalid Credentials";
        }
    } else
        echo "not connect"

    ?>
    <div class="login-container">
        <section class="login-box" id="hospital-login-form">
            <h1>Hospital Login</h1>

            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button class="login-button" type="submit">Login</button>
            </form>
        </section>
    </div>
    <script src="login.js"></script>
</body>

</html>