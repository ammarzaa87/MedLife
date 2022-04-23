<?php
session_start();
unset($_SESSION['r_id']);
header("Location: ../index.php");
?>