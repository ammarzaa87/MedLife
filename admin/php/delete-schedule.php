<?php
require_once 'connection.php';

$sched_id=$_GET['sched_id'];
$sql1 = "Select * from has_time where id=$sched_id";
$stmt1 = $connection->prepare($sql1);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();
$dr_id=$row["doctor_id"];
$query="delete from has_time where id=$sched_id";
if(mysqli_query($connection, $query))
{
header("location: ../schedule.php?id=".$dr_id);
}
else
{
echo "deletion error";
}
?>

