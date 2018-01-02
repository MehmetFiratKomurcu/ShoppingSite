<?php
  include("connection.php");
  $_SESSION['notuserfound'] = 0;
  $pusername = $_POST['username'];
  $pquery = "SELECT firstname,lastname,email,isadmin,isBanned
             FROM uyeler WHERE username= '$pusername'";
  $myquery = mysqli_query($conn,$pquery);
  if (mysqli_num_rows($myquery) > 0) {
    while ($data = mysqli_fetch_assoc($myquery)) {
      $_SESSION['userfirstname'] = $data['firstname'];
      $_SESSION['userlastname'] = $data['lastname'];
      $_SESSION['useremail'] = $data['email'];
      $_SESSION['userisbanned'] = $data['isBanned'];
      $_SESSION['userisadmin'] = $data['isadmin'];
      $_SESSION['userusername'] = $pusername;
    }
    header("location:members.php");
  }
  else {
    $_SESSION['notuserfound'] = 1;
    header("location:members.php");
  }
?>
