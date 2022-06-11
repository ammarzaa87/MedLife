<?php
require_once 'connection.php';
$dr_id=$_GET['dr_id'];
$query="delete from doctors where id=$dr_id";
if(mysqli_query($connection, $query))
{
header("location: ../doctors.php");
}
else
{
echo "deletion error";
}
?>

