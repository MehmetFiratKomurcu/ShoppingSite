<!DOCTYPE html>
<meta charset="utf-8">
<?php
include("connection.php");
?>
<html>
<head>
  <title>Welcome to the Alternative Universe!</title>
  <meta name="description" content="You can come and see the world of DC,Marvel
  and a lot of other comics." />
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <style>
.sign-wrapper{
  width: 800px;
  height:305px;
  background-color: black;
  padding-left: 100px;
  margin-left: 300px;
  margin-top: -300px;
}
.label-wrapper{
  font-size: 30px;
  color: white;
  font-family: monospace;
}
.text-input{
  width: 400px;
  height: 30px
}
.text-input:focus{
  background-color: #a8a095;
}
.btnsign{
  display: block;
  height: 35px;
  width: 100px;
  font-size: 18px;
  margin-left: 450px;
}
.btnsign:active{
  color: blue !important;
  background-color: #c6d639 !important;
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
    <li><a href="#">Local Stores</a></li>
    <li><a href="signup.php">Sign Up</a></li>
    <li><a href="signin.php">Sign In</a></li>
    <li><a href="#">How to Order?</a></li>
    <li><a href="#">Shopping Cart</a></li>
  </ul>
</div>
<div class="NavBar">
  <a href="index.php">Home Page</a>
    <div class="dropdown">
      <a href="#">Comic Books</a>
        <div class="dropdown-content">
          <a href="dccomics.php">DC Comics</a>
          <a href="marvel.php">Marvel Comics</a>
          <a href="#">Dark Horse</a>
      </div>
    </div>
  <a href="#">Collectible</a>
  <a href="#">Manga</a>
  <a href="#">Storage Materials</a>
  <a href="#">Statues</a>
  <a href="#">T-Shirts</a>
</div>
<form action="issign.php" method="post">
<div class="sign-wrapper">
  <div class="label-wrapper">
    Username:<br><br>
  </div>
  <input type="text" name="username" class="text-input"required>
  <div class="label-wrapper">
    Password:<br><br>
  </div>
  <input type="password" name="password" class="text-input"required>
  <button class="btnsign">Sign In</button>
</div>

</form>
</body>
</html>
