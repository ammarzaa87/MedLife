<?php
require_once 'connection.php';
$ap_id=$_GET['ap_id'];
$sql1="Select * from appointments WHERE id=?"; 
$stmt1 = $connection->prepare($sql1);
$stmt1->bind_param("s",$ap_id);
$stmt1->execute();
$result = $stmt1->get_result();
$row = $result->fetch_assoc();
$dr_id=$row["dr_id"];
$date=$row["date"];
$time_id=$row["time_id"];
$sql = "UPDATE has_time SET availability = 1 where timing_id='$time_id' and date='$date' and doctor_id='$dr_id'";
$stmt = $connection->prepare($sql);
$stmt->execute();
$query="delete from appointments where id=$ap_id";
if(mysqli_query($connection, $query))
{
header("location: ../appointments.php");
}
else
{
echo "deletion error";
}
?>

