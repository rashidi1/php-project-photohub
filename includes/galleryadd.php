<?php
error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT & ~E_NOTICE);

session_start();


  
// variables are used later in the code
$userid = $_SESSION['userid'];

$username = $_COOKIE['username'];
 

$db_host = 'localhost'; // don't forget to change accordingly
$db_user = 'tt4Wvs67_jer335'; 
$db_pwd = 'PE3GXn3qJpwEvybr';

$database = 'photohub';
$table = 'ae_gallery';
// use the same name as SQL table

$password = '111';
// simple upload restriction, you can changed to whatever you wnat 
// to disallow uploading to everyone


if (!mysql_connect($db_host, $db_user, $db_pwd))
    die("Can't connect to database");

if (!mysql_select_db($database))
    die("Can't select database");

// This function makes usage of
// $_GET, $_POST, etc... variables
// completly safe in SQL queries
function sql_safe($s)
{
    if (get_magic_quotes_gpc())
        $s = stripslashes($s);

    return mysql_real_escape_string($s);
}

// If user pressed submit in one of the forms
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // cleaning title field
	 $title = trim(sql_safe($_POST['title']));

    if ($title == '') // if title is not set
        $title = '(empty title)';// use (empty title) string

    if ($_POST['password'] != $password)  // cheking passwors
        $msg = 'Error: wrong upload password';
		
    else
    {
        if (isset($_FILES['photo']))
        {
            @list(, , $imtype, ) = getimagesize($_FILES['photo']['tmp_name']);
            // Get image type.
            // We use @ to omit errors

            if ($imtype == 3) // cheking image type
                $ext="png";   // to use it later in HTTP headers
            elseif ($imtype == 2)
                $ext="jpeg";
            elseif ($imtype == 1)
                $ext="gif";
            else
                $msg = 'Error: unknown file format';

            if (!isset($msg)) // If there was no error
            {
                $data = file_get_contents($_FILES['photo']['tmp_name']);
                $data = mysql_real_escape_string($data);
                // Preparing data to be used in MySQL query

                mysql_query("INSERT INTO {$table}
                                SET ext='$ext', title='$title',
                                    data='$data', useridtwo='$userid', usernametwo='$username'");

                $msg = 'Success: image uploaded';
            }
        }
        elseif (isset($_GET['title']))      // isset(..title) needed
            $msg = 'Error: file not loaded';// to make sure we've using
                                            // upload form, not form
                                            // for deletion


        if (isset($_POST['del'])) // If used selected some photo to delete
        {                         // in 'uploaded images form';
            $id = intval($_POST['del']);
            mysql_query("DELETE FROM {$table} WHERE id=$id");
            $msg = 'Photo deleted';
        }
    }
}
elseif (isset($_GET['show']))
{
    $id = intval($_GET['show']);

    $result = mysql_query("SELECT ext, UNIX_TIMESTAMP(image_time), data
                             FROM {$table}
                            WHERE id=$id LIMIT 1");

    if (mysql_num_rows($result) == 0)
        die('no image');

    list($ext, $image_time, $data) = mysql_fetch_row($result);

    $send_304 = false;
    if (php_sapi_name() == 'apache') {
        // if our web server is apache
        // we get check HTTP
        // If-Modified-Since header
        // and do not send image
        // if there is a cached version

        $ar = apache_request_headers();
        if (isset($ar['If-Modified-Since']) && // If-Modified-Since should exists
            ($ar['If-Modified-Since'] != '') && // not empty
            (strtotime($ar['If-Modified-Since']) >= $image_time)) // and grater than
            $send_304 = true;                                     // image_time
    }


    if ($send_304)
    {
        // Sending 304 response to browser
        // "Browser, your cached version of image is OK
        // we're not sending anything new to you"
        header('Last-Modified: '.gmdate('D, d M Y H:i:s', $ts).' GMT', true, 304);

        exit(); // bye-bye
    }

    // outputing Last-Modified header
    header('Last-Modified: '.gmdate('D, d M Y H:i:s', $image_time).' GMT',
            true, 200);

    // Set expiration time +1 year
    // We do not have any photo re-uploading
    // so, browser may cache this photo for quite a long time
    header('Expires: '.gmdate('D, d M Y H:i:s',  $image_time + 86400*365).' GMT',
            true, 200);

    // outputing HTTP headers
    header('Content-Length: '.strlen($data));
    header("Content-type: image/{$ext}");

    // outputing image
    echo $data;
    exit();
}

?>