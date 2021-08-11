<!DOCTYPE html>
<html>
<body>

<?php

include "password.php";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

//create connection
$conn = mysqli_connect($server,$userName,$pass,$db);

if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$p_check = 'unchecked';
$fa_check = 'unchecked';

if (isset ($_POST['submit']))
{
//if (isset ($_POST['pilot_check']) && ($_POST['submit']))
//{
    $selected_radio = $_POST['check'];
    if ($selected_radio == 'pilot')
    {
        $p_check = 'checked';
        $employeeID = $_POST["employee_id"];
        $fname = $_POST["first_name"];
        $lname = $_POST["last_name"];
        $sql = "INSERT INTO PILOT (PILOT_ID, FIRST_NAME, LAST_NAME) 
                    VALUES ('$employeeID','$fname','$lname')";
        mysqli_query($conn, $sql);
        
        header("Location: Destination form.php");
    }
//}

//if (isset ($_POST["flight_attendant_check"]) && ($_POST["submit"])) 
//{ 
    else if ($selected_radio == 'fa')
    {
        $fa_check = 'checked';   
        $employeeID = $_POST["employee_id"];
        $fname = $_POST["first_name"];
        $lname = $_POST["last_name"];
        $sql = "INSERT INTO FLIGHT_ATTENDANT (FLIGHT_ATTENDANT_ID, FIRST_NAME, LAST_NAME) 
                    VALUES ('$employeeID','$fname','$lname');";
        mysqli_query($conn, $sql);   
        
        header("Location: Destination form.php");
    }
//}
}

/*//Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}*/

// $result = $con->multi_query() || trigger_error("Query Failed: ".mysqli_error($con), E_USER_ERROR);

// //mysqli query
// $sql = file_get_contents("create_table.sql");
// $stmt = $con->multi_query($sql);


$conn->close();

?>

<form action="" method="POST">
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
Employee ID:  <input type="text" name="employee_id"><br>
<input type="radio" name="check" value="pilot"<?php print $p_check; ?>>Pilot
<input type="radio" name="check" value="fa"<?php print $fa_check; ?>>Flight Attendant<br>
<input type="submit" name="submit"/>
<button type="button" onclick="history.back();">Back</button>

</form>
<!--FIRST_NAME          CHAR(20),
    LAST_NAME           CHAR(20),
    EMPLOYEE_ID         INTEGER NOT NULL,
    PILOT               CHAR(1),
    FLIGHT_ATTENDANT    CHAR(1),-->
<br>
<br>




</body>


</html>
