<!DOCTYPE html>
<html>

    <head>
	<meta charset="UTF-8">
	<title>Home</title>
	<link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
    </head>
    
<body>

    <?php include 'nav.php' ?>
    
    <div id='content_wrap'>
	<h1>Welcome, <?php echo $_POST["Username"]; ?>!</h1>
	<h2>My lists<h2>
	    
   
    <?php
     $db = new SQLite3('todo.db');
      
     $curUser = 1;
     
     $cats = "SELECT * FROM listCats WHERE userID =" .$curUser;
   
     $catResults = $db->query($cats);
    
     while($row = $catResults->fetchArray()) {
      echo "<table>
	      <thead>
		<tr>
		  <th>".$row["name"] . "</th>
		 </tr>
	      </thead>
	      <tbody>";
      $lists = "SELECT * FROM lists WHERE (userID =" . $curUser . ") AND (catID =" . $row["catID"] . ")";
      $listResults = $db->query($lists);
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
      }
      echo "<td>Add List</td>
	    </tbody>
	    </table>";
	
     }
     echo "<p>Add category</p>";
     echo "<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Add Category</button>";
     $db->close();
    ?>
       

	
    </div>
 </body>

</html>