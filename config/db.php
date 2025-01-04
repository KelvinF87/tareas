<?php
$servername = "192.168.0.13";
$username = "afs";
$passworddb = "Str0ngP@ssw0rd!";
$dbname = "tareadb";

// Create connection
$conn = new mysqli($servername, $username, $passworddb, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";
?>