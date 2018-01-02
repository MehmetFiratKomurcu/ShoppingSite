<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "alisveris";
session_start();
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!isset($_SESSION['username']) || $_SESSION['username']=="anonymous") {
  $_SESSION['login'] = 0;
  $_SESSION['username']="anonymous";
}else{
  $sqll="SELECT isBanned FROM uyeler where username='$_SESSION[username]'";
  $ssqll = mysqli_query($conn,$sqll);
  while ($lastresult = mysqli_fetch_assoc($ssqll)) {
    if($lastresult['isBanned'] == 1){
      $sayfa=$_GET['sayfa'];
      if($sayfa != 'banned.php'){
        header("location:banned.php");
      }
    }
  }
}
if (!$conn) {
    echo "can't connect to database!";
}
?>
