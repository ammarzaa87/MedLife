<?php
require_once 'connection.php';
$tech_id=$_GET['rtech_id'];
$query="delete from radiotech where id=$tech_id";
if(mysqli_query($connection, $query))
{
header("location: ../radio-tech.php");
}
else
{
echo "deletion error";
}
?>

