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
    background-color: #2b69ce;
    float:left;
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
          <a href="#">DC Comics</a>
          <a href="marvel.php">Marvel Comics</a>
          <a href="darkhorse.php">Dark Horse</a>
      </div>
    </div>
  <a href="#">Collectible</a>
  <a href="manga.php">Manga</a>
  <a href="storagemat.php">Storage Materials</a>
  <a href="#">Statues</a>
  <a href="#">T-Shirts</a>
</div>
<table class="dc-container">
  <tr>
    <td id="first-column">
      <?php
          $listquery="SELECT productid,imagepath,title,price FROM urunler WHERE publisher = 'DC Comics'
          ORDER BY productid DESC LIMIT 20";
          $listqueryapply=mysqli_query($conn,$listquery);
          while($listapply=mysqli_fetch_array($listqueryapply)){
            echo "
              <a href='showproduct.php?id=$listapply[productid]'>
              <div id='listmain'>
                  <div><img style='width:145px;height:200px' src='pics/$listapply[imagepath]'></div>
                  <div style='text-align:center;width:145px;height:22.5px;overflow:hidden;'>$listapply[title]</div>
                  <div style='text-align:center;height:22.5px;width:145px;'>$listapply[price]</div>
              </div>
              </a>
            ";
          }

      ?>
    </td>
    <td id="second-column"></td>
  </tr>
</table>
</body>
</html>
