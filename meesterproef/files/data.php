<?php
include ('connection.php');
$sql_insert = "INSERT INTO data (player, score) VALUES ('".$_GET["player"]."', '".$_GET["score"]."')";

#Checking if connection is valid
if(mysqli_query($con,$sql_insert)) 
{
echo "Done";
mysqli_close($con);
}
else
{
echo "error is ".mysqli_error($con );
}
?>