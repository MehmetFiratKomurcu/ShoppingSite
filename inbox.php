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
  .sentContainer{
    width: 800px;
    height: 400px;
    box-sizing: border-box;
    background-color: #27123d;
    float: left;
    margin-left: 300px;
    margin-top: -300px;
  }
  table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
  }

  td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
  }

  tr:nth-child(odd) {
    background-color: #dddddd;
  }
  tr:nth-child(even){
    background-color: #5d5d5e;
  }
  .secondContainer{
    padding-top:20px;
    width: 800px;
    height:400px;
  }
  .secondLabel{
    color: white;
    width: auto;
    font-size: 18px;
    margin-left: 20px;
    margin-right: 39px;
  }
  .contentLabel{
    margin-right: 20px !important;
  }
  .secondInput{
    width: 406px;
  }
  .secondTextarea{
    height: 200px;
    width: 406px;
    resize: none;
    margin-top: 50px;
  }
  .FormBtn{
    width: 100px;
    height: 40px;
    background-color: green;
    color: white;
    margin-right: 20px;
    border:1px solid red;
    border-radius: 10px;
    text-align: center;
    padding-bottom: 25px;
    float: right;
    margin-top:290px;
    font-size: 20px;
  }
  .FormBtn:hover{
    background-color: red;
  }
  .FormBtn:active{
    background-color: blue;
  }
  #msggs{
    background-color: blue !important;
  }
  #editbtn{
    position:absolute;
    margin-left:-500px;
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
    <a class="a3" id="msggs"href="#">Messages</a>
      <div class="dropdown-content">
        <a href="sent.php">Sent</a>
        <a href="#">Inbox</a>
    </div>
  </div>
  <a class="a4" href="#">Orders</a>
  <a class="a5" href="#">My Favorites</a>
  <a class="a6" href="help.php">Help</a>
  <a class="a7" href="exit.php">Exit</a>
</div>
<?php
if ($_SESSION['admin'] == 0) {
  $tempuser = $_SESSION['username'];
  $sql = "SELECT datetime,Topic,answer FROM mesajlar WHERE sender = '$tempuser' AND answer != 'NULL'";
  $result =mysqli_query($conn,$sql);
}
else if ($_SESSION['admin'] == 1) {
  $tempuser = $_SESSION['username'];
  $sql = "SELECT datetime,Topic,sender,messageContent,answer FROM mesajlar WHERE answer = 'NULL'";
  $result =mysqli_query($conn,$sql);
}
?>
<div class="sentContainer">
  <table id="tableR">
    <caption style="color:white;"><b>Messages</b></caption>
      <tr>
        <th>Topic</th>
        <th>Datetime</th>
        <?php if ($_SESSION['admin'] == 1) {
          echo "<th>Sender</th>";
        } ?>
      <tr>
        <?php
        if ($_SESSION['admin'] == 0) {
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result) ) {
              if ($row['answer']!= NULL) {
                echo "<tr><td>".$row['Topic']."</td><td>".$row['datetime'].
                "</td><td style='display:none'>".$row['answer']."</td></tr>";
              }
            }
          }
          else {
            echo "You have no messages";
          }
        }
        else if ($_SESSION['admin'] == 1) {
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result) ) {
                echo "<tr><td>".$row['Topic']."</td><td>".$row['datetime'].
                "</td><td style='display:none'>".$row['answer']."</td>
                <td>".$row['sender']."</td></tr>";
            }

          }
          else {
            echo "You have no messages";
          }
        }
         ?>
  </table>
  <div class="secondContainer" style="display:none;" id="msgContnt">
    <label class="secondLabel"><b>Topic:</b></label>
    <input type="text" class="secondInput" value="" id="inputTopic" readonly>
    <label class="secondLabel contentLabel"><b><br>Answer: </b></label>
    <textarea id="txtarea"value ="" class="secondTextarea"></textarea>
    <span id="editbtn" class="FormBtn"><br><b>Back</b></span>
  </div>
</div>
<script>
  var tbl = document.getElementById('tableR');
  var rows = tbl.rows;
  var x = document.getElementById('msgContnt');

  /*for (var i = 1; i < rows.length; i++) {
    rows[i].onclick = function(){
      tbl.style.display = "none";
      x.style.display = "block";
      return function(){
      document.getElementById('inputTopic').value = rows[i-1].cells[0].innerHTML;
    }
    }
  }*/

  function addRowHandlers() {
    var table = document.getElementById("tableR");
    var rows = table.getElementsByTagName("tr");
    for (i = 0; i < rows.length; i++) {
        var currentRow = table.rows[i];
        var createClickHandler =
            function(row)
            {
                return function() {
                                      var cell = row.getElementsByTagName("td")[0];
                                      var topic = cell.innerHTML;
                                      var text=row.getElementsByTagName("td")[2].innerHTML;
                                      tbl.style.display = "none";
                                      x.style.display = "block";
                                      document.getElementById('inputTopic').value = topic;
                                      document.getElementById('txtarea').value = text;
                                 };
            };
        currentRow.onclick = createClickHandler(currentRow);
    }
}
window.onload = addRowHandlers();

document.getElementById('editbtn').onclick = function(){
  var tble = document.getElementById('tableR');
  var x2 = document.getElementById('msgContnt');
  tble.style.display = "table";
  x2.style.display = "none";
}
</script>
</body>
</html>
