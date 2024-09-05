<?php
// $database=mysqli_connect("mysql-151958-0.cloudclusters.net","admin","du790pLW","Medbotdb",17409);
$database=mysqli_connect("localhost","root","","mysql",3306);
// before running findhos.php, make sure to add services to the hospital table in the database
if (!($database)) {
    die(mysqli_connect_error());
}
?>