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
    .photo-wrapper{
      width: 500px;
      height: 500px;
      background-color: yellow;
      box-sizing: border-box;
      border-right: 4px solid green;
      margin-left: 280px;
      margin-top: -300px;
      float:left;
    }
    .profile-data{
      width: 500px;
      height: 500px;
      box-sizing: border-box;
      background-color: black;
      float: left;
      margin-top: -300px;
    }
    .profile-data b{
      color:white;
      font-family:serif;
      font-size: 24px;
      margin-left: 10px;
    }
    .profile-data input{
      width: 200px;
      height: 30px;
      color:#a09a9a;
      background-color: black;
      border-top: 0px;
      border-right: 0px;
      border-left: 0px;
      margin-left: 10px;
    }
    .FormBtn{
      width: 100px;
      height: 40px;
      background-color: green;
      color: white;
      float: right;
      margin-right: 20px;
      border:1px solid red;
      border-radius: 10px;
      text-align: center;
      padding-top: 20px;
    }
    .FormBtn:hover{
      background-color: red;
    }
    .FormBtn:active{
      background-color: blue;
    }
    .a1{
      background-color: blue !important;
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
  <a class="a1" href="#">My Profile</a>
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
  <a class="a6" href="help.php">Help</a>
  <a class="a7" href="exit.php">Exit</a>
</div>
<?php
  $tempuser = $_SESSION['username'];
  $sql = "SELECT firstname,lastname,email FROM uyeler WHERE username = '$tempuser'";
  $result = mysqli_fetch_assoc(mysqli_query($conn,$sql));
?>
<div class="photo-wrapper">

</div>
<form class="profile-data" id="formAct" action="editProfile.php" method="post">
<b>First Name:</b><br>
<input id="MyInput1" name="firstname" type="text" value="<?php echo $result['firstname']; ?>" readonly=readonly>
<br><b>Last Name:</b><br>
<input id="MyInput2" name="lastname" type="text" value="<?php echo $result['lastname']; ?>" readonly=readonly>
<br><b>Username:</b><br>
<input name="username" type="text" value="<?php echo $tempuser; ?>" readonly=readonly>
<br><b>E-mail:</b><br>
<input id="MyInput3" name="email" type="text" value="<?php echo $result['email']; ?>" readonly=readonly><br><br>
<span id="editbtn" class="FormBtn">Edit</span>
</form>
<script>
document.getElementById('editbtn').onclick = function() {
for (var i = 1; i < 4; i++) {
    document.getElementById('MyInput'+i).removeAttribute('readonly');
  }
  var spn = document.getElementById('editbtn');
  var btn = document.createElement('button');
  btn.innerHTML = "Apply";
  btn.className = "FormBtn";
  btn.style="padding-top:10px;padding-bottom:10px;width:100px;height:60px";
  spn.parentNode.replaceChild(btn, spn);
};
</script>
</body>
</html>
