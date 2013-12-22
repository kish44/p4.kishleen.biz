<?
/*************************************************************
* addPartyHalls2.php
*
* Computer Science 50
* Kishleen Saini
*
* Implementation to let user add party halls to website
*****************************************************************/
?>
<?
    define('INCLUDE_CHECK',true);
    // require common code
    require '../../connect.php';
        
    // Get the cached user's id
    $id = $_SESSION['id'];
    // Insert into database
    // escape name to avoid SQL injection attacks
    $name = mysql_real_escape_string ($_POST['name']);
    $address = mysql_real_escape_string ($_POST['address']);
    $city = mysql_real_escape_string ($_POST['lat']);
    $state = mysql_real_escape_string ($_POST['lng']);
    $email = mysql_real_escape_string ($_POST['email']);
    $phone = mysql_real_escape_string ($_POST['phone']);
    
    
    // formulate query
    $sql = mysql_query("INSERT INTO markers (id, name, address, lat, lng, email, phone)
    VALUES('$id', '$name', '$address', '$lat', '$lng', '$email', '$phone')");
    
    
    // apologize if insert fails
    if (!$sql)
        apologize("Sorry! insert failed");
    else
    {
        echo("Congrats! Your party hall has been successfully added to our database");
        // redirect to portfolio
        //redirect("index.php");
    }
?>
