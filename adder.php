<!-- ADDS A NEW LIST -->
<?php
    session_start();
    $db = new SQLite3('todo.db');
    
    $stmt = $db->prepare("INSERT INTO lists VALUES(:listID, :name, :catID, :userID, '0', NULL)");
    $stmt->bindParam(':listID', $curListID, SQLITE3_INTEGER);
    $stmt->bindParam(':name', $newListName, SQLITE3_TEXT);
    $stmt->bindParam(':catID', $curCatID, SQLITE3_INTEGER);
    $stmt->bindParam(':userID', $curUser, SQLITE3_TEXT);
    
    $curUser = $_SESSION["userID"];
 
    $curCatID = $_POST['curCatID'];
    
    $newListName=$_POST['newList'];

    $curListID=($_POST['curListID'] + 1);
    
    $stmt->execute();

    $_POST = array();
    
    $db->close();
    
   header("Location: home.php");

?>
