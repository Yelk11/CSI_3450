<!DOCTYPE html>
<html>

<body>
    <form action="view_flight_info.php" method="post">
        <select>
            

 <?php

        include "password.php";
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);


        $con = mysqli_connect($server,$userName,$pass,$db);

        $source_city = $_POST["source"];

        $sql = "SELECT * FROM AIRPORT WHERE CITY = \"$source_city\"";
         

        $result = mysqli_query($con, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0)
        {
            $row = mysqli_fetch_assoc($result) || trigger_error("Query Failed! SQL: $sql - Error: ".mysqli_error($con), E_USER_ERROR);
            $source_airport_id = $row["AIRPORT_ID"];

            mysqli_free_result($result);

            $flight_sql = "SELECT CITY FROM AIRPORT WHERE AIRPORT_ID = (SELECT DESTINATION_AIRPORT FROM FLIGHT WHERE SOURCE_AIRPORT = $source_airport_id)";
            
            
            
            $result = mysqli_query($con, $sql);
            $resultCheck = mysqli_num_rows($result);
            
            if ($resultCheck > 0)
            {
                while($row = mysqli_fetch_assoc($result)){
                    echo "<option>" . $row["CITY"] . "</option>";
                }
            }
            else{
                echo "<h1>We have no flight coming from this Airport</h1>";
            }
            
            
                
            
        }
    ?>
            </select>

<input type="submit">
<button type="button" onclick="history.back();">Back</button>
</form>
</body>

</html>