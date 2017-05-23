<?php
  session_start();

  /* If the session data does not exist (i.e we are starting a new session), try to set the session's data with 
     the cookies that were saved when the user made his/her last login (i.e: the cookies that the client browser is sending in its HTTP GET request to this index.php script)
     This is the code that allows the app to remember the user that last logged in to the app (in the browser/computer that's issuing the HTTP GET request) and left the app without logging out 
  */
  if (!isset($_SESSION['userid'])) {
    if (isset($_COOKIE['userid']) && isset($_COOKIE['username'])) {
      $_SESSION['userid'] = $_COOKIE['userid'];
      $_SESSION['username'] = $_COOKIE['username'];
      
      
    }
  }
?>