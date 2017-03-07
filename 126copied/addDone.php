<?php
    session_start();

    if ($_POST && isset(&_POST['value'])) {
      $db = new SQLite3('todo.db');

      $curUser = $_SESSION["userID"];
      $length = strlen($curUser);
      $val= $_POST['Value'];
      // splits code into correct parts
      $catAlist = str_split(htmlspecialchars($val, ENT_QUOTES, 'utf-8'));
      $category = $catAlist[$length];
      $list = $catAlist[$length + 1];
      $item = $catAlist[$length + 2];
//      $state = $_POST['state'];
      $stmt="DELETE FROM listItems WHERE(userID='".$curUser."', listID='".$list."', catID='".$category."', numeration='".$item."')";
      $db->exec($stmt)
//      $stmt="INSERT INTO listItems VALUES"
      $db->close();
    }
?>
