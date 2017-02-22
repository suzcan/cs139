<?php
    session_start();
    $db = new SQLite3('todo.db');
 
    $stmt = $db->prepare("INSERT INTO listItems VALUES(:numeration, :content,'0', :listID, :catID, :userID)");
    $stmt->bindParam(':numeration', $curNumeration, SQLITE3_INTEGER);
    $stmt->bindParam(':content', $newItem, SQLITE3_TEXT);
    $stmt->bindParam(':listID', $curListID, SQLITE3_INTEGER);
    $stmt->bindParam(':catID', $curCatID, SQLITE3_INTEGER);
    $stmt->bindParam(':userID', $curUser, SQLITE3_TEXT);
    
    $curUser = $_SESSION["userID"];

    $curCatID = $_POST['curCatID'];
 
    $newItem=$_POST['newItem'];

    $curListID=($_POST['curListID']);

    $curNumeration=($_POST['curNumeration'] + 1);
   
    $stmt->execute();
 
    $_POST = array();

    $db->close();

    header("Location: list1.php?id=" .$curUser . $curCatID . $curListID ."");

?>