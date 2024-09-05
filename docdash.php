<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="docdash.css">
    <title>Doctor's Dashboard</title>
</head>

<body>
    <header>
        <h1>Doctor's Dashboard</h1>
    </header>
    <?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $speciality = $_POST['speciality'];
        $qualification = $_POST['qualification'];
        include 'connect.php';
        $sql = "UPDATE doctor SET name='$name', speciality='$speciality', qualification='$qualification' WHERE id=" . $_SESSION['id'];
        $result = mysqli_query($database, $sql);
        $sql = "SELECT * FROM doctor  WHERE id=" . $_SESSION['id'];
        $result = mysqli_query($database, $sql);
        if (mysqli_num_rows($result) >0) {
            $row = mysqli_fetch_assoc($result);
            $name = $row['name'];
            $speciality = $row['speciality'];
            $qualification = $row['qualification'];
        } else {
            echo "<script>alert('Error: Updating Profile')</script>";
        }
        $_SESSION['name'] = $name;
        $_SESSION['speciality'] = $speciality;
        $_SESSION['qualification'] = $qualification;
    }
    ?>
    <div class="doctor-dashboard">
        <section class="profile">
            <h2>My Profile</h2>
            <div class="profile-info">
                <p><strong>Name:</strong> <?php echo $_SESSION['name'] ?></p>
                <p><strong>Specialty:</strong> <?php echo $_SESSION['speciality'] ?></p>
                <p><strong>Qualifications:</strong><?php echo $_SESSION['qualification'] ?></p>
            </div>
            <form id="update-profile-form" action="docdash.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="<?php echo $_SESSION['name'] ?>">
                <label for="speciality">Specialty:</label>
                <input type="text" name="speciality" id="speciality" value="<?php echo $_SESSION['speciality'] ?>">
                <label for="qualification">Qualifications:</label>
                <input type="text" name="qualification" id="qualification" value="<?php echo $_SESSION['qualification'] ?>">
                <button id="update-profile-button" type="submit">Update Profile</button>
            </form>
            <button id="dummy">Update Profile</button>

        </section>
<hr>
<hr>
        <section class="patient-reports">
            <h2>Patient Reports</h2>
            <ul id="patient-reports-list">
                <!-- Patient reports will be populated dynamically using JavaScript -->
            </ul>
        </section>

        <section class="appointments">
            <h2>Appointments</h2>
            <ul id="appointments-list">
                <!-- Appointments will be populated dynamically using JavaScript -->
                <?php
                include 'connect.php';
                $sql = "SELECT * FROM appointment WHERE doctorid=" . $_SESSION['id'] . " ORDER BY date ASC";
                $result = mysqli_query($database, $sql);
                echo "<table border=1 width='800px'>";
                echo "<tr>";
                echo "<th>Name</th>";
                echo "<th>Date</th>";
                echo "<th>Time</th>";
                echo "<th>Phone</th>";
                echo "<th>Email</th>";
                echo "</tr>";
                if (mysqli_num_rows($result) > 0) {
                    $re = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    foreach ($re as $r) {
                        $val = $r['userid'];
                        $sql = "SELECT * FROM userdata WHERE id=" . $val;
                        $resu = mysqli_query($database, $sql);
                        $resu = mysqli_fetch_assoc($resu);
                        echo "<tr>";
                        echo "<td>" . $resu['name'] . "</td>";
                        echo "<td>" . $r['date'] . "</td>";
                        echo "<td>" . $r['time'] . "</td>";
                        echo "<td>" . $resu['phone'] . "</td>";
                        echo "<td>" . $resu['email'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<td style = 'text-align:center' colspan = '5'>No appointment available</td>";
                }
                echo "</table>";

                ?>
            </ul>
        </section>
    </div>

    <footer>
        <p>&copy; 2023 Your Healthcare</p>
    </footer>
    <script>
        let updateProfileForm = document.getElementById('update-profile-form');
        let updateProfileButton = document.getElementById('update-profile-button');
        let dummy = document.getElementById('dummy');
        dummy.addEventListener('click', function(e) {
            updateProfileForm.style.display = 'block';
            updateProfileButton.style.display = 'block';
            dummy.style.display = 'none';
        });
        updateProfileButton.addEventListener('click', function(e) {
            updateProfileForm.style.display = 'none';
            updateProfileButton.style.display = 'none';
            dummy.style.display = 'block';
        });
    </script>
    <!-- <script src="docdash.js"></script> -->
</body>

</html>