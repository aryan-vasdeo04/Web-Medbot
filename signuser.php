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
        $date_of_birth = $_POST['date_of_birth'];
        $phone = $_POST['phone'];
        if ($email == "" || $password == "" || $name == "" || $date_of_birth == "" || $phone == "") {
            echo "Please fill all the fields";
        } else {
            $lastid = $database->query("SELECT id FROM userdata ORDER BY id DESC LIMIT 1");
            $lastid = $lastid->fetch_assoc();
            $lastid = $lastid['id'] + 1;
            $sql = "INSERT INTO userdata (id,name,email,password,date_of_birth,phone) VALUES ('$lastid','$name','$email','$password','$date_of_birth','$phone')";
            $result = mysqli_query($database, $sql);
            if ($result) {
                echo "Sign Up Successful";
                $email = $_POST['email'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM userdata WHERE email='$email' AND password='$password'";
                $result = mysqli_query($database, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $email = $row['email'];
                    $name = $row['name'];
                    $date_of_birth = $row['date_of_birth'];
                    $phone = $row['phone'];
                    session_start();
                    $_SESSION['id'] = $id;
                    $_SESSION['name'] = $name;
                    $_SESSION['date_of_birth'] = $date_of_birth;
                    $_SESSION['phone'] = $phone;
                    $_SESSION['email'] = $email;
                    header("Location: weluse.php");
                } else {
                    echo "<script>Invalid Credentials</script>";
                }
            } else {
                echo "<script>Sign Up Failed</script>";
            }
        }
    }
    ?>
    <div class="login-container">
        <section class="login-box" id="user-login-form">
            <h1>User Sign Up</h1>
            <form action="signuser.php" method="post">
                <input type="text" placeholder="Email" name="email" required>
                <input type="text" placeholder="Name" name="name" required>
                <input type="text" placeholder="Date of Birth  (YYYY-MM-DD)" name="date_of_birth" required>
                <input type="text" placeholder="Phone Number" name="phone" required>
                <input type="password" placeholder="Password" name="password" required>
                <button class="login-button" type="submit">Sign In</button>
            </form>
        </section>
    </div>
</body>

</html>