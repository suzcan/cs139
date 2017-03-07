<?php
    session_start();

    if ($_POST && isset(&_POST['value'])) {
      $db = new SQLite3('todo.db');

      $curUser = $_SESSION["userID"];
      $length = strlen($curUser);

      // splits code into correct parts
      $catAlist = str_split(htmlspecialchars($_GET["ID"], ENT_QUOTES, 'utf-8'));
      $category = $catAlist[$length];
      $list = $catAlist[$length + 1];
      $item = $catAlist[$length + 2];

      $state = $_GET["state"];


      $stmt = "UPDATE listItems SET (dNotd='".$state."') WHERE (numeration='".$item."' , listID='".$list."', curID='".$category"', userID='".$curUser."')";
      $db->query($stmt);

      $db->close();
    }
?>
