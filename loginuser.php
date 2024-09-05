<?php

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    include "connect.php";
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM userdata WHERE email='$email' AND password='$password'";
    $result = mysqli_query($database,$sql);
    if (mysqli_num_rows($result)>0) {
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
    }
    else{
        echo "Invalid Credentials";
    }
}
else 
    echo "not connect"

?>