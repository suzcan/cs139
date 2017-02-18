<!DOCTYPE html>
<html>

    <head>
	<meta charset="UTF-8">
	<title>List</title>
    <link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
    </head>
    
<body>
    <?php include 'nav.php' ?>
    
    <div id='content_wrap'>
    
    
    <?php
      $db = new SQLite3('todo.db');
      
      $curUser = 1;
      
      //divide code into parts (userID, catID and listID)
      $catAlist = str_split(htmlspecialchars($_GET["id"]));
      $user = $catAlist[0];
      $category = $catAlist[1];
      $list = $catAlist[2];
      
      // queries 
      $name = "SELECT * FROM lists WHERE (userID =" .$curUser .") AND (catID =" .$category.") AND (listID = " .$list.")";
      $items = "SELECT * FROM listItems WHERE (userID =" .$curUser .") AND (catID =" .$category.") AND (listID = " .$list.")";
      $itemResults = $db->query($items);
      $nameResult = $db->query($name);
      
      // list name at top of page
      $title = $nameResult->fetchArray();
      echo "<h1>" . $title['name'] . "</h1>";
      
      //list items placed
      echo "<form> <ol>";
      while($row = $itemResults->fetchArray()) {
	echo "
	  <li>" .$row['content']. "<input type='checkbox'  name='item".$row['numeration']."'  value='".$row['numeration']."'></li>
	";
	
	$GLOBALS['lastnumeration'] = $row['numeration'];
      }
      echo "</ol></form>";
      
      $db->close();
    
      echo "<table>
	    <td><form action='adderI.php' method='post'>
	    Add List Item: <input type='text' name='newItem'>
	    </td>
	    <td> <input type='submit' name='create' value='Create'>
	    <input type='hidden' name='curCatID' id='curCatID' value='". $category . "'>
	    <input type='hidden' name='curListID' id='curListID' value='". $list . "'>
	    <input type='hidden' name='curNumeration' id='curNumeration' value='". $GLOBALS['lastnumeration'] . "'>
	    </form></td>
	    </tbody>
	    </table>"
      
    ?>
    
    

    
    
    </div>
    </body>

</html>
    
