<?php

$host = 'localhost'; 
$user = 'root';      
$pass = 'Loyd_database';          
$dbname = 'school_records'; 


$conn = new mysqli($host, $user, $pass, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
