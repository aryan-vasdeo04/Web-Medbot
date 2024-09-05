<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Sign In</title>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "connect.php";
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        if ($email == "" || $password == "" || $name == "" || $address == "" || $phone == "") {
            echo "Please fill all the fields";
        } else {
            $lastid = $database->query("SELECT id FROM hospital ORDER BY id DESC LIMIT 1");
            $lastid = $lastid->fetch_assoc();
            $lastid = $lastid['id'] + 1;
            $sql = "INSERT INTO hospital (id,name,email,password,address,phone) VALUES ('$lastid','$name','$email','$password','$address','$phone')";
            $result = mysqli_query($database, $sql);
            if ($result) {
                echo "<script>alert('Sign Up Successful');</script>";
                $email = $_POST['email'];
                $password = $_POST['password'];
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
                    $_SESSION['address'] = $address;
                    $_SESSION['phone'] = $phone;
                    $SESSION['email'] = $email;
                } else {
                    echo "<script>alert('Invalid Credentials');</script>";
                }
            } else {
                echo "<script>alert('Sign Up Failed');</script>";
            }
        }
    }
    ?>
    <div class="login-container">
        <section class="login-box" id="user-login-form">
            <h1>Hospital Sign Up</h1>
            <form action="signhos.php" method="post">
                <input type="text" placeholder="Email" name="email" required>
                <input type="text" placeholder="Name" name="name" required>
                <input type="text" placeholder="Address" name="address" required>
                <input type="text" placeholder="Phone Number" name="phone" required>
                <input type="password" placeholder="Password" name="password" required>
                <button class="login-button" type="submit">Sign In</button>
            </form>
        </section>
    </div>
    <!-- <script src="login.js"></script> -->
</body>

</html>