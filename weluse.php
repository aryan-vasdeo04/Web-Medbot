<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="weluse.css">
    <title>User Dashboard</title>
</head>

<body>
    <header>
        <?php
        session_start();
        ?>
        <h1 id="welcome-message">Welcome, <?php echo $_SESSION['name'] ?></h1>
        <p>Contact Information: <?php echo $_SESSION['email'] ?></p>
    </header>
    <div class="user-dashboard">
        <section class="quick-access-buttons">
            <button class="btn-appointment" onclick="window.location.href = 'bookapp.php';">Book an Appointment</button>
            <button class="btn-hospitals" onclick="window.location.href = 'findhos.php';">Find Hospitals</button>
            <button class="btn-doctors" onclick="window.location.href = 'viewdoc.php';">View Doctors</button>
        </section>

        <section class="appointments">
            <h2>Upcoming Appointments</h2>
            <ul id="appointments-list">
                <?php
                // session_start();
                include "connect.php";
                // if ($_SERVER['REQUEST_METHOD'] == "POST") {

                $email = $_SESSION['email'];
                // $speciality = $_SESSION['speciality'];
                $sql = "SELECT * FROM userdata WHERE email='$email'";
                $result = mysqli_query($database, $sql);

                if (mysqli_num_rows($result) > 0) {
                    $result = mysqli_fetch_assoc($result);
                    echo "<table>";
                    echo "<tr>";
                    // echo "<th></th>";
                    echo "<th>Name</th>";
                    echo "<th>Date</th>";
                    echo "<th>Time</th>";
                    echo "<th>Phone</th>";
                    echo "<th>Email</th>";
                    echo "</tr>";
                    $id = $result['id'];
                    $sql = "SELECT * FROM appointment WHERE userid='$id'";
                    $res = mysqli_query($database, $sql);
                    // $result = mysqli_fetch_assoc($result);

                    if (mysqli_num_rows($res) > 0) {
                        $res = mysqli_fetch_all($res, MYSQLI_ASSOC);
                        $prev = [];
                        foreach ($res as $r) {
                            $val = $r['doctorid'];
                            $sql = "SELECT * FROM doctor WHERE id='$val'";
                            $result = mysqli_query($database, $sql);
                            $result = mysqli_fetch_assoc($result);

                            // echo '<td><input type="checkbox" name="checkbox_name" value="$val"></td>';
                            echo "<tr>";
                            echo "<td>" . $result['name'] . "</td>";
                            echo "<td>" . $r['date'] . "</td>";
                            echo "<td>" . $r['time'] . "</td>";
                            echo "<td>" . $result['phone'] . "</td>";
                            echo "<td>" . $result['email'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<td style = 'text-align:center' colspan = '5'>No appointment available</td>";
                    }
                    echo "</table>";
                }
                ?>
                <!-- Appointments will be populated dynamically using JavaScript -->
            </ul>
        </section>

        <section class="doctors-and-qualifications">
            <h2>Doctors</h2>
            <ul id="doctors-list">
                <?php
                echo "<table>";
                echo "<tr>";
                // echo "<th></th>";
                echo "<th>Name</th>";
                echo "<th>Speciality</th>";
                echo "<th>Qualification</th>";
                echo "<th>Phone</th>";
                echo "<th>Email</th>";
                echo "</tr>";
                $sql = "SELECT * FROM appointment WHERE userid='$id'";
                $res = mysqli_query($database, $sql);
                if (mysqli_num_rows($res) > 0) {
                    // $res = mysqli_fetch_all($res, MYSQLI_ASSOC);
                    foreach ($res as $r) {
                        echo "<tr>";
                        $val = $r['doctorid'];
                        if (array_search($r['doctorid'], $prev) !== false) continue;
                        array_push($prev, $val);
                        $sql = "SELECT * FROM doctor WHERE id='$val'";
                        $result = mysqli_query($database, $sql);
                        $result = mysqli_fetch_assoc($result);
                        // echo '<td><input type="checkbox" name="checkbox_name" value="$val"></td>';
                        echo "<td>" . $result['name'] . "</td>";
                        echo "<td>" . $result['speciality'] . "</td>";
                        echo "<td>" . $result['qualification'] . "</td>";
                        echo "<td>" . $result['phone'] . "</td>";
                        echo "<td>" . $result['email'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<td style = 'text-align:center' colspan = '5'>No appointment available</td>";
                }
                echo "</table>";
                ?>
                <!-- Doctor list will be populated dynamically using JavaScript -->
            </ul>
        </section>

        <section class="hospitals">
            <h2>Hospitals</h2>
            <ul id="hospitals-list">

                <!-- Hospital list will be populated dynamically using JavaScript -->
            </ul>
        </section>

        <section class="chatbot">
            <h2>Healthcare Chatbot</h2>
            <button class="chatbot-button" id="chatbot-button" onclick="window.location.href = 'bot.html';">Open Chatbot</button>
        </section>

        <section class="reports-and-medical-records">
            <h2>Medical Records</h2>
            <ul id="reports-list">
                <!-- Report list will be populated dynamically using JavaScript -->
            </ul>
        </section>
    </div>

    <footer>
        <!-- Footer content goes here -->
    </footer>

    <!-- <script src="weluse.js"></script> -->
</body>

</html>