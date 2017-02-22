<?php
      
      $db = new SQLite3('todo.db');
         
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
	$data = htmlspecialchars($data, ENT_QUOTES, 'utf-8');
	return $data;
      }

      $salt=sha1(time());
      $encrypted_password= sha1($salt."--".$password);

   
      $uid= uniqid();
      $insert = $db->prepare("INSERT INTO users VALUES('" . $uid . "','" .$salt. "','" . $encrypted_password ."', :username, :email,'" .$notif ."')");
      $insert->bindParam(':username', $username, SQLITE3_TEXT);
      $insert->bindParam(':email', $email, SQLITE3_TEXT);
      $insert->execute();
     
      $_POST = array();
      session_start();
      $_SESSION ["userID"]=$uid;
      $_SESSION["login"]=true;
      $db->close();
   
    header("Location: home.php");
?>
