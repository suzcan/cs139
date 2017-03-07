<!DOCTYPE html>
<html>

    <head>
	<meta charset="UTF-8">
	<title>Registration</title>
	<script src="js/jquery-3.1.1.min.js" type="text/javascript" charset="utf-8"></script>
	<script src="js/registration.js" type="text/javascript" charset="utf-8"></script>
	<link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">

    </head>

<body>
<a href="index.php">GO BACK TO HOMEPAGE</a>
    <div id='content_wrap'>
	<h1>Register</h1>
  <div class="error" id="submit_error"></div>
	<form action='registrationform.php' method= "post" name="regForm" id="regForm">
	    <br>Email: <input type='text' name="Email" id="Email">
      <div class="error" id="email_error"></div>
	    <br>
	    <br>Username: <input type='text' name="Username" id="Username">
	    <div class="error" id="username_error"></div>
	    <br>
	    <br>Password: <input type='password' name="Password" id="Password">
	    <div class="error" id="pass_error"></div>
	    <br>
	    <br>Confirm Password: <input type='password' name="PasswordConf" id="PasswordConf">
	    <div class="error" id="passconf_error"></div>
	    <br>
	    <br>Would you like to receive email notifications? <input type='checkbox' name="Notif" id="Notif">
	    <br>
	    <br><input type='submit' value='Submit'>

	</form>
  </div>
    </body>
</html>
