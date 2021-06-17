<?php 
include'config.php';

$id=$_GET["id"];

$conn = mysqli_connect("localhost","root",'',"tb-pweb")
  or die("koneksi gagal");
?> 

<!DOCTYPE html>
<html lang="en">
<head>
  <style>
  .link-button{
    text-decoration: none;
    background-color: #eeeeee;
    color: black;
    padding: 2px 6px 2px 6px;
    border: 1px solid #c2c2c2;
    border-radius:2px;
  }
  </style>
    <title>Tambah Kelas</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap1.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>

<h1 style='text-align:center; background-color: black;' class="text-white">Tambah Peserta Kelas</h1>

<form action=" " method="POST">
<div class="content">
    <div class="container">
  <br>

  <div class='col-md-12'>

  </div>

    <label for="semester" class="label">Tambah Mahasiswa</label>
    <select name="mahasiswa_id" class="form-control" required>
        <option selected>-pilih-</option>

        <?php
         $sql = mysqli_query($conn, "SELECT nama FROM mahasiswa a LEFT JOIN krs b ON (b.mahasiswa_id=a.mahasiswa_id) LEFT JOIN kelas c ON (b.kelas_id=c.id) WHERE kelas_id NOT IN ('$id')") or die (mysqli_error($conn));
         while ($data = mysqli_fetch_array($sql)) 
         {
         echo '<option value="'.$data['nama'].'">'.$data['nama'].'</option>';
         }
         ?>

    <div class="form-group">
      <button type="submit" name="submit" class="btn btn-info" style='color:white;'>Tambah</button>
         
      <a class="btn btn-warning" href="lihatlistkelas.php" role="button">Kembali</a>
          
</form>
</body>
</html>

  <?php 
  $conn = mysqli_connect("localhost","root","","wkwk")
  or die("koneksi gagal");

    if (isset($_POST['submit'])) {
    $mahasiswa_id=$_POST["mahasiswa_id"];
    $kelas_id=$_POST["$id"];

    
    $sql = mysqli_query($conn, "insert into krs values ('','$id'$mahasiswa_id')")
        or die (mysqli_error($conn));

    if($sql){
      echo "<script> alert('Penambahan Data Berhasil');
      </script>";
  }
}
   ?>
  

          