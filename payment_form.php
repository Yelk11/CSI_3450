<!DOCTYPE html>
<html>
<body>

<?php

include "password.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
/*
make a 'password.php' file and copy this text (replacing with correct info)
<?php
$server = "localhost";
$userName = "username";
$pass = "password";
$db = "username";
?>
*/

//create connection
$con = new mysqli($server,$userName,$pass,$db);

//Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// $result = $con->multi_query() || trigger_error("Query Failed: ".mysqli_error($con), E_USER_ERROR);

// //mysqli query
// $sql = file_get_contents("create_table.sql");
// $stmt = $con->multi_query($sql);


$con->close();

?>

<form action="test_submit.php" method="post">
Name on Card: <input type="text" name="name_on_card"><br>
Card Number: <input type="text" name="card_number"><br>
Security Code: <input type="text" name="security_code"><br> 
Billing Address: <input type="text" name="billing_address"><br>
<input type="submit">
</form>

<br>
<br>

<a href="test.php">Go to Test.php<a/>



</body>


</html>
