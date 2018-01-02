<meta charset="utf-8">
<?php
include("connection.php");
$musername = $_SESSION['username'];
$mcontent = $_POST['content'];
$mtopic = $_POST['topic'];
$sql = "INSERT INTO mesajlar (sender,messageContent,Topic)
VALUES ('$musername','$mcontent','$mtopic')";
mysqli_query($conn,$sql);
header("location:myprofile.php");
?>
