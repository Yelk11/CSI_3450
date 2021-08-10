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
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
Frequent Flyer Miles: <input type="text" name="frequent_flyer_miles"><br>
TSA Precheck: <input type="checkbox" name="tsa_precheck"><br>
Email Address: <input type="checkbox" name="tsa_precheck"><br>

<input type="submit">
</form>
PASSENGER_ID        INTEGER NOT NULL,
    FIRST_NAME          CHAR(20),
    LAST_NAME           CHAR(20),
    FREQUENT_FLYER_NUMBER   INTEGER,
    TSA_PRECHECK        CHAR(1),
    EMAIL_ADDRESS       VARCHAR(20),
    PHONE_NUMBER        VARCHAR(15),
<br>
<br>




</body>


</html>
