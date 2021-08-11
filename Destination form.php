<!DOCTYPE html>
<html>

CREATE TABLE IF NOT EXISTS FLIGHT (
    FLIGHT_ID           INTEGER NOT NULL,
    PLANE_ID            INTEGER NOT NULL,
    DEPARTURE_TIME      TIME,
    DESTINATION_AIRPORT INTEGER NOT NULL,
    BOARDING_TIME       TIME,
    SOURCE_AIRPORT      INTEGER NOT NULL,
    DURATION            TIME,

);
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

                $sql = "SELECT * FROM FLIGHT;";
                //$aiport_sql = "SELECT * FROM AIRPORT;";
                //$result = mysqli_query($con, $aiport_sql);
                //$resultCheck = mysqli_num_rows($result);


                //$airport_list = mysqli_fetch_assoc($result);
                //mysqli_free_result($result);

                $result = mysqli_query($con, $ql);

                if ($resultCheck > 0)
                {
                    
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option>" . $row["BOARDING_TIME"] . "</option>";

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