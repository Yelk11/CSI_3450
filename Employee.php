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

<form action="Employee login.php" method="post">
<input type="submit" name="Pilot" class="button" value="Pilot">
<input type="submit" name="Flight Attendant" class="button" value="Flight Attendant">
<button type="button" onclick="history.back();">Back</button>
</form>

<br>
<br>




</body>


</html>
