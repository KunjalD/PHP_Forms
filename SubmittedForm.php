<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
	<h1>Submitted Form</h1>
</head>
</html>

<?php 
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];
$password = $_SESSION['password'];
$cpassword = $_SESSION['cpassword'];
$favteam = $_SESSION['favteam'];

//We can echo password as well.
echo "Hello ". $fname . " " . $lname . ".<br />";
echo "Your email address is ". $email."!.<br />";
echo "Your favorite team is ". $favteam."!";
?>
