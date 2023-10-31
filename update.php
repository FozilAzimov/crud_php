<?php
session_start();
include 'connect.php';
if($_SESSION["login"] == "" && $_SESSION["password"]=="") header("location:login.php");
$id=$_GET['updateid'];
$sql="Select * from `crud` where id=$id";
$res = mysqli_query($con, $sql);
$row=mysqli_fetch_assoc($res);
$rasmi=$row['rasmi'];
$nomi=$row['nomi'];
$davomiyligi=$row['davomiyligi'];
$narxi=$row['narxi'];
if(isset($_POST['submit'])){
  $file=$_POST['file'];
  $nomi=$_POST['nomi'];
  $davomiyligi=$_POST['davomiyligi'];
  $narxi=$_POST['narxi'];
  $sql = "update `crud` set id='$id', rasmi='Images/$file', nomi='$nomi',
  davomiyligi='$davomiyligi', narxi='$narxi' where id=$id";
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
    <h1 class="title">IT Center CDUR Operation and Update!</h1>
    <form method="post">
      <div class="box">
        <label for="file">Img: </label>
        <input type="file" name="file" id="file">
      </div>
      <div class="box">
        <label for="nomi">Nomi: </label>
        <input type="text" name="nomi" id="nomi" value=<?php echo $nomi; ?>>
      </div>
      <div class="box">
        <label for="davomiyligi">Davomiyligi: </label>
        <input type="text" name="davomiyligi" id="davomiyligi" value=<?php echo $davomiyligi; ?>>
      </div>
      <div class="box">
        <label for="narxi">Narxi: </label>
        <input type="text" name="narxi" id="narxi" value=<?php echo $narxi; ?>>
      </div>
      <div class="btn">
        <input type="submit" name="submit" value="Tahrirlash" class="submit">
      </div>
    </form>
  </div>
</body>

</html>