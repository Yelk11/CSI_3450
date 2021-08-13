<!DOCTYPE html>
<html>
<body>

<?php

include "password.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(0);

//create connection
$conn = mysqli_connect($server,$userName,$pass,$db);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}



if (($_POST["tsa_check"] == "1") && ($_POST["submit"] == "Submit"))
{
    $result= mysqli_query($conn, "SELECT MAX(PASSENGER_ID) AS 'maximum' FROM PASSENGER");
    $row = mysqli_fetch_assoc($result); 
    $maximum = $row["maximum"];
    $passID = $maximum + '1'; 
    $fname = $_POST["first_name"];
    $lname = $_POST["last_name"];
    $ffmiles = $_POST["frequent_flyer_miles"];
    $email = $_POST["email_address"];
    $phonenum = $_POST["phone_number"];
    $sql = "INSERT INTO PASSENGER (PASSENGER_ID, FIRST_NAME, LAST_NAME, FREQUENT_FLYER_NUMBER, TSA_PRECHECK, EMAIL_ADDRESS, PHONE_NUMBER) 
              VALUES ('$passID','$fname','$lname','$ffmiles','Y','$email','$phonenum')";
    mysqli_query($conn, $sql);
    
    header("Location: flight_list.php");
}

if (($_POST["tsa_check"] != "1") && ($_POST["submit"] == "Submit"))
{  
    $result= mysqli_query($conn, "SELECT MAX(PASSENGER_ID) AS 'maximum' FROM PASSENGER");
    $row = mysqli_fetch_assoc($result); 
    $maximum = $row["maximum"];
    $passID = $maximum + '1';  
    $fname = $_POST["first_name"];
    $lname = $_POST["last_name"];
    $ffmiles = $_POST["frequent_flyer_miles"];
    $email = $_POST["email_address"];
    $phonenum = $_POST["phone_number"];
    $sql = "INSERT INTO PASSENGER (PASSENGER_ID, FIRST_NAME, LAST_NAME, FREQUENT_FLYER_NUMBER, TSA_PRECHECK, EMAIL_ADDRESS, PHONE_NUMBER) 
              VALUES ('$passID','$fname','$lname','$ffmiles','N','$email','$phonenum')";
    mysqli_query($conn, $sql);
    
    header("Location: flight_list.php");
}

$conn->close();

?>
<form action="" method="post">
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
Frequent Flyer Miles: <input type="text" name="frequent_flyer_miles"><br>
TSA Precheck: <input type="checkbox" name="tsa_check" value="1"><br>
Email Address: <input type="email" name="email_address"><br>
Phone Number: <input type="tel" name="phone_number" placeholder="123-456-7890" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}"><br>

<input type="submit" name="submit" value="Submit"/>
<button type="button" onclick="history.back();">Back</button>
</form>



</body>


</html>
