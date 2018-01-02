<meta charset="utf-8">
<?php
include("connection.php");
$pusername = $_POST['username'];
$ppassword = $_POST['password'];
$query = "SELECT username,isadmin FROM uyeler WHERE username = '$pusername' and password='$ppassword'";
$resultmy = mysqli_query($conn,$query);

if (mysqli_num_rows($resultmy) > 0) {
  while ($lastresult = mysqli_fetch_assoc($resultmy)) {
    $_SESSION['username'] = "$pusername";
    $_SESSION['login'] = 1;
    $_SESSION['admin'] = $lastresult['isadmin'];
  }
  header("location:myprofile.php");
}
else {
  echo "Username or password is wrong.Please try again.";
  header("location:signin.php");
}
?>
