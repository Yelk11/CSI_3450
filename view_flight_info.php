<html>
<body>



<?php
/*

CREATE TABLE IF NOT EXISTS FLIGHT (
    FLIGHT_ID           INTEGER NOT NULL,
    PLANE_ID            INTEGER NOT NULL,
    DEPARTURE_TIME      TIME,
    DESTINATION_AIRPORT INTEGER NOT NULL,
    BOARDING_TIME       TIME,
    SOURCE_AIRPORT      INTEGER NOT NULL,
    DURATION            TIME,


    PRIMARY KEY (FLIGHT_ID),
    FOREIGN KEY (PLANE_ID) REFERENCES PLANE(PLANE_ID),
    FOREIGN KEY (SOURCE_AIRPORT) REFERENCES AIRPORT(AIRPORT_ID),
    FOREIGN KEY (DESTINATION_AIRPORT) REFERENCES AIRPORT(AIRPORT_ID)
);

*/
include "password.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


//create connection
$con = mysqli_connect($server,$userName,$pass,$db);
$flight_id = $_POST["flight_id"];
$flight_sql = "SELECT * FROM FLIGHT WHERE FLIGHT_ID = $flight_id;";

$result = mysqli_query($con, $sql);
$resultCheck =mysqli_num_rows($result);

if ($resultCheck > 0)
{
    $row = mysqli_fetch_assoc($result);
    echo "Your Flight Id: ". $row['FLIGHT_ID']. "<br>";
    
    echo "Departure time is: " . $row['DEPARTURE_TIME']. "<br>";

    echo $row['BOARDING_TIME'];

    echo $row['DURATION'];

    $plane_id = $row['PLANE_ID'];
    $destination_airport = $row['DESTINATION_AIRPORT'];
    $source_airport = $row['SOURCE_AIRPORT'];
}

$plane_sql = "SELECT * FROM PLANE WHERE PLANE_ID = $plane_id";

mysqli_result($result);
$result = mysqli_query($con, $sql);
$resultCheck =mysqli_num_rows($result);

if ($resultCheck > 0)
{
    $row = mysqli_fetch_assoc($result);
    
}





echo "Your Plane ;"
$con->close();

?>

</body>
</html>