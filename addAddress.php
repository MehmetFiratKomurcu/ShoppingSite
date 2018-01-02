<!DOCTYPE html>
<!DOCTYPE html>
<html>
  <head>
    <?php
    include("connection.php");
     ?>
  </head>
  <body>
    <?php
      $pfirstname = $_POST['firstname'];
      $plastname = $_POST['lastname'];
      $paddressname = $_POST['addressname'];
      $pcountry = $_POST['country'];
      $pcity = $_POST['city'];
      $ptown = $_POST['town'];
      $paddress = $_POST['address'];
      $ppostcode = $_POST['postcode'];
      $pphonenumber = $_POST['phonenumber'];
      $username = $_SESSION['username'];
      $sql = "INSERT INTO adresler (firstname,lastname,addressname,country,city,
      town,address,postcode,phonenumber,username) VALUES ('$pfirstname','$plastname',
      '$paddressname','$pcountry','$pcity','$ptown','$paddress','$ppostcode',
      '$pphonenumber','$username')";
      if (mysqli_query($conn,$sql)) {
        echo "<script>alert('your adress has been added')</script>";
      }
      else {
        echo "<script>alert('your adress has been not added')</script>".mysqli_error($conn);
      }
      echo "<meta http-equiv='refresh' content='5;url=address.php'>";
     ?>
  </body>
</html>
