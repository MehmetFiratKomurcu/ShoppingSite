<!DOCTYPE html>
<html>
<head>
  <title>Welcome to the Alternative Universe!</title>
  <meta name="description" content="You can come and see the world of DC,Marvel
  and a lot of other comics." />
  <link rel="stylesheet" type="text/css" href="css/main.css">
  <style>
.sign-container{
  width: 800px;
  height: 580px;
  background-color: #c4baac;
  margin-left: 300px;
  margin-top: -350px;
}
.label-container{
  font-size: 25px;
  background-color: #aaa399;
  width: 788px;
  height: 50px;
  padding-left: 12px;
  font-family: monospace;
}
.text-class{
  width: 794px;
  height: 30px;
}
.btnclass{
  width: 100px;
  height: 50px;
  background-color: green;
  color:white;
  float:right;
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
<form action="register.php" method="post">
  <div class="sign-container">
    <div class="label-container">
      <p><b>First Name</b></p>
    </div>
  <input type="text" class="text-class" name="firstname" required>
  <div class="label-container">
    <p><b>Last Name</b></p>
  </div>
  <input type="text" class="text-class" name="lastname" required>
  <div class="label-container">
    <p><b>Username</b></p>
  </div>
  <input type="text" class="text-class" name="username" required>
  <div class="label-container">
    <p><b>Password</b></p>
  </div>
  <input type="password" class="text-class" name="password" required>
  <div class="label-container">
    <p><b>e-mail</b></p>
  </div>
  <input type="text" class="text-class" name="email" required>
  <button class="btnclass">Register</button>
</div>
</form>
</body>
</html>
