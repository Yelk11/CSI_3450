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
$con = mysqli_connect($server,$userName,$pass,$db);

if (isset ($_POST["pilot_check"]) && ($_POST["submit"]))
{
    $employeeID = $_POST["employee_id"];
    $fname = $_POST["first_name"];
    $lname = $_POST["last_name"];
    $insert = mysqli_query($db,"INSERT INTO PILOT (PILOT_ID, FIRST_NAME, LAST_NAME) VALUES ('$employeeID','$fname','$lname')");
}

if (isset ($_POST["flight_attendant_check"]) && ($_POST["submit"])) 
{    
    $employeeID = $_POST["employee_id"];
    $fname = $_POST["first_name"];
    $lname = $_POST["last_name"];
    $insert = mysqli_query($db,"INSERT INTO FLIGHT_ATTENDANT (FLIGHT_ATTENDANT_ID, FIRST_NAME, LAST_NAME) VALUES ('$employeeID','$fname','$lname')");  
}

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

<form action="Destination form.php" method="post">
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
Employee ID:  <input type="text" name="employee_id"><br>
<input type="submit"/>
<button type="button" onclick="history.back();">Back</button>
</form>

<br>
<br>




</body>


</html>
