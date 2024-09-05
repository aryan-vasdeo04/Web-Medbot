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
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        include "connect.php";
        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];
        $date_of_birth = $_POST['date_of_birth'];
        $phone = $_POST['phone'];
        $speciality = $_POST['speciality'];
        $qualification = $_POST['qualification'];
        if ($email == "" || $password == "" || $name == "" || $date_of_birth == "" || $phone == "" || $speciality == "") {
            echo "Please fill all the fields";
        } else {
            $lastid = $database->query("SELECT id FROM doctor ORDER BY id DESC LIMIT 1");
            $lastid = $lastid->fetch_assoc();
            $lastid = $lastid['id'] + 1;
            $sql = "INSERT INTO doctor (id,name,email,password,date_of_birth,phone,speciality,qualification) VALUES ('$lastid','$name','$email','$password','$date_of_birth','$phone','$speciality','$qualification')";
            $result = mysqli_query($database, $sql);
            if ($result) {
                echo "<script>alert('Sign Up Successful');</script>";
                $email = $_POST['email'];
                $password = $_POST['password'];
                $sql = "SELECT * FROM doctor WHERE email='$email' AND password='$password'";
                $result = mysqli_query($database, $sql);
                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $id = $row['id'];
                    $email = $row['email'];
                    $name = $row['name'];
                    $speciality = $row['speciality'];
                    $date_of_birth = $row['date_of_birth'];
                    $phone = $row['phone'];
                    $qualification = $row['qualification'];

                    session_start();
                    $_SESSION['id'] = $id;
                    $_SESSION['name'] = $name;
                    $_SESSION['date_of_birth'] = $date_of_birth;
                    $_SESSION['phone'] = $phone;
                    $_SESSION['speciality'] = $speciality;
                    $_SESSION['qualification'] = $qualification;
                    $_SESSION['email'] = $email;
                    header("Location: docdash.php");
                }
                else {
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
            <h1>Doctor Sign Up</h1>
            <form action="signdoc.php" method="post">
                <input type="text" placeholder="Email" name="email" required>
                <input type="text" placeholder="Name" name="name" required>
                <input type="text" placeholder="Date of Birth (YYYY-MM-DD)" name="date_of_birth" required>
                <input type="text" placeholder="Phone Number" name="phone" required>
                <input type="text" placeholder="Speciality" name="speciality" required>
                <input type="text" placeholder="Qualification" name="qualification" required>
                <input type="password" placeholder="Password" name="password" required>
                <button class="login-button" type="submit">Sign Up</button>
            </form>
        </section>
    </div>
    <!-- <script src="login.js"></script> -->
</body>

</html>