<?php
    session_start();					//starts session
    $db = new SQLite3('todo.db');
    // making sure variables are empty
    $email = $username = $password = "";
    //if succesfull submission of data
    if($_SERVER["REQUEST_METHOD"] = "POST") {
	$email = test_input($_POST["email"]);
	$password = test_input($_POST["Password"]);
    }
    
    function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
    }
      
    $query= "SELECT password FROM users WHERE(email='".$email."')";
    $pass=$db->querySingle($query);
    $query= "SELECT salt FROM users WHERE(email='".$email."')";
    $s= $db->querySingle($query);
    $query= "SELECT userID FROM users WHERE(email='".$email."')";
    $uid= $db->querySingle($query);
    $encryptedpassword=sha1($s."--".$password);
    if($pass==$encryptedpassword){
	$_SESSION ['login']=$uid;			//initialising session
 	header("Location: home.php");			//redirecting to home page
    }else{
	$error= "Username or password is invalid";
	echo $error;
	echo "<br><a href='index.php'>Back to Home</a>";
 	session_destroy();
    }
    
    $db->close();
    
?>
