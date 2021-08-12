<!DOCTYPE html>
<html>
<body>

<?php

include "password.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//create connection
$con = mysqli_connect($server,$userName,$pass,$db);
$flight_id = $_POST["flight_id"];
$flight_sql = "SELECT * FROM FLIGHT WHERE FLIGHT_ID = $flight_id;";

$result = mysqli_query($con, $flight_sql);
$resultCheck =mysqli_num_rows($result);

if ($resultCheck > 0)
{
    $row = mysqli_fetch_assoc($result);
    echo "Your Flight Id: " . $row['FLIGHT_ID'] . "<br>";
    echo "Departure time is: " . $row['DEPARTURE_TIME'] . "<br>";
    echo "Boarding time is: " . $row['BOARDING_TIME'] . "<br>";
    echo "Duration of flight is: " . $row['DURATION'] . "Hours<br>";

    $plane_id = $row['PLANE_ID'];
    $source_airport = $row['SOURCE_AIRPORT'];
    $destination_airport = $row['DESTINATION_AIRPORT'];
}

$plane_sql = "SELECT * FROM PLANE WHERE PLANE_ID = $plane_id";
$source_sql = "SELECT * FROM AIRPORT WHERE AIRPORT_ID = $source_airport";
$destination_sql = "SELECT * FROM AIRPORT WHERE AIRPORT_ID = $destination_airport";

mysqli_free_result($result);

$result = mysqli_query($con, $plane_sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0)
{
    $row = mysqli_fetch_assoc($result);
    echo "Your plane is a: " . $row['PLANE_NAME'] . "<br>";
}

mysqli_free_result($result);

$result = mysqli_query($con, $source_sql);
$resultCheck = mysqli_num_rows($result);

if ($resultCheck > 0)
{
    $row = mysqli_fetch_assoc($result);
    echo "Your source Airport is: " . $row['AIRPORT_NAME'] . "<br>";
}

mysqli_free_result($result);

$result = mysqli_query($con, $destination_sql);
$resultCheck =mysqli_num_rows($result);

if ($resultCheck > 0)
{
    $row = mysqli_fetch_assoc($result);
    echo "Your destination Airport is: " . $row['AIRPORT_NAME'] . "<br>";
}


$con->close();

?>

</form>

<button type="button"><a href="index.php">Go to Home Page</a></button>



</body>
</html>