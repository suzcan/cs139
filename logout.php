<?php
    session_start();
    $db = new SQLite3('todo.db');
    session_destroy();
    
    header("Location: index.php");

?>