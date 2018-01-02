<meta charset="utf-8">
<?php
include("connection.php");
$firstnamep = $_POST['firstname'];
$lastnamep = $_POST['lastname'];
$usernamep = $_POST['username'];
$passwordp = $_POST['password'];
$emailp = $_POST['email'];
$sql="INSERT INTO uyeler (firstname, lastname, username, password, email)
VALUES ('$firstnamep', '$lastnamep', '$usernamep', '$passwordp', '$emailp')";
if (mysqli_query($conn,$sql)) {
header("location:signin.php");
}
else {
  echo "Insert process failed!".mysqli_error($conn);
  sleep(5);
  header( "location:signup.php");
}
?>
