<?php
session_start();
include 'connect.php';
if($_SESSION["login"] == "" && $_SESSION["password"]=="") header("location:login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD Project</title>
  <link rel="stylesheet" href="./admin.css">
</head>

<body>
  <div class="container">
    <a href="./kurs.php" class="display_link">Kurs qo'shish</a>
    <a href="./chiqish.php" class="display_link">Chiqish</a>
    <table class="display_table" border="1">
      <thead>
        <tr>
          <th>Id</th>
          <th>Rasmi</th>
          <th>Nomi</th>
          <th>Davomiyligi (oy).</th>
          <th>Narxi (so'm).</th>
          <th>Tahrirlash</th>
          <th>O'chirish</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "Select * from `crud`";
          $res = mysqli_query($con, $sql);
          if($res){
            while($row = mysqli_fetch_assoc($res)){
              $id = $row['id'];
              $rasmi = $row['rasmi'];
              $nomi = $row['nomi'];
              $davomiyligi = $row['davomiyligi'];
              $narxi = $row['narxi'];
          echo '<tr>
                  <th>'.$id.'</th>
                  <th><img src='."$rasmi".' width="60px"/></th>
                  <td>'.$nomi.'</td>
                  <td>'.$davomiyligi.'</td>
                  <td>'.$narxi.'</td>
                  <td style="text-align: center; width: 10%; background: rgb(96 168 255); border: 1px solid #fff;">
                    <a class="operation" href="update.php?updateid='.$id.' " style=" text-decoration: none; color: #fff;">Tahrirlash</a>
                  </td>
                  <td style="text-align: center; width: 10%; background: rgb(211, 12, 12); border: 1px solid #fff;">
                    <a class="operation" href="delete.php?deleteid='.$id.' " style=" text-decoration: none; color: #fff;">O`chirish</a>
                  </td>
                </tr>';  }  }
        ?>
      </tbody>
  </div>
</body>

</html>