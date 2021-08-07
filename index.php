<!DOCTYPE html>
<html>
<body>

<?php

include "password.php";
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

//Check connection
if (mysqli_connect_errno())
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// Create tables
$sql = file_get_contents("create_table.sql");

$con->multi_query($sql);
$con->multi_query(file_get_contents("fill_tables.sql"));

$con->close();

?>

<form action="" method="post">
First Name: <input type="text" name="first_name"><br>
Last Name: <input type="text" name="last_name"><br>
</form>

<a href="test.php">Go to Test.php<a/>
</body>


</html>
