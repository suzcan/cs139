<!DOCTYPE html>
<html>

    <head>
	<meta charset="UTF-8">
	<title>Share</title>
    <link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
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
