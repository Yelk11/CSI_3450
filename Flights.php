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

<form action="Payment form.php" method="post">
Available Flights: <output type="" name="available_flights"><br>

<input type="submit">
</form>

<br>
<br>





</body>


</html>
