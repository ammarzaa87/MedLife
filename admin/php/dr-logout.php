<?php
session_start();
unset($_SESSION['d_id']);
header("Location: ../index.php");
?>