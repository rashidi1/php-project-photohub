<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php  include '../project/includes/indexadd.php'; ?>
<!DOCTYPE HTML>
<html>
<head>
<title>Photo-Hub an Photo Gallery</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Photo-Hub Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- Custom Theme files -->
<!--webfont-->
<link href='http://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script src="js/menu_jquery.js"></script>
</head>
<body>
	<div class="header">	
      <div class="container"> 
  	     <div class="logo">
			<h1><a href="index.php">Photo Hub</a></h1>
		 </div>
		 <div class="top_right">
		   <?php
 
  // Generate the navigation menu
  if (isset($_SESSION['userid'])) {
  	echo 'Hello, '. $_SESSION['username'] . '!'; 
  	echo '<br>';
  	echo 'Here is the proof that I remember you:<br>';
    echo 'You loged in ' . $_SESSION['username'] . '!';
    echo '<br><br>';
    echo '<a href="logout.php">Log Out</a><br>';
	echo '<br><a href="gallery.php">Gallery</a>';
  }
  else {
    echo "Hi!<br>Sign Up if you don't have an account.<br>Login if you already have an account.<br>";
  	echo '<a style="font-size:150%;" href="login.php">Log In</a><br>';
    echo '<a style="font-size:150%;" href="register.php">Sign Up</a>';
	
  }
?>
	     </div>
		 <div class="clearfix"></div>
		</div>
	</div>
	<div class="banner">
		<div class="container">
			<div class="span_1_of_1">
			    <h2>Photos, illustrations by Creatives<br> can be stored here from all over the world!</h2>
			
			</div>
		</div>
	</div>
	<div class="grid_3">
	  <div class="container">
	  	 <ul id="footer-links">
			<li><a href="#">Terms of Use</a></li>
			<li><a href="#">Royalty Free License</a></li>
			<li><a href="#">Extended License</a></li>
			<li><a href="#">Privacy</a></li>
			<li><a href="support.html">Support</a></li>
			<li><a href="about.html">About Us</a></li>
			<li><a href="faq.html">FAQ</a></li>
			<li><a href="#">Categories</a></li>
         </ul>
         <p>Copyright © <?php echo date("Y");?> Photohub. All Rights Reserved.Design by <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
	  </div>
	</div>
</body>
</html>		