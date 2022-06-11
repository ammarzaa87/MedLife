<?php
require_once 'connection.php';
$nu_id=$_GET['nu_id'];
$query="delete from nurses where id=$nu_id";
if(mysqli_query($connection, $query))
{
header("location: ../nurse.php");
}
else
{
echo "deletion error";
}
?>

