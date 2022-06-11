<?php
require_once 'connection.php';
$blog_id=$_GET['blog_id'];
$query="delete from blog where id=$blog_id";
if(mysqli_query($connection, $query))
{
header("location: ../blogs.php");
}
else
{
echo "deletion error";
}
?>

