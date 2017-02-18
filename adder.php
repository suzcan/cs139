<?php
    $db = new SQLite3('todo.db');
      
    $curUser = 1;
 
    $curCatID = $_POST['curCatID'];
    
    $newListName=$_POST['newList'];

    $curListID=($_POST['curListID'] + 1);
  
    $toInsert = "INSERT INTO lists VALUES('". $curListID . "' , '" . $newListName . "' , '" . $curCatID . "', '" . $curUser . "', '0' , 'none')";
    
    $db->exec($toInsert);

    $_POST = array();
    
    $db->close();
    
   header("Location: home.php");

?>