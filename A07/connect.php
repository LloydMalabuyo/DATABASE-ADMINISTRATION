<?php


$dbhost = "localhost"; 
$dbuser = "root";
$dbpass = "";
$dbname = "school_records";


$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function executeQuery($stmt) {
    global $conn;
    return $stmt->execute();
}
?>
