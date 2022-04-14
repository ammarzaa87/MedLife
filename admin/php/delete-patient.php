<?php
require_once 'connection.php';
$pid=$_GET['pid'];
$query="delete from patients where id=$pid";
if(mysqli_query($connection, $query))
{
header("location: ../patients.php");
}
else
{
echo "deletion error";
}
?>

