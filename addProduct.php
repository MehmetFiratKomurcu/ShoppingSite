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
  .MemberContainer form{display: table;}
  .MemberContainer p{display: table-row;}
  .MemberContainer label{display: table-cell;text-align: center;}
  .MemberContainer input{display: table-cell;}
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
        <a href='#'>Add Product</a>
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
  <select id="selectClass" name="Products" onchange="myFunction(this.value,this.options[this.selectedIndex].id)">
    <option disabled selected value> -- select an option -- </option>
    <option value="Comics" id="0">Comics</option>
    <option value="Collectibles" id="1">Collectibles</option>
    <option value="Storage Materials" id="2">Storage Materials</option>
    <option value="T-shirts" id="3">T-shirts</option>
  </select>
  <form method="post" action="upload.php" enctype="multipart/form-data" id="Comics"
  style="display:none;">
    <p>
      <label class="inputlabel">Title:</label>
      <input class="dataInput" name="title"></input><br>
    </p>
    <p>
      <label class="inputlabel">Subtitle:</label>
      <input class="dataInput" name="subtitle"></input><br>
    </p>
    <p>
      <label class="inputlabel">Publisher:</label>
      <input class="dataInput" name="publisher"></input><br>
    </p>
    <p>
      <label class="inputlabel">Price:</label>
      <input class="dataInput" name="price"></input><br>
    </p>
    <p>
      <label class="inputlabel">Page number:</label>
      <input class="dataInput" name="pageNum"></input><br>
    </p>
    <p>
      <label class="inputlabel">Publish date:</label>
      <input class="dataInput" name="publishDate"></input><br>
    </p>
    <p>
      <label class="inputlabel" rows="4">Description:</label>
      <textarea class="dataInput" name="description"></textarea><br>
    </p>
    <p style="height:56px;">
      <label class="inputlabel">Image path:</label>
      <input type="file" name='fileToUpload' id='fileToUpload' style="margin:auto;">
    </p>
    <p>
      <label></label><label></label>
      <input type="submit" value="Upload" class="btn" name="submit">
    </p>
  </form>
  <form action="" method="post" style="display:none;" id="Collectibles">
    <p>
      <label class="inputlabel">Title:</label>
      <input class="dataInput" name="title"></input><br>
    </p>
    <p>
      <label class="inputlabel">Subtitle:</label>
      <input class="dataInput" name="subtitle"></input><br>
    </p>
    <p>
      <label class="inputlabel">Size:</label>
      <input class="dataInput" name="size"></input><br>
    </p>
    <p>
      <label class="inputlabel">Price:</label>
      <input class="dataInput" name="price"></input><br>
    </p>
    <p>
      <label class="inputlabel">Publisher:</label>
      <input class="dataInput" name="publisher"></input><br>
    </p>
    <p>
      <label class="inputlabel" rows="4">Description:</label>
      <textarea class="dataInput" name="description"></textarea><br>
    </p>
    <p style="height:56px;">
      <label class="inputlabel">Image path:</label>
      <input type="file" name='fileToUpload' id='fileToUpload' style="margin:auto;">
    </p>
    <p>
      <label></label><label></label>
      <input type="submit" value="Upload" class="btn" name="submit">
    </p>
  </form>
</div>
<script type="text/javascript">
  function myFunction(value,id){
    if (value == "Comics") {
      alert(value+" "+id);
      document.getElementById("Comics").style.display = "block";
    }
    var sc = document.getElementById('selectClass');
    //document.getElementById(value).style.display:block;
  };
</script>
</body>
</html>
