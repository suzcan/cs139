<!DOCTYPE html>
<html>
<?php
  session_start();
  $flag = loggedIn();
  function loggedIn() {
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
      return true;
    } else {
      return false;
    }
  }
  if (!($flag)) {
    header("Location: index.php");
  } else {
  } 
?>
    <head>
	<meta charset="UTF-8">
	<title>Settings</title>
   <link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
    </head>
    
<body>
    <?php include 'nav.php' ?>
    
    <div id='content_wrap'>
      <h1>Settings</h1>
	<form>
	    <p>Would you like to receive email notifications? <input type='checkbox' name="Notif">
	    <br>
	    <br><input type='submit' value='SAVE'>
	    </p>
	</form>
    </body>

</html>
    
