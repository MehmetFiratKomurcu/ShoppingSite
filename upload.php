<?php
  include("connection.php");
  $title = $_POST['title'];
  $subtitle = $_POST['subtitle'];
  $price = $_POST['price'];
  $description = $_POST['description'];
  $publisher = $_POST['publisher'];
  $publishdate = $_POST['publishDate'];
  $pagenum = $_POST['pageNum'];
  $usernamee = $_SESSION['username'];
  //this chapter is about file upload until the next comment
  $target_dir = "pics/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  if(!isset($_FILES['fileToUpload'])){
    echo "dosya yok";
  }
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
  }
  if ($_FILES["fileToUpload"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG  files are allowed.";
    $uploadOk = 0;
  }
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  } else {

        $newfilename = time() . '_' . rand(1000, 9999) . '.' .end(explode(".",$_FILES["fileToUpload"]["name"]));
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$newfilename );
        $uploaddatas = "INSERT INTO urunler (title,subtitle,publisher,price,pagenum,publishdate,
        description,imagepath,username) VALUES ('$title','$subtitle','$publisher','$price','$pagenum',
        '$publishdate','$description','$newfilename','$usernamee')";
        mysqli_query($conn,$uploaddatas) or die(mysqli_error($conn));
        header("refresh:0.01;addProduct.php");
        echo "<script>alert('product has been uploaded!')</script>";

  }
?>
