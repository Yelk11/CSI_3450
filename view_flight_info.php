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

$sql = "SELECT * FROM FLIGHT;";
$result = mysqli_query($con, $sql);
$resultCheck =mysqli_num_rows($result);

if ($resultCheck > 0)
{
    while ($row = mysqli_fetch_assoc($result)){
        echo $row['FLIGHT_ID'];
        echo "<br>";
    }
}

$con->close();

?>




</body>
</html>