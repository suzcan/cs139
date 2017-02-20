<!DOCTYPE html>
<html>

    <head>
	<meta charset="UTF-8">
	<title>Registration</title>
  <link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
    </head>
    
    <?php include 'registrationform.php'; ?>
    
<body>

    
    <div id='content_wrap'>
	<h1>Register</h1>
	<form action='index.php' method= "post">
	    <br>Email: <input type='text' name="Email">
	    <br>
	    <br>Username: <input type='text' name="Username" id="Username">
	    <br>
	    <br>Password: <input type='password' name="Password" id="Password">
	    <br>
	    <br>Confirm Password: <input type='password' name="PasswordConf" id="PasswordConf">
	    <br>
	    <br>Would you like to receive email notifications? <input type='checkbox' name="Notif" id="Notif">
	    <br>
	    <br><input type='submit' value='Submit'>
	</form>
	
    </body>
</html>
