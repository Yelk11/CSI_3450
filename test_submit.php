<html>
<body>

<?php

include "password.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = mysqli_connect($server,$userName,$pass,$db);

// used it to test incrementing Passenger ID 
    $result= mysqli_query($conn, "SELECT MAX(PASSENGER_ID) AS 'maximum' FROM PASSENGER");
    $row = mysqli_fetch_assoc($result); 
    $maximum = $row["maximum"];
    $passID = $maximum + '1';  
    print_r($passID);
    
 ?>
<form action="" method="POST">
<button type="button" onclick="history.back();">Back</button>

</form>

</body>
</html>