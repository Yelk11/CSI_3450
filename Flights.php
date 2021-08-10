<!DOCTYPE html>
<html>
<body>

<?php

include "password.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//create connection
$con = new mysqli($server,$userName,$pass,$db);

//Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



$con->close();

?>

<form action="test_submit.php" method="post">
Available Flights: <input type="" name="available_flights"><br>

<input type="submit">
</form>

<br>
<br>

<a href="test.php">Go to Test.php<a/>



</body>


</html>
