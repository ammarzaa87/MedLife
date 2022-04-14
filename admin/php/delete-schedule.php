<?php
require_once 'connection.php';
$sched_id=$_GET['sched_id'];
$query="delete from has_time where id=$sched_id";
if(mysqli_query($connection, $query))
{
header("location: ../schedule.php");
}
else
{
echo "deletion error";
}
?>

