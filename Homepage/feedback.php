<?php 
ob_start(); 
require 'config.php';

$view = $_POST['view'];
$name = $_POST['name'];
$comments = $_POST['comments'];
$email = $_POST['email'];


$query = mysqli_query($con, "INSERT INTO `poll`( `name`, `feedback`, `suggestions`) VALUES ('$name','$view','$comments')");
echo '<div>"Thank You..! Your Feedback is Valuable to Us"</div>';

?>