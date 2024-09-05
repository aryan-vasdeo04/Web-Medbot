<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bookapp.css">
    <title>Book an Appointment</title>
</head>
<body>
    <header>
        <h1>Book an Appointment</h1>
    </header>
    <?php
        session_start();
        if(isset($_SESSION['doc_id'])){
            echo '<script> 
            let name = document.getElementById("name");
            let email = document.getElementById("email");
            name.value = "$_SESSION["doc_name"]";
            email.value = "$_SESSION["doc_email"]";
            </script>
            ';
        }
        if ($_SERVER["REQUEST_METHOD"] == "POST")  {
            include "connect.php";
            $name = $_POST['name'];
            $email = $_POST['email'];
            $date = $_POST['date'];
            $time = $_POST['time'];
            $sql = "SELECT * FROM doctor WHERE email='$email'";
            $result = mysqli_query($database,$sql);
            if (mysqli_num_rows($result)>0) {
                $row = mysqli_fetch_assoc($result);
                $doctor_id = $row['id'];
            }
            else {
                echo "<script>alert('Doctor Not Available');</script>";
                echo"Reload the page and try again.";
                echo "<meta http-equiv='refresh' content='0'>";
                // clearstatcache();
                // return;
            }
            $sql = "SELECT * FROM appointment WHERE doctorid='$doctor_id' AND date='$date' AND ABS(TIME_TO_SEC(TIMEDIFF(time,'$time')))<1200";
            $result = mysqli_query($database,$sql);
            if (mysqli_num_rows($result)>0) {
                // clearstatcache();
                echo "<meta http-equiv='refresh' content='0'>";
                echo "<script>alert('Doctor Not Available At Required Time');</script>";
                // return;
            }
            $userid = $_SESSION['id'];
            $sql = "SELECT id from appointment ORDER BY id DESC LIMIT 1";
            $result = mysqli_query($database,$sql);
            $appid = $result->fetch_assoc();
            // $appid = $appid['id']+1;
            $sql = "INSERT INTO appointment (userid, doctorid, date, time) VALUES ('$userid', '$doctor_id', '$date', '$time')";
            $result = mysqli_query($database,$sql);
            if ($result) {
                echo "<script>alert('Appointment Successful');</script>";
            }
            else {
                echo "<script>alert('Appointment Failed');</script>";
            }
        }
    ?>
    <div class="appointment-form">
        <form id="appointment-form" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
            <label for="name">Doctor Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Doctor Email Address:</label>
            <input type="email" id="email" name="email" required>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="time">Time:</label>
            <input type="time" id="time" name="time" required>

            <!-- <label for="doctor">Select a Doctor:</label>
            <select id="doctor" name="doctor" required>
                <option value="doctor1">Doctor 1</option>
                <option value="doctor2">Doctor 2</option>
                <option value="doctor3">Doctor 3</option>
            </select> -->

            <button type="submit">Book Appointment</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2023 Your Healthcare</p>
    </footer>

    <!-- <script src="bookapp.js"></script> -->
</body>
</html>
