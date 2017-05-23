<?php  include '../project/includes/galleryadd.php'; ?>

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
<body style="background-color:#d3d3d3;">

	<div class="header">	
      <div class="container"> 
  	     <div class="logo">
			<h1><a href="gallery.php">Photo Hub</a></h1>
		 </div>
		 <div class="top_right">
		   <?php
 
  // Generate the navigation menu
  if (isset($_SESSION['userid'])) {
  	echo '<p style="font-size:120%;"><strong>Welcome, '. $_SESSION['username'] . '  !</strong></p>'; 
  	echo '<br>';
  
    echo '<br>';
    echo '<a style="font-size:150%;" href="logout.php">Log Out</a><br>';
	
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
	<div class="grid_1">
	
		<h3>
		
		
		
		
		</h3>
		
		
		<?php
if (isset($msg)) // this is special section for
                 // outputing message
{
?>
<p style="font-weight: bold;margin-left:50px"><?=$msg?>
<br>
<a href="<?php echo $_SERVER['PHP_SELF']; ?>">reload page</a>
<!-- I've added reloading link, because
     refreshing POST queries is not good idea -->
</p>
<?php
}
?>
<!--<h1 style="font-weight: bold;margin-left:50px">Image gallery</h1><br>-->
<h2 style="font-weight: bold;margin-left:65px">Uploaded images:</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<!-- This form is used for image deletion -->

<?php
$result = mysql_query("SELECT id, image_time, title, usernametwo FROM {$table} ORDER BY id DESC");
if (mysql_num_rows($result) == 0) // table is empty
    echo '<ul><li>No images loaded</li></ul>';
else
{
    echo '<ul style="margin-left:50px; font-size:16;padding:-20;">';
    while(list($id, $image_time, $title, $usernametwo) = mysql_fetch_row($result))
    {
        // outputing list
        echo "<br><li><input type='radio' name='del' value='{$id}'>";
        echo "<a href='$_SERVER[PHP_SELF]?show={$id}'>{$title}</a> &ndash; ";
        echo "<small>{$image_time} by <strong>{$usernametwo}</strong></small></li><br>";
    }

    echo '</ul>';

    echo '<label for="password" style="margin-left:50px">Password:</label><br>';
    echo '<input type="password" name="password" id="password" style="margin-left:50px"><br><br>';

    echo '<input type="submit" value="Delete selected"  style="margin-left:50px">.<br><br><br>';
}
?>

</form>
<h2 style="font-weight: bold;margin-left:50px">Upload new image:</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
<label for="title" style="margin-left:50px">Title:</label><br>
<input type="text" name="title" id="title" size="64" style="margin-left:50px"><br><br>

<label for="photo" style="margin-left:50px">Photo:</label><br>
<input type="file" name="photo" id="photo"  style="margin-left:50px"><br><br>

<label for="password" style="margin-left:50px">Password:</label><br>
<input type="password" name="password" id="password"  style="margin-left:50px"><br><br>

<input type="submit" value="upload"  style="margin-left:50px">
</form><br>
<br>
		
		


		
		<div class="col-md-2 col_1">
			
		<div class="clearfix"> </div>
	</div>
	<div class="grid_2"></div>
		<div class="container"> 
			<div class="col-md-3 col_2">
				
			<div class="clearfix"> </div>
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