<?php

// $database=mysqli_connect("mysql-151958-0.cloudclusters.net","admin","du790pLW","Medbotdb",17409);
$database=mysqli_connect("localhost","root","","mysql",3306);

if (!($database)) {
    die(mysqli_connect_error());
}
$data1="DROP TABLE userdata;";
$data2="DROP TABLE doctor;";
$data3="DROP TABLE hospital;";
$data4="DROP TABLE appointment;";

$d = mysqli_query($database,$data1);
$d1 = mysqli_query($database,$data2);
$d2 = mysqli_query($database,$data3);
$d3 = mysqli_query($database,$data4);
?>