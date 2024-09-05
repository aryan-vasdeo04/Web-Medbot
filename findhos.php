<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="findhos.css">
    <title>Find Hospitals</title>
</head>

<body>
    <header>
        <h1>Find Hospitals</h1>
    </header>
    <div class="hospital-search">
        <form id="hospital-search-form" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="location">Location:</label>
            <input type="text" id="location" name="address">

            <label for="services">Services Needed:</label>
            <input type="text" id="services" name="services">

            <button type="submit">Search Hospitals</button>
        </form>
    </div>

    <div class="hospital-results">
        <h2>Search Results</h2>
        <ul id="results-list">

            <!-- Hospital search results will be populated dynamically using JavaScript -->
            <?php
            session_start();
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                include "connect.php";
                $location = $_POST['address'];
                $services = $_POST['services'];
                if ($location == "" && $services == "") {
                    echo "<script>alert('Please enter a location or services needed')</script>";
                    exit();
                }
                if ($location == "") {
                    $sql = "SELECT * FROM hospital WHERE services LIKE '%$services%'";
                } else if ($services == "") {
                    $sql = "SELECT * FROM hospital WHERE address like '%$location%'";
                } else
                    $sql = "SELECT * FROM hospital WHERE address like '%$location%' AND services LIKE '%$services%'";
                $result = mysqli_query($database, $sql);
                if (mysqli_num_rows($result) > 0) {
                    echo "<table border='1' width='800px'>";
                    echo "<tr>";
                    echo "<th>Hospital Name</th>";
                    echo "<th>Location</th>";
                    echo "<th>Services</th>";
                    echo "<th>Email</th>";
                    echo "<th>Phone</th>";
                    echo "</tr>";
                    $result = mysqli_fetch_assoc($result);
                    echo "<tr>";
                    echo "<td>" . $result['name'] . "</td>";
                    echo "<td>" . $result['address'] . "</td>";
                    // echo "<td>" . $result['services'] . "</td>";
                    echo "<td>" . 'scanning' . "</td>";
                    echo "<td>" . $result['email'] . "</td>";
                    echo "<td>" . $result['phone'] . "</td>";
                    echo "</tr>";
                    echo "</table>";
                } else {
                    echo "No results found";
                }
            }
            ?>
        </ul>
    </div>

    <footer>
        <p>&copy; 2023 Your Healthcare</p>
    </footer>

    <!-- <script src="findhos.js"></script> -->
</body>

</html>