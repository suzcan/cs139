<?php

    $db = new SQLite3('todo.db');
 
    $curUser = 1;

    $curCatID = $_POST['curCatID'];
 
     $newItem=$_POST['newItem'];

     $curListID=($_POST['curListID']);

     $curNumeration=($_POST['curNumeration'] + 1);
   
    $toInsert = "INSERT INTO listItems VALUES('". $curNumeration ."', '". $newItem ."','0', '". $curListID ."', '". $curCatID ."', '". $curUser ."')";
     
     $db->exec($toInsert);
 
    $_POST = array();

     $db->close();
     
     header("Location: list1.php?id=" .$curUser . $curCatID . $curListID ."");

?>