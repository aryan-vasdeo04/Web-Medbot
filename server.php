<?php

// $database=mysqli_connect("mysql-151958-0.cloudclusters.net","admin","du790pLW","Medbotdb",17409);
$database=mysqli_connect("localhost","root","","mysql",3306);

if (!($database)) {
    die(mysqli_connect_error());
}
$data1="CREATE TABLE userdata (
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    name VARCHAR(50),
    email VARCHAR(255) PRIMARY KEY,
    password VARCHAR(255),
    date_of_birth DATE,
    phone VARCHAR(20),
    medical_record TEXT
);";
$data2=
"CREATE TABLE doctor (
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    name VARCHAR(255),
    email VARCHAR(255) PRIMARY KEY,
    date_of_birth DATE,
    phone VARCHAR(20),
    speciality VARCHAR(255),
    qualification VARCHAR(255),
    password VARCHAR(255)
);
";
$data3="
CREATE TABLE hospital (
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    email VARCHAR(255) PRIMARY KEY,
    name VARCHAR(255),
    phone VARCHAR(20),
    address VARCHAR(255),
    password VARCHAR(255)
);";
$data4="

CREATE TABLE appointment (
    id INT NOT NULL UNIQUE AUTO_INCREMENT,
    userid INT,
    doctorid INT,
    date DATE,
    time TIME,
    PRIMARY KEY (id)
);


";
$d = mysqli_query($database,$data1);
$d1 = mysqli_query($database,$data2);
$d2 = mysqli_query($database,$data3);
$d3 = mysqli_query($database,$data4);
?>