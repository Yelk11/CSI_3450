<!DOCTYPE html>
<html>

<body>
    <h1>Pick what city you would like to leave from</h1>
    <form action="Flights.php" method="post">
        <select name="source">
            <?php
                include "password.php";
                ini_set('display_errors', 1);
                ini_set('display_startup_errors', 1);
                error_reporting(E_ALL);


                $con = mysqli_connect($server,$userName,$pass,$db);

                $sql = "SELECT * FROM AIRPORT;";
                $result = mysqli_query($con, $sql);
                $resultCheck = mysqli_num_rows($result);
                if ($resultCheck > 0)
                {
                    while($row = mysqli_fetch_assoc($result)){
                        echo "<option>" . $row["CITY"] . "</option>";
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