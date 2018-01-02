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
  .a2{
    background-color: blue !important;
  }
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
  .tablediv div{display: table;}
  .tablediv p{display: table-row;}
  .tablediv label{display: table-cell;text-align: center;}
  .tablediv input{display: table-cell;}
  /* The Modal (background) */
  .modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
  .modal-content {
    background-color: #0a58d6;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
  }

/* The Close Button */
  .close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
  }

  .close:hover,
  .close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
  }
  .addressform form{display: table;}
  .addressform p{display: table-row;}
  .addressform label{display: table-cell;text-align: center;}
  .addressform input{display: table-cell;}
  </style>
</head>
<body>
  <div class="WrapperUp">
    <a href="index.php">
  <img src="pics/superheroes.jpg" alt="Superheroes" id="logo"/></a>
  <form class="SearchForm" action="">
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
<?php
  $tempuser = $_SESSION['username'];
  $sql = "SELECT firstname,lastname,country,city,address,id,addressname,town,
   postcode,phonenumber FROM adresler WHERE username = '$tempuser'";
  $result = mysqli_query($conn,$sql);
?>
<div class="sentContainer">
  <table id="tableR">
    <caption style="color:white;"><b>Messages</b></caption>
      <tr>
        <th>Adress Name</th>
        <th>City</th>
      <tr>
        <?php
        if ($_SESSION['admin'] == 0) {
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result) ) {
              if ($row['address']!= NULL) {
                echo "<tr><td>".$row['addressname']."</td><td>".$row['city'].
                "</td><td style='display:none'>".$row['address']."</td>
                <td style='display:none'>".$row['firstname']."</td>
                <td style='display:none'>".$row['lastname']."</td>
                <td style='display:none'>".$row['country']."</td>
                <td style='display:none'>".$row['town']."</td>
                <td style='display:none'>".$row['postcode']."</td>
                <td style='display:none'>".$row['phonenumber']."</td>
                </tr>";
              }
            }
          }
          else {
            echo "You have no address";
          }
        }
        ?>
      </table>
      <button id="myBtn" style="float:right;">+Add Address</button>

      <div id="myModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content">
          <span class="close">&times;</span>
          <form class="addressform" action="addAddress.php" method="post">
            <p>
              <label for="firstname">Firstname:</label>
              <input type="text" name="firstname" value="" placeholder="type your firstname.." required>
            </p>
            <p>
              <label for="lastname">Lastname:</label>
              <input type="text" name="lastname" value="" placeholder="type your lastname.." required>
            </p>
              <p>
                <label for="addressname">Addressname:</label>
                <input type="text" name="addressname" value="" placeholder="type your addressname..">
              </p>
              <p>
              <label for="country">Country:</label>
              <input type="text" name="country" value="" placeholder="type your country.." required>
            </p>
            <p>
              <label for="city">City:</label>
              <input type="text" name="city" value="" placeholder="type your city.." required>
            </p>
            <p>
              <label for="town">Town:</label>
              <input type="text" name="town" value="" placeholder="type your town.." required>
            </p>
            <p>
              <label for="address">Address:</label>
              <input type="text" name="address" value="" placeholder="type your address.." required>
            </p>
            <p>
              <label for="postcode">Postcode:</label>
              <input type="text" name="postcode" value="" placeholder="type your postcode.." required>
            </p>
            <p>
              <label for="phonenumber">Phone Number:</label>
              <input type="text" name="phonenumber" value="" placeholder="type your phonenumber.." required>
            </p>
            <button >Save</button>
          </form>
        </div>
      </div>

      <div class="secondContainer" style="display:none;" id="addressContnt">
        <div class="tablediv">
          <p>
        <label class="secondLabel"><b>Address Name:</b></label>
        <input type="text" class="secondInput" value="" id="inputAddname" readonly><br>
          </p><p>
        <label class="secondLabel"><b>Firstname:</b></label>
        <input type="text" class="secondInput" value="" id="inputfname" readonly><br>
        </p><p>
        <label class="secondLabel"><b>Lastname:</b></label>
        <input type="text" class="secondInput" value="" id="inputlname" readonly><br>
        </p><p>
        <label class="secondLabel"><b>Country:</b></label>
        <input type="text" class="secondInput" value="" id="inputcountry" readonly><br>
        </p><p>
        <label class="secondLabel"><b>Address:</b></label>
        <input type="text" class="secondInput" value="" id="inputaddress" readonly><br>
        </p><p>
        <label class="secondLabel"><b>Town:</b></label>
        <input type="text" class="secondInput" value="" id="inputtown" readonly><br>
        </p><p>
        <label class="secondLabel"><b>Postcode:</b></label>
        <input type="text" class="secondInput" value="" id="inputpostcode" readonly><br>
        </p><p>
        <label class="secondLabel"><b>Phone Number:</b></label>
        <input type="text" class="secondInput" value="" id="inputphone" readonly><br>
        </p>
        <span id="editbtn" class="FormBtn"><br><b>Back</b></span>
        </div>
      </div>
    </div>
    <script>
      var tbl = document.getElementById('tableR');
      var rows = tbl.rows;
      var x = document.getElementById('addressContnt');
      var hbtn = document.getElementById('myBtn');
      function addRowHandlers() {
        var table = document.getElementById("tableR");
        var rows = table.getElementsByTagName("tr");
        for (i = 0; i < rows.length; i++) {
            var currentRow = table.rows[i];
            var createClickHandler =
                function(row)
                {
                    return function() {
                                          var addressname = row.getElementsByTagName("td")[0].innerHTML;
                                          var city=row.getElementsByTagName("td")[1].innerHTML;
                                          var address = row.getElementsByTagName("td")[2].innerHTML;
                                          var firstname = row.getElementsByTagName("td")[3].innerHTML;
                                          var lastname = row.getElementsByTagName("td")[4].innerHTML;
                                          var country = row.getElementsByTagName("td")[5].innerHTML;
                                          var town = row.getElementsByTagName("td")[6].innerHTML;
                                          var postcode = row.getElementsByTagName("td")[7].innerHTML;
                                          var phonenumber = row.getElementsByTagName("td")[8].innerHTML;
                                          tbl.style.display = "none";
                                          x.style.display = "block";
                                          hbtn.style.display = "none";
                                          document.getElementById('inputAddname').value = addressname;
                                          document.getElementById('inputfname').value = firstname;
                                          document.getElementById('inputlname').value = lastname;
                                          document.getElementById('inputcountry').value = country;
                                          document.getElementById('inputaddress').value = address;
                                          document.getElementById('inputtown').value = town;
                                          document.getElementById('inputpostcode').value = postcode;
                                          document.getElementById('inputphone').value = phonenumber;
                                     };
                };
            currentRow.onclick = createClickHandler(currentRow);
        }
    }
    window.onload = addRowHandlers();

    document.getElementById('editbtn').onclick = function(){
      var tble = document.getElementById('tableR');
      var x2 = document.getElementById('addressContnt');
      tble.style.display = "table";
      x2.style.display = "none";
      hbtn.style.display = "inline-block";
    }
    </script>
    <!-- javascript for modal -->
    <script>
    // Get the modal
    var modal = document.getElementById('myModal');

// Get the button that opens the modal
  var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
  btn.onclick = function() {
      modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
      modal.style.display = "none";
    }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
      if (event.target == modal) {
          modal.style.display = "none";
        }
      }

</script>
</body>
</html>
