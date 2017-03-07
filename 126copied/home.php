<?php session_start(); ?>

<?php
  $flag = loggedIn();
  function loggedIn() {
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
      return true;
    } else {
      return false;
    }
  }
  if (!($flag)) {
    header("Location: index.php");
  } else {
  } 
?>

<!DOCTYPE html>
<html>

    <head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
	<script src='/js/jquery-3.1.1.min.js'></script>
    </head>
    
<body>

    <?php include 'nav.php' ?>
    
    <div id='content_wrap'>
	
	    
<!--  Makes sure a user sees their categories   -->
    <?php
     $db = new SQLite3('todo.db');
      
     $curUser = $_SESSION["userID"];
     
//      Select user's username
  
     $user = $db->prepare("SELECT username FROM users WHERE(userID = :userID)");
     $user->bindParam(':userID', $curUser, SQLITE3_TEXT);
     $userIs = $user->execute();
     $fetched = $userIs->fetchArray();
     echo "<h1>Welcome, ".$fetched['username']."</h1>
	<h2>My lists<h2>";
    

     
     $cats = $db->prepare("SELECT * FROM listCats WHERE(userID = :userID)");
     $cats->bindParam(':userID', $curUser, SQLITE3_TEXT);
     $catResults = $cats->execute();
        
     while($row = $catResults->fetchArray()) {
      echo "<table>
	      <thead>
		<tr>
		  <th>".$row["name"] . "</th>
		 </tr>
	      </thead>
	      <tbody>";
      // this select statement does not take user input hence it does not requiere modifying
      $lists = "SELECT * FROM lists WHERE (userID ='" . $curUser . "') AND (catID ='" . $row["catID"] . "')";
      $listResults = $db->query($lists);
      if($listResults->num_rows === 0) {
	 $GLOBALS['lastlistID'] = 0;
      } else {
	while($rrow = $listResults->fetchArray()) {
	  // prints out lists, had to add current user to avoid overlap with other users lists and catID to avoid overlap with other
	  // categories
	  echo "<tr>
		    <td>
		      <a href='list1.php?id=" .$curUser . $row['catID'] . $rrow["listID"]. "'>" .$rrow["name"] . "</a>
		    <td>
		    <td>
		      <a href='share.php?id=" . $curUser . $row['catID'] .  $rrow["listID"] . "'> Share </a>
		    </td>
		  </tr>";
		  $GLOBALS['lastlistID'] = $rrow['listID'];
		  
	}
      }
      
      echo "<td><form action='adder.php' method='post'>
	    Add List: <input type='text' name='newList'>
	    </td>
	    <td> <input type='submit' name='".$row['catID']."create' value='Create'>
	    <input type='hidden' name='curCatID' id='curCatID' value='". $row['catID'] . "'>
	    <input type='hidden' name='curListID' id='curListID' value='". $lastlistID . "'>
	    </form></td>
	    </tbody>
	    </table>";
	
     }
     
     $db->close();
    ?>
 

 <!--  ADD CATEGORY BUTTON    -->
    <div id="button_container">
    <button id="myBtn" class="button">Add Category</button>
    </div>
    <div id="addItem" class="modal">
    
    <div class="modal-content">
      <div class="modal-header">
	<span class="close">&times;</span>
	<h2>Add a Category</h2>
      </div>
      <div class="modal-body">
	<p><form action="home.php">
	Category Name <input type="text" name="newCatname">
	<input type="submit" name="submit" value="Confirm">
	</form></p>
      </div>
      <div class="modal-footer">
	<p>Reminder: If your category has no name or is longer than 25 characters, it will not be added.<p>
      </div>
    </div>
    
    
<!--  This inserts a new category    -->
    <?php
     $db = new SQLite3('todo.db');
      
     $curUser = $_SESSION["userID"];
     
     $cats = "SELECT * FROM listCats WHERE(userID = '" .$curUser. "')";;
     
     $catResults = $db->query($cats);
     while($row = $catResults->fetchArray()) {
      $lastCatID = $row['catID'];
     }
     $newCatID = $lastCatID + 1;
     
     $newCatname = $_GET['newCatname'];
     $namelength = strlen($newCatname);
     if( ($newCatname != "") AND ($namelength <= 25) ) {
	$insert = $db->prepare("INSERT INTO listCats VALUES('" . $newCatID . "', :name, '" . $curUser . "')");
	$insert->bindParam(':name', $newCatname, SQLITE3_TEXT);
	$insertion = $insert->execute();
     }
     
     $_GET = array();
     
     $db->close();
    ?>
    
    
<!--   JAVASCRIPT   -->
    <script>
      // Get the modal
      var modal = document.getElementById('addItem');

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks the button, open the modal 
      btn.onclick = function() {
	modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
	modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
      if (event.target == modal) {
	  modal.style.display = "none";
	}
      }
    </script>
	
    </div>
 </body>

</html>