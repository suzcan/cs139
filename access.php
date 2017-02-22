<!--  IS NOT CALLED ANY WHERE BUT IS THE CODE USED FOR SESSION AUTHENTICATION -->

<?php
  inclued 'security.php';
  $flag = loggedIn();
  $flag2 = accessResources($_GET["id"]);
  
  function loggedIn() {
    if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
      return true;
    } else {
      return false;
    }
  }

  function accessResources($resources_user_id) {
    $inId = h($resources_user_id);
    $aUser = $_SESSION["userID"];
    
    $cleanID = substr($inId, 0, -3);
    
    if( $cleanID == $aUser ) {
    } else {
      header("Location: index.php");
    }    
    
  }
  

?>