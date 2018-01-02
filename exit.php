<?php
  include("connection.php");
  $_SESSION['username'] = "anonymous";
  header("location:index.php");
?>
