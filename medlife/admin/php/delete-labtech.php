<?php
require_once 'connection.php';
$tech_id=$_GET['ltech_id'];
$query="delete from labtech where id=$tech_id";
if(mysqli_query($connection, $query))
{
header("location: ../lab-tech.php");
}
else
{
echo "deletion error";
}
?>

