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

if (isset ($_POST["tsa_precheck"]) && ($_POST["submit"]))
{
    $fname = $_POST["first_name"];
    $lname = $_POST["last_name"];
    $ffmiles = $_POST["frequent_flyer_miles"];
    $email = $_POST["email_address"];
    $phonenum = $_POST["phone_number"];
    $insert = mysqli_query($db,"INSERT INTO PASSENGER (FIRST_NAME, LAST_NAME, FREQUENT_FLYER_NUMBER, TSA_PRECHECK, EMAIL_ADDRESS, PHONE_NUMBER) VALUES ('$fname','$lname','$ffmiles','Y','$email','$phonenum')");
}

if (($_POST["submit"]))
{
    $fname = $_POST["first_name"];
    $lname = $_POST["last_name"];
    $ffmiles = $_POST["frequent_flyer_miles"];
    $email = $_POST["email_address"];
    $phonenum = $_POST["phone_number"];
    $insert = mysqli_query($db,"INSERT INTO PASSENGER (FIRST_NAME, LAST_NAME, FREQUENT_FLYER_NUMBER, TSA_PRECHECK, EMAIL_ADDRESS, PHONE_NUMBER) VALUES ('$fname','$lname','$ffmiles','N','$email','$phonenum')");
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
Frequent Flyer Miles: <input type="text" name="frequent_flyer_miles"><br>
TSA Precheck: <input type="checkbox" name="tsa_precheck"><br>
Email Address: <input type="email" name="email_address"><br>
Phone Number: <input type="tel" name="phone_number" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"><br>



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
