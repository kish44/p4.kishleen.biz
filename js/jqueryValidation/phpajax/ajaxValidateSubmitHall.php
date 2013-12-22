<?php

require("../../../include/session.php");

$username="kishleensaini";
$password="f151639c";
$database="kishleensaini_partyHall";
$localhost="localhost";

// Opens a connection to a mySQL server
$connection=mysql_connect ($localhost, $username, $password);
if (!$connection) {
  die("Not connected : " . mysql_error());
}

// Set the active mySQL database
$db_selected = mysql_select_db($database, $connection);
if (!$db_selected) {
  die ("Can\'t use db : " . mysql_error());
}
	
// Get the cached user's id
    $id = $_SESSION['userid'];
	
    // Insert into database
    // escape name to avoid SQL injection attacks
    $venue = mysql_real_escape_string ($_POST['venue']);
	$parking = mysql_real_escape_string ($_POST['parking']);
	$catering = mysql_real_escape_string ($_POST['catering']);
	$music = mysql_real_escape_string ($_POST['music']);
	$capacity = mysql_real_escape_string ($_POST['capacity']);
    $address = mysql_real_escape_string ($_POST['address']);
    $lat = mysql_real_escape_string ($_POST['lat']);
    $lng = mysql_real_escape_string ($_POST['lng']);
	$url = mysql_real_escape_string ($_POST['url']);
    $email = mysql_real_escape_string ($_POST['email']);
    $phone = mysql_real_escape_string ($_POST['telephone']);
	
    
    
    // formulate query
    $sql = mysql_query("INSERT INTO markers (id, venue, address, lat, lng, phone, url, email, capacity, parking, catering, music)
    VALUES('$id', '$venue', '$address', '$lat', '$lng', '$phone', '$url', '$email', '$capacity', '$parking',  '$catering', '$music')");
	echo mysql_error();

	
    // apologize if insert fails
    if (!$sql)
	{
        echo('<h1>Sorry, our records show you already have a party hall added to our database. If you would like to add another party hall, please <a href="../../../main.php">register</a> with a new account</h1>');
	}
    else
    {
        echo('<h1>Congrats! Your party hall has been successfully added to our database</h1> Click <a href="../../../index.html">here</a> to go to home page</h1>');
    }

?>
