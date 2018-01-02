<meta charset="utf-8">
<?php
include("connection.php");
$ufirstname = $_POST['firstname'];
$ulastname = $_POST['lastname'];
$uemail = $_POST['email'];
$username = $_POST['username'];
$sql = "SELECT firstname,lastname,email FROM uyeler WHERE username = '$username'";
$result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
if ($ufirstname != $result["firstname"]) {
  $edit = "UPDATE uyeler SET firstname='$ufirstname' WHERE username = '$username'";
  mysqli_query($conn,$edit);
}
if ($ulastname != $result["lastname"]) {
  $edit = "UPDATE uyeler SET lastname='$ulastname' WHERE username = '$username'";
  mysqli_query($conn,$edit);
}
if ($uemail != $result["email"]) {
  $edit = "UPDATE uyeler SET email='$uemail' WHERE username = '$username'";
  mysqli_query($conn,$edit);
}
header("location:myprofile.php");
?>
