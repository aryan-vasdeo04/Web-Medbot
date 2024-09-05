<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="viewdoc.css">
    <title>View Doctors</title>
</head>

<body>
    <header>
        <h1>View Doctors</h1>
    </header>



    <div class="search-doc">
        <form id="search-doc-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name">

            <label for="speciality">Speciality:</label>
            <input type="text" id="speciality" name="speciality">

            <button type="submit">Search Doctors</button>
        </form>
    </div>
    <div class="doctor-list">
        <h3>View Doctor</h3>
        <?php
        session_start();
        include "connect.php";


        if (isset($_POST['name']) || isset($_POST['speciality'])) {
            $name = $_POST['name'];
            $speciality = $_POST['speciality'];
            if ($name == "") {
                $sql = "SELECT * FROM doctor WHERE speciality='$speciality'";
            } else if ($speciality == "") {
                $sql = "SELECT * FROM doctor WHERE name='" . $name . "'";
            } else
                $sql = "SELECT * FROM doctor WHERE name='$name' AND speciality='$speciality'";
            $result = mysqli_query($database, $sql);
            if (mysqli_num_rows($result) > 0) {
                echo "<table border='1'>";
                echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>Speciality</th>";
                echo "<th>Qualification</th>";
                echo "<th>Phone</th>";
                echo "<th>Email</th>";
                echo "</tr>";
                $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
                foreach ($result as $r) {
                    echo "<tr>";
                    echo "<td>" . $r['name'] . "</td>";
                    echo "<td>" . $r['speciality'] . "</td>";
                    echo "<td>" . $r['qualification'] . "</td>";
                    echo "<td>" . $r['phone'] . "</td>";
                    echo "<td>" . $r['email'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
                echo "</form>";
            } else {
                echo "No doctors found";
            }
        }



        ?>
    </div>
    <!-- Add a booking form that initially hides -->
    <div class="booking-form">
        <h2>Book an Appointment</h2>
        <form id="appointment-form" method="post">

            <button type="submit" name="button1" value="book">Book Appointment</button>
        </form>
    </div>


    <footer>
        <p>&copy; 2023 Your Healthcare</p>
    </footer>
    
</body>

</html>