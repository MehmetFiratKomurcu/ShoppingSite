<?php
include("connection.php");
$ufirst = $_POST['ufirstname'];
$ulast = $_POST['ulastname'];
$uemail = $_POST['uemail'];
$uisadmin = $_POST['uisadmin'];
$uisbanned = $_POST['uisbanned'];
$uusername = $_SESSION['userusername'];
$query = "SELECT firstname,Lastname,isadmin,isBanned,email FROM uyeler WHERE username = '$uusername'";
$myquery = mysqli_query($conn,$query);
if (mysqli_num_rows($myquery) > 0) {
  while ($result = mysqli_fetch_assoc($myquery)) {
    if ($ufirst != $result['firstname']) {
      $newdata = "UPDATE uyeler SET firstname = '$ufirst'  WHERE username = '$uusername'";
      $newquery = mysqli_query($conn,$newdata);
      $_SESSION['userfirstname'] = $ufirst;
    }
    if ($ulast != $result['lastname']) {
      $newdata = "UPDATE uyeler set lastname = '$ulast'  WHERE username = '$uusername'";
      $newquery = mysqli_query($conn,$newdata);
      $_SESSION['userlastname'] = $ulast;
    }
    if ($uemail != $result['email']) {
    $newdata = "UPDATE uyeler set email = '$uemail'  WHERE username = '$uusername'";
    $newquery = mysqli_query($conn,$newdata);
    $_SESSION['useremail'] = $uemail;
    }
    if ($uisadmin != $result['isadmin']) {
      $newdata = "UPDATE uyeler set isadmin = '$uisadmin'  WHERE username = '$uusername'";
      $newquery = mysqli_query($conn,$newdata);
      $_SESSION['userisadmin'] = $uisadmin;
    }
    if ($uisbanned != $result['isBanned']) {
      $newdata = "UPDATE uyeler set isBanned = '$uisbanned'  WHERE username = '$uusername'";
      $newquery = mysqli_query($conn,$newdata);
      $_SESSION['userisbanned'] = $uisbanned;
    }
  }
  header("location:members.php");
}
 ?>
