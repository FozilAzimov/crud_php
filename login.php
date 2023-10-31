<?php
session_start();
$con =mysqli_connect("localhost","root","root","crud_project_login") or die("Xatolik Bazadan.");
if(!empty($_POST['btn'])){
  $login = $_POST['login'];
  $password = $_POST['password'];
  $query = "Select * from login where login='$login' and password='$password'";
  $result = mysqli_query($con, $query);
  $count = mysqli_num_rows($result);
  if($count>0){
    header("location:admin.php");
  }
  else echo "Login yoki Password xato, Iltimos qayta urinib ko'ring.";
  $_SESSION["login"] = $login;
  $_SESSION["password"] = $password;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
</head>

<body>
  <h1>Login Page</h1>

  <form method="post">
    <label for="log">Login: </label>
    <input type="text" name="login" id="log">
    <label for="pas">Password: </label>
    <input type="password" name="password" id="pas">
    <input type="submit" value="Kirish" name="btn">
  </form>
</body>

</html>