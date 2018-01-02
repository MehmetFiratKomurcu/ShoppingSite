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
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<style>
  .dc-container{
    width: 1090px;
    height: 1000px;
    background-color: black;
    margin-left: 230px;
    margin-top: -280px;
  }
  #first-column{
    width: 750px;
    height: 1000px;
    background-color: #0b4f0c;
    float:left;
    overflow: hidden;
  }
  #second-column{
    background-color: #13f247;
    width:325px;
    height:1000px;
    float:right;
  }
  #listmain{
    width:148px;
    height:248px;
    float:left;
    color:white;
    border:1px solid orange;
  }
  #listmain:hover{
    background-color:#f4cb42;
  }
  .first-crow{
    width: 100%;
    height: 460px;;
    box-sizing: border-box;
    background-color: pink;
  }
  .photo_css{
    width: 360px;
    height: 460px;
    background-color: red;
    box-sizing: border-box;
  }
  .button {
  border-radius: 4px;
  background-color: #f4511e;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 20px;
  padding: 20px;
  width: 170px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

  .button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
  }

  .button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
  }

  .button:hover span {
  padding-right: 25px;
  }

  .button:hover span:after {
  opacity: 1;
  right: 0;
  }
  .fcsecond-row{
  width: 100%;
  height: 100%;
  background-color: #bfe03c;
  }
  #datadiv{
    height: 100%;
    width: 100%;
  }
  #title{
    border-bottom: 2px solid #5af7fc;
    color: #5af7fc;
    box-sizing: border-box;
    height: 85px;
    width: 100%;
  }
  #subtitle{
    color: #5af7fc;
    box-sizing: border-box;
    width: 100%;
  }
  #addfavourite{
    height:24px;
    color: #ff1e29;
  }
  #addbtn{
    float: right;
    margin-top: 20px;
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
        echo "<li><a href='myprofile.php'> My Profile </a></li>";
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
  <a href="index.php">Home Page</a>
    <div class="dropdown">
      <a href="#">Comic Books</a>
        <div class="dropdown-content">
          <a href="dccomics.php">DC Comics</a>
          <a href="marvel.php">Marvel Comics</a>
          <a href="darkhorse.php">Dark Horse</a>
      </div>
    </div>
  <a href="#">Collectible</a>
  <a href="manga.php">Manga</a>
  <a href="#">Storage Materials</a>
  <a href="#">Statues</a>
  <a href="#">T-Shirts</a>
</div>
<?php
$getproduct = $_GET['id']+0;
$getdatas = "SELECT imagepath,title,subtitle,price,description,pagenum,publishdate,
            publisher FROM urunler WHERE productid='$getproduct'";
$applygetdatas = mysqli_query($conn,$getdatas) or die(mysqli_error($conn));;
$res = mysqli_fetch_assoc($applygetdatas);
 ?>
<table class="dc-container">
  <tr class="first-row">
    <td id="first-column">
      <table class="first-crow">
        <td class="photo_css"><img width="360px" height="100%"
          src=<?php echo "pics/".$res['imagepath']; ?> alt="Product Photo"></td>
        <td style="background-color:#06327a;">
              <div id="datadiv" style="color:#5af7fc;">
                  <div id="title"><?php echo "<h2>".$res['title']."</h2>"; ?><br></div>
                  <div id="subtitle"><?php echo "<h3>".$res['subtitle']."</h3>"; ?><br></div>
                  <div><?php echo "<h1>".$res['price']."</h1>"; ?><br></div>
                  <?php echo "Publisher: ".$res['publisher']; ?><br>
                  Page: <?php echo "".$res['pagenum']; ?><br>
                  Publish Date: <?php echo "".$res['publishdate']; ?><br>
                <div id="addfavourite">
                  Add Favourites <i class="material-icons">favorite</i><br>
                </div>
                  <button class="button" id="addbtn"><span>Add Card </span></button>
              </div>
        </td>
      </table>
      <div class="fcsecond-row">
          <?php echo "".$res['description']; ?>
      </div>
    </td>
    <td id="second-column"></td>
  </tr>
</table>
</body>
</html>
