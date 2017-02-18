<!DOCTYPE html>
<html>

    <head>
	<meta charset="UTF-8">
	<title>Registration</title>
  <link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
    </head>
    
<body>
    
    <?php 
      // making sure variables are empty
      $email = $username = $password = $passwordConf = $notif = "";
      
      // if succesfull submission of data
      if ($_SERVER["REQUEST_METHOD"] = "POST") {
	$email = test_input($_POST["Email"]);
	$username = test_input($_POST["Username"]);
	$password = test_input($_POST["Password"]);
	$passwordConf = test_input($_POST["PasswordConf"]);
	$notif = test_input($_POST["Notif"]);
      }
      
      function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
      }
    
    ?>

    
    <div id='content_wrap'>
	<h1>Register</h1>
	<form action='index.php'>
	    <br>Email: <input type='text' name="Email">
	    <br>
	    <br>Username: <input type='text' name="Username">
	    <br>
	    <br>Password: <input type='password' name="Password">
	    <br>
	    <br>Confirm Password: <input type='password' name="PasswordConf">
	    <br>
	    <br>Would you like to receive email notifications? <input type='checkbox' name="Notif">
	    <br>
	    <br><input type='submit' value='Submit'>
	</form>
	
    </body>
</html>
