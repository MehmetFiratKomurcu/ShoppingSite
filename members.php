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
</head>
<style >
  .a2{
    background-color: blue !important;
  }
  .MemberContainer{
    background-color: #077a37;
    width: 1000px;
    min-height: 500px;
    height: auto;
    margin-left: 250px;
    margin-top: -295px;
  }
  .dataInput{
    margin-left: 10px;
    margin-top: 15px;
    width: 300px;
    height: 35px;
    background-color: #193826;
    color: #85f28d;
  }
  .btn{
    margin-left: 15px;
    height: 40px;
    margin-top: 15px;
    background-color: #1a4f1e;
    padding:10px;
    color: #85f28d;
    box-sizing: border-box;
  }
  .inputlabel{
    color: #85f28d;
    box-sizing: border-box;
    margin:20px;
  }
</style>
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
  echo "<a class='a2' href='#'>My Addresses</a>";
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
<div class="MemberContainer">
  <form class="inputUser" action="ismember.php" method="post">
    <input type="text" class="dataInput"name="username" placeholder="Write here the username...">
    <button class="btn">Show Infos</button><br>
    <?php
      if (isset($_SESSION['notuserfound']) && $_SESSION['notuserfound'] == 1) {
        echo "there isn't a username like you submit!";
      }
     ?>
  </form>
  <?php
  echo "<div id = 'secretForm'>";
    if (isset($_SESSION['userfirstname'])) {
      echo "<form action = 'updatedata.php' method = 'post'>";
      echo "<label style='margin-left:15px;'class = 'inputlabel'><b>Firstname : </b></label>
      <input name = 'ufirstname' class = 'dataInput' value =".$_SESSION['userfirstname']."><br>";
      echo "<label style='margin-left:17px;'class = 'inputlabel'><b>Lastname : </b></label>
      <input name = 'ulastname' class = 'dataInput' value =".$_SESSION['userlastname']."><br>";
      echo "<label class = 'inputlabel'><b>email : </b></label>
      <input name = 'uemail' style='margin-left:36px;'class = 'dataInput' value =".$_SESSION['useremail']."><br>";
      echo "<label class = 'inputlabel'><b>isadmin :</b></label>
      <input name = 'uisadmin' style='margin-left:20px;'
       class = 'dataInput' value =".$_SESSION['userisadmin']."><br>";
      echo "<label style='margin-left:23px;' class = 'inputlabel'><b>isbanned : </b></label>
      <input name = 'uisbanned' class = 'dataInput' value =".$_SESSION['userisbanned']."><br>";
      echo "<button class = 'btn'>Edit</button>";
      echo "</form>";
    }
  echo "</div>";
   ?>
</div>
</body>
</html>
