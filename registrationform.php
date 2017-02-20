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
	$data = htmlspecialchars($data);
	return $data;
      }

    $salt=sha1(time());
    $encrypted_password= sha1($salt."--".$password);


    $uid= uniqid();
    $insert="INSERT INTO users VALUES('" . $uid . "','" .$salt. "','" . $encrypted_password ."','" .$username ."','" . $email ."','" .$notif ."')";
    $db->exec($insert);
    $_POST = array();
    $db->close();
    header("Location: index.php");
?>
