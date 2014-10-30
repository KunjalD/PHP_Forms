<?php 
session_start();
$fNameErr = $lNameErr = $emailErr = $passErr = $cpassErr = "";
$fname = $lname = $email = $password = $cpassword = $favteam = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$valid = true;
	$favteam = check_input($_POST['favteam']);
	$_SESSION['favteam'] = $favteam;
	$reg = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';

		if (empty($_POST["fname"])) {
			//echo "First Name is required";
   			$fNameErr = "First Name is required";
   			$valid = false;
 		} else {
   			$fname = check_input($_POST["fname"]);
   			$_SESSION['fname'] = $fname;
   			 // check if name only contains letters and whitespace
    		if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
    			//echo "inside";
     		 	$fNameErr = "Only letters and white space allowed";
     		 	$valid = false;
    		}
  		}

  		if (empty($_POST["lname"])) {
			//"Last Name is required";
   			$lNameErr = "Last Name is required";
   			$valid = false;
 		} else {
   			$lname = check_input($_POST["lname"]);
   			$_SESSION['lname'] = $lname;
   			 // check if name only contains letters and whitespace
    		if (!preg_match("/^[a-zA-Z ]*$/",$lname)) {
     		 	$lNameErr = "Only letters and white space allowed";
     		 	$valid = false;
    		}
  		}

  		if (empty($_POST["email"])) {
   			$emailErr = "Email is required";
   			$valid = false;
 		} else {
   			$email = check_input($_POST["email"]);
   			$_SESSION['email'] = $email;
   			 // check if email is in proper format
    		if (!preg_match($reg,$email)) {
     		 	$emailErr = "Invalid email.";
     		 	$valid = false;
    		}
  		}

  		if (empty($_POST["password"])) {
   			$passErr = "Password is required";
   			$valid = false;
 		} else {
   			$password = check_input($_POST["password"]);
   			$_SESSION['password'] = $password;
   			// check if password minimum 4 and maximum 25 digits only
    		if (strlen($password) < 4 or strlen($password) > 25) {
     		 	$passErr = "Your password must be from 4 to 25 charactors!<br />";
     		 	$valid = false;
    		}
  		}

  		if (empty($_POST["cpassword"])) {
   			$cpassErr = "Confirm Password is required";
   			$valid = false;
 		} else {
   			$cpassword = check_input($_POST["cpassword"]);
   			$_SESSION['cpassword'] = $cpassword;
   			// check if cpassword matches password
    		if ($password != $cpassword) {
     		 	$cpassErr = "Your entered passwords does not match!<br />";
     		 	$valid = false;
    		}
  		}
  		if($valid){
   			header('Location:SubmittedForm.php');
  		exit();
  		}
	}
	// uses php inbuilt functionalities to remove / and special characters
	function check_input($data) {
   		$data = trim($data);
   		$data = stripslashes($data);
   		$data = htmlspecialchars($data);
   		return $data;
   	}

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
	<title>Form</title>
	<h1>Registration Form</h1>
</head>
<body>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
First Name: <input align="middle" type="text" name="fname">
<span class="error">* <?php echo $fNameErr;?></span><br><br>
Last Name: <input  align="middle" type="text" name="lname">
<span class="error">* <?php echo $lNameErr;?></span><br><br>
E-mail:    <input align="middle"  type="text" name="email">
<span class="error">* <?php echo $emailErr;?></span><br><br>
Password:  <input type="password" name="password">
<span class="error">* <?php echo $passErr;?></span><br><br>
Confirm Password: <input type="password" name="cpassword">
<span class="error">* <?php echo $cpassErr;?></span><br><br>
Favorite Sports Team: <input type="text" name="favteam"><br><br>
<input type="submit" name='submit' value="Submit" class="button"/>
</form>
</body>
</html>