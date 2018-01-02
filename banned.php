<?php
include("connection.php");
$_SESSION['username'] = "anonymous";
header("refresh:0.01;index.php?sayfa=banned.php");
echo "<script>alert('you have been banned!')</script>";
 ?>
