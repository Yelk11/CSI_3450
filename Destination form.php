<!DOCTYPE html>
<html>


<body>
    <h1>Pick your flight</h1>
    <form action="test_out.php" method="post">
        <select name="flight_id">
            <?php
            
                include "password.php";
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                
                $con = mysqli_connect($server,$userName,$pass,$db);


                $sql = "SELECT FLIGHT.FLIGHT_ID, FLIGHT.BOARDING_TIME, FOO.AIRPORT_NAME AS SOURCE, BAR.AIRPORT_NAME AS DESTINATION
                FROM FLIGHT
                JOIN AIRPORT AS FOO
                ON FLIGHT.DESTINATION_AIRPORT = FOO.AIRPORT_ID
                JOIN AIRPORT AS BAR
                ON FLIGHT.SOURCE_AIRPORT = BAR.AIRPORT_ID;";
                

                
                $result = mysqli_query($con, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if ($resultCheck > 0)
                {
                    
                    while($row = mysqli_fetch_assoc($result)){

                        echo "<option value=\"123\">" . "From: " . $row["SOURCE"] . " Leaving at: " . $row["BOARDING_TIME"] . " going to " . $row["DESTINATION"] . "</option>";

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