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
	$data = htmlspecialchars($data, ENT_QUOTES, 'utf-8');
	return $data;
    }
    // gets encrypted password, salt and userID
    $query = $db->prepare("SELECT * FROM users WHERE(email=:email)");
    $query->bindParam(':email', $email, SQLITE3_TEXT);
    $queryIs = $query->execute();
    $fetched = $queryIs->fetchArray();
    $pass= $fetched['password'];
    $s = $fetched['salt'];
    $uid = $fetched['userID'];
    
    $encryptedpassword=sha1($s."--".$password);
    if($pass==$encryptedpassword){
	$_SESSION ["userID"]=$uid;			//initialising session
	$_SESSION["login"] = true;
 	header("Location: home.php");			//redirecting to home page
    }else{
	$error= "Username or password is invalid";
	echo $error;
	echo "<br><a href='index.php'>Back to Home</a>";
 	session_destroy();
    }
    
    $db->close();
    
?>
