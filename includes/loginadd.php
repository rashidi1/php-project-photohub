<?php
  require_once('dbinfo.php');

  // Start a session
  session_start();

  // Clear the error message
  $error_msg = "";

  // If the user isn't logged in, try to log him/her in
  if (!isset($_SESSION['userid'])) 
  {
    if (isset($_POST['loging-in'])) {
      // Connect to the database
      $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

      // Grab the user-entered log-in data
      $username = mysqli_real_escape_string($dbc, trim($_POST['username']));
      $password = mysqli_real_escape_string($dbc, trim($_POST['password']));
	  // select data from table into a variable 
	  $query = "SELECT password, username, userid FROM user WHERE username = '$username'";
	  $data = mysqli_query($dbc, $query);
	  if (mysqli_num_rows($data) == 1) {
	 
	 		$row = mysqli_fetch_array($data);
			
			
			// Hashed password login function
			$password_hashed = $row['password'];
			if (password_verify($password, $password_hashed)) {
				
				echo $_SESSION['username'] = $row['username'];
					echo	$_SESSION['userid'] = $row['userid'];
          
										
		setcookie('userid', $row['userid'], time() + (60 * 60 * 24 * 30));    // expires in 30 days
          setcookie('username', $row['username'], time() + (60 * 60 * 24 * 30));  // expires in 30 days
          
		  // Sends to defined location 
          $home_url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/gallery.php';
          header('Location: ' . $home_url);
					
			} 
			else{   
				// The username or password are incorrect so set an error message
          $error_msg = '<strong>Sorry, the username/password you entered is not correct. Try again!</strong>';
			}		
	  }else {
        // The username/password weren't entered so set an error message
        $error_msg = '<strong>Sorry, you must enter your username and password to log in. Try again!</strong>';
	}
}
	  
}	  

 
?>