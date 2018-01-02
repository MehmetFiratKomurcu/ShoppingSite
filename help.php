<!DOCTYPE html>
<html>
<head>
  <?php
  include("connection.php");
   ?>
  <title>Welcome to the Alternative Universe!</title>
  <meta name="description" content="You can come and see the world of DC,Marvel
  and a lot of other comics." />
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <style>
  .a6{
    background-color: blue !important;
  }
  .msgContainer{
    width: 800px;
    height: 400px;
    box-sizing: border-box;
    background-color: #27123d;
    float: left;
    margin-left: 300px;
    margin-top: -300px;
  }
  .msgLabel{
    color: #2ec1cc;
    font-size: 20px;
    font-family: monospace;
    margin-left: 15px;
  }
  .msgInput{
    width: 300px;
    height: 25px;
    background-color: #b1d8db;
    margin-left: 40px;
  }
  .msgText{
    width: 400px;
    height: 125px;
    background-color: #b1d8db;
    margin-left: 15px;
    margin-top: 50px;
    resize: none;
  }
  .msgBtn{
    display: block;
    height: 35px;
    width: 100px;
    font-size: 20px;
    margin-left: 550px;
    margin-top: 30px;
    background-color: green;
    color:white;
  }
</style>
</head>
<body>
<div class="WrapperUp">
  <a href="index.php">
<img src="pics/superheroes.jpg" alt="Superheroes" id="logo"/></a>
<form class="SearchForm">
  <input type="search" placeholder="tell us what you are looking for" class="SearchText"/>
  <button  class="SearchButton">Search</button>
</form>
<ul>
  <li><a href="#">Shopping Cart</a></li>
  <?php
  if ($_SESSION['login'] == 1) {
      echo "<li><a href='myprofile.php' style = 'background-color: #555;'> My Profile </a></li>";
  }
  else {
    echo "
    <li><a href='signup.php'>Sign Up</a></li>
    <li><a href='signin.php'>Sign In</a></li>";
    header("location:index.php");
  }
   ?>
  <li><a href="#">How to Order?</a></li>
  <li><a href="#">Local Stores</a></li>
</ul>
</div>
<div class="NavBar">
<a class="a1" href="myprofile.php">My Profile</a>
<?php
if ($_SESSION['admin'] == 1) {
echo "<div class='dropdown'>
  <a class='a2' href='#'>Admin</a>
    <div class='dropdown-content'>
      <a href='members.php'>Members</a>
      <a href='addProduct.php'>Add Product</a>
  </div>
</div>";
}
else {
echo "<a class='a2' href='address.php'>My Addresses</a>";
}
 ?>
<div class="dropdown">
  <a class="a3 " href="#">Messages</a>
    <div class="dropdown-content">
      <a href="sent.php">Sent</a>
      <a href="inbox.php">Inbox</a>
  </div>
</div>
<a class="a4" href="#">Orders</a>
<a class="a5" href="#">My Favorites</a>
<a class="a6" href="#">Help</a>
<a class="a7" href="exit.php">Exit</a>
</div>
<?php
  $tempuser = $_SESSION['username'];
  $sql = "SELECT firstname,lastname,email FROM uyeler WHERE username = '$tempuser'";
  $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
?>
<form action="message.php" method="post">
  <div class="msgContainer">
    <label class="msgLabel"> <b>*Send a message for help!</b></label>
    <br><br><br>
    <label class="msgLabel" style="float:left;"><b>Topic:</b></label>
    <input type="text" class="msgInput" name="topic" id="topic" value=""placeholder="What's the issue about?" required>
    <label class="msgLabel"><br><b>Message:</b></label>
    <textarea type="text" class="msgText" name="content" id="content" value=""
    placeholder="Tell us the problem..." required></textarea>
    <input type="submit" id="msgbtn"class="msgBtn" value="Submit">
  </div>
</form>
<script>
  document.getElementById('msgbtn').onclick = function(){
    var jstpc = document.getElementById('topic').value;
    var jsmsg = document.getElementById('content').value;
    if (jstpc != "" && jsmsg != "") {
      alert("Your message has been sent");
    }
  }
</script>
</body>
</html>
