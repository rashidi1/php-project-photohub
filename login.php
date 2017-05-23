<?php  include '../project/includes/loginadd.php'; ?>

<!DOCTYPE html>

<html>
<style>
form {
    border: 3px solid #f1f1f1;
}
/* Full-width inputs */
input[type=text], input[type=password] {
   width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;


}
button {
    background-color: #00C78A;
	color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
    
}
/* Add a hover effect for buttons */
button:hover {
    opacity: 0.8;
border: 1px dotted #000;
}


/* Center the avatar image inside this container */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

/* Avatar image */
img.avatar {
    width: 40%;
    border-radius: 50%;
}
.container {
    padding: 16px;
	background-color:#f1f1f1
}



</style>
<?php
  // If the session data is empty, show any error message and the log-in form; otherwise confirm the log-in
  
  if (empty($_SESSION['userid'])) {
    echo '<p class="error">' . $error_msg . '</p>';
?>

<body>

<h2 style="font-size:150%; margin-left:45%; ">Log into Photohub</h2>


  <form method="post" action="login.php">
  
  <!-- img_avatar1.png,  img_avatar2.png or img_avatar3.png you can try -->
  <div class="imgcontainer">
     <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
  </div>
 
<div class="container">
<label><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

<label><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" required>

<button type="submit" value="Log In" name="loging-in" style="font-size:120%;">Login</button>
  	
	
  
  </div>
  
  </form>

<?php
  }
  else {
    // Confirm the successful log-in
    echo('<p class="login">You are logged in as ' . $_SESSION['username'] . '.</p>');
  }
?>

</body>
</html>