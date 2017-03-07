<div class="nav">
    <ul>
	    <li><div id='logo1'><img src="logo.png" alt="logo" height=100px width=auto></div></li>
	    <li><?php 
	    session_start();
	    $db = new SQLite3('todo.db');
	    $curUser = $_SESSION["userID"];
	    $user = $db->prepare("SELECT username FROM users WHERE(userID = :userID)");
	    $user->bindParam(':userID', $curUser, SQLITE3_TEXT);
	    $userIs = $user->execute();
	    $fetched = $userIs->fetchArray();
	    echo $fetched['username'];
	    $db->close();
	    ?></li>
	    <li><a href="home.php">Home</a></li>
	    <li><a href="settings.php">Settings</a></li>
	    <li><a href="logout.php">Logout</a></li>
    </ul>
</div>