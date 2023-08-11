<?php
$servername = "sql12.freemysqlhosting.net";
$username = "sql12614073";
$password = "X1kGN2PXRb";
$dbname = "sql12614073";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {

  die("Connection failed: " . $conn->connect_error);
}


?>