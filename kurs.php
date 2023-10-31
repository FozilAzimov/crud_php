<?php
session_start();
include 'connect.php';
if($_SESSION["login"] == "" && $_SESSION["password"]=="") header("location:login.php");
if(isset($_POST['submit']) && isset($_FILES['file'])){
  $nomi=$_POST['nomi'];
  $davomiyligi=$_POST['davomiyligi'];
  $narxi=$_POST['narxi'];
  $img_name = $_FILES['file']['name'];
  $tmp_name = $_FILES['file']['tmp_name'];
  $file_type = $_FILES['file']['type'];
  $folder = "Images/".$img_name;
  echo $file_type;
  $file_type_array = ["image/webp", "image/jpg", "image/png", "image/jpeg", "image/svg+xml"];
  if(in_array($file_type, $file_type_array)) move_uploaded_file($tmp_name, $folder);
  $sql = "insert into `crud` (rasmi, nomi, davomiyligi, narxi)
  values('$folder', '$nomi', '$davomiyligi', '$narxi')";
  $res = mysqli_query($con, $sql);
  if($res) header('location:admin.php');
  else die(mysqli_error($con));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./kurs.css">
  <title>CRUD Project</title>
</head>

<body>

  <div class="container">
    <h1 class="title">IT Center CDUR Operation and Add!</h1>
    <form method="post" enctype="multipart/form-data">
      <div class="box">
        <label for="file">Img: </label>
        <input type="file" name="file" id="file">
      </div>
      <div class="box">
        <label for="nomi">Nomi: </label>
        <input type="text" name="nomi" id="nomi">
      </div>
      <div class="box">
        <label for="davomiyligi">Davomiyligi: </label>
        <input type="text" name="davomiyligi" id="davomiyligi">
      </div>
      <div class="box">
        <label for="narxi">Narxi: </label>
        <input type="text" name="narxi" id="narxi">
      </div>
      <div class="btn">
        <input type="submit" name="submit" value="Jo'natish" class="submit">
      </div>
    </form>
  </div>

</body>

</html>