<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Doctor Login</title>
</head>

<body>
    <div class="login-container">
        <section class="login-box" id="doctor-login-form">
            <h1>Doctor Login</h1>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include "connect.php";
                $email = $_POST['email'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM doctor WHERE email='$email' AND password='$password'";
                $result = mysqli_query($database, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $email = $row['email'];
                    $name = $row['name'];
                    $date_of_birth = $row['date_of_birth'];
                    $phone = $row['phone'];
                    $speciality = $row['speciality'];
                    $qualification = $row['qualification'];
                    session_start();
                    $_SESSION['id'] = $id;
                    $_SESSION['name'] = $name;
                    $_SESSION['date_of_birth'] = $date_of_birth;
                    $_SESSION['phone'] = $phone;
                    $_SESSION['email'] = $email;
                    $_SESSION['speciality'] = $speciality;
                    $_SESSION['qualification'] = $qualification;
                    header("Location: docdash.php");
                } else {
                    echo "Invalid Credentials";
                }
            } else
                echo "not connect"
            ?>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="text" name="email" placeholder="Email" required>
                <input type="password" name="password" placeholder="Password" required>
                <button class="login-button">Login</button>
            </form>
        </section>
    </div>
    <script src="login.js"></script>
</body>

</html>