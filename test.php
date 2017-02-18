<!DOCTYPE html>
<html>

    <head>
	<meta charset="UTF-8">
	<title>Test</title>
	<link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
    </head>
    
<body>


<body>

<h2>Modal Login Form</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button>

<div id="id01" class="modal">
  
  <form class="modal-content animate" action="action_page.php">

    <div class="container">
      <label><b>Create List</b></label>
      <input type="text" placeholder="Enter List Name" name="lname" required>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>


</body>
</html>