<?php

include 'password.php'
/*
make a 'password.php' file and copy this text (replacing with correct info)
<?php
$server = "localhost";
$userName = "username";
$pass = "password";
$db = "username";
?>
*/

//create connection
$con=mysqli_connect($server,$userName,$pass,$db);

// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//example insert statement to add a new mascot
mysqli_query($con,"INSERT INTO tbl_ouMascots(name, YearCreated)
VALUES (’Grizz’, 1998)");
//example SELECT stament to show the results of the mascots table
$result = mysqli_query($con,"SELECT * FROM ’tbl_ouMascots’ WHERE 1 LIMIT 0, 30; ");
While($row = mysqli_fetch_array($result))
{
echo $row[’name’] . " " . $row[’YearCreated’];
echo "<br>";
}
mysqli_close($con);

?>