<!DOCTYPE html>
<html>


<body>
    <h1>Pick your flight</h1>
    <form action="view_flight_info.php" method="post">
        <select name="source">
            <?php
            echo "line 19";
                include "password.php";
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);

                
                $con = mysqli_connect($server,$userName,$pass,$db);

                echo "line 28";
                $aiport_sql = "SELECT * FROM AIRPORT;";
                $result = mysqli_query($con, $aiport_sql);
                


                $airport_list = mysqli_fetch_assoc($result);
                $aircheck = mysqli_num_rows($result);
                echo "Airport: ";
                mysqli_free_result($result);
                // break
                $sql = "SELECT * FROM FLIGHT;";
                $result = mysqli_query($con, $sql);
                $resultCheck = mysqli_num_rows($result);
                
                if ($resultCheck > 0 && $aircheck > 0)
                {
                    
                    while($row = mysqli_fetch_assoc($result)){
                        
                        echo "<option>" . "From: " . $airport_list[1] . " Leaving at: " . $row["DEPARTURE_TIME"] . " going to " . $airport_list['1'] . "Boarding: " . $row["BOARDING_TIME"] . "</option>";

                    }
                }
                $con->close();
                echo "line 51";
            ?>
        </select>
        <input type="submit">
        <button type="button" onclick="history.back();">Back</button>
    </form>
</body>


</html>