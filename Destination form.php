<!DOCTYPE html>
<html>


<body>
    <h1>Pick your flight</h1>
    <form action="view_flight_info.php" method="post">
        <select name="source">
            <?php
            
                include "password.php";
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                
                $con = mysqli_connect($server,$userName,$pass,$db);


                $sql = "SSELECT FLIGHT.FLIGHT_ID, FLIGHT.BOARDING_TIME, FOO.AIRPORT_NAME AS SOURCE, BAR.AIRPORT_NAME AS DESTINATION
                FROM FLIGHT
                LEFT JOIN AIRPORT AS FOO
                ON FLIGHT.DESTINATION_AIRPORT = FOO.AIRPORT_ID
                LEFT JOIN AIRPORT AS BAR
                ON FLIGHT.SOURCE_AIRPORT = BAR.AIRPORT_ID;";
                

                $sql = "SELECT * FROM FLIGHT;";
                $result = mysqli_query($con, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if ($resultCheck > 0)
                {
                    
                    while($row = mysqli_fetch_assoc($result)){

                        echo "<option>" . "From: " . $row["SOURCE"] . " Leaving at: " . $row["BOARDING_TIME"] . " going to " . $row["DESTINATION"] . "</option>";

                    }
                }
                $con->close();
                
            ?>
        </select>
        <input type="submit">
        <button type="button" onclick="history.back();">Back</button>
    </form>
</body>


</html>