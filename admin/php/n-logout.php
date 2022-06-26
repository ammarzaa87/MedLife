<?php
session_start();
unset($_SESSION['n_id']);
header("Location: ../index.php");
?>