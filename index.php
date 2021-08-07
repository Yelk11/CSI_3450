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
$con=mysqli_connect($server,$userName,$pass,$db);

//Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create tables
$sql = file_get_contents("create_table.sql");

if ( $con->multi_query($sql)){
    echo "it worked";
}

//$con->mysqli_query($con, "BULK INSERT FLIGHT FROM \"data\\PLANE.dat\"") || trigger_error("Query Failed".mysqli_error($con), E_USER_ERROR);

$test=2;
if ($test>=1) {
  trigger_error("Value must be 1 or below");
  echo "qwe here";
}

$con->close();

?>

<form action="" method="post">
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
</form>

<a href="test.php">Go to Test.php<a/>
</body>


</html>
