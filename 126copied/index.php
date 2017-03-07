<!DOCTYPE html>
<html>

    <head>
	<meta charset="UTF-8">
	<title>To Do Lister</title>
	<link rel="stylesheet" href="css/main.css" type="text/css" charset="utf-8">
	<script src='js/jquery-3.1.1.min.js'></script>
    </head>

<body>


    <div id='main_wrap'>
    
    <div id='main_title'>
     <h1 class='thick'>To Do Lister</h1>
    </div>
    
    <div class='main_section'>
    <h2 class='section'>What is this?</h2>
   
    <img src='logo.png' alt="logo image" width=150px height=100px>
    <br>
    <p>This is a to do list application. We help you make your deadlines and be the champion of time management.</p>
    </div>
    
    <div class='main_section'>
    <h2 class='section'>Login</h2>
    <form action='session.php' method="post">
	<p>Email<br> <input type='text' name="email" id="email">
	<br>Password <br><input type='password' name="Password" id="Password">
	<br><br><input type='submit' value="Login">
	<br><br><a href='foruser.php'>Forgot Username/password?</a>
	
	
    </form>
    <br>
    <p>Not a member? <a href="register.php">Register</a> now!</p>
    </div>
    </p>
    <div class='main_section'>
    <h2 class='section'>Who are we?</h2>
    <p>We are two CSE students.</p>
    </div>
    

    
    </div>
    
    
</body>
</html>
    
