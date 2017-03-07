<?php 
  session_start();
  $flag = loggedIn();
  $flag2 = accessResources($_GET["id"]);
  
  function loggedIn() {
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
      return true;
    } else {
      return false;
    }
  }

  function accessResources($resources_user_id) {
    $inId = htmlspecialchars($resources_user_id, ENT_QUOTES, 'utf-8');
    $aUser = $_SESSION["userID"];
    
    $cleanID = substr($inId, 0, -3);
    
    if( $cleanID == $aUser ) {
    } else {
      header("Location: index.php");
    }    
    
  }
?>
<!DOCTYPE html>
<html>
<?php
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
	<title>Share</title>
	<link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
	<script src='/js/jquery-3.1.1.min.js'></script>
    </head>
    
<body>
    <?php include 'nav.php' ?>
  
    <div id='content_wrap'>
      <h1>Share List</h1>
	<form action='home.php'>
	<p>To:<input type='text' name="receiver">
	<br>
	<br>Would you like to send an email notification?
	<br>
	<br>Yes<input type='radio' name="yesorno"> No<input type='radio' name="yesorno">
	<br>
	<br> <input type='submit' value="Send">
	</p>  
	</form>
    </div>
    </body>

</html>
