<?php 

$id=$_GET["id"];

$conn = mysqli_connect("localhost","root",'',"tb-pweb")
  or die("koneksi gagal");
$sql = mysqli_query($conn,"SELECT * FROM kelas WHERE id='$id'");
$hasil = mysqli_fetch_assoc($sql);

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
    <title>Edit Kelas</title>
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

<h1 style='text-align:center; background-color: #00b3b3; font-weight: bold;' class="text-white">Edit Kelas</h1>

<form action=" " method="POST">
<div class="content">
    <div class="container">
  <br>

  <div class='col-md-12'>

  </div>

    <div class="form-group">
    <label for="kode_kelas" class="label">Kode Kelas</label>
           <input class="form-control" type="text" name="kode_kelas" value="<?php echo $hasil['kode_kelas']; ?>" required>
    </div>

    <div class="form-group">
    <label for="kode_matkul" class="label">Kode Mata Kuliah</label>
           <input class="form-control" type="text" name="kode_matkul" value="<?php echo $hasil['kode_matkul']; ?>" required>
    </div>

    <div class="form-group">
    <label for="nama_matkul" class="label">Nama Mata Kuliah</label>
           <input class="form-control" type="text" name="nama_matkul" value="<?php echo $hasil['nama_matkul']; ?>" required>
    </div>

    <div class="form-group">
    <label for="tahun" class="label">Tahun Ajaran</label>
           <input class="form-control" type="text" name="tahun" value="<?php echo $hasil['tahun']; ?>" required>
    </div>

    <div class="form-group">
    <label for="semester" class="label">Semester</label>
    <select name="semester" class="form-control" required>
        <option value="<?php echo $hasil['semester']; ?>"><?php echo $hasil['semester']; ?></option>
        <option value="1">1 (Ganjil)</option>
        <option value="2">2 (Genap)</option>
    </select>

    <div class="form-group">
    <label for="sks" class="label">SKS Mata Kuliah</label>
           <input class="form-control" type="text" name="sks" value="<?php echo $hasil['sks']; ?>" required>
    </div>

    <div class="form-group">
      <button type="submit" name="Edit" class="btn btn-info" style='color:white;'>Simpan</button>
         
      <a class="btn btn-warning" href="lihatlistkelas.php" role="button">Kembali</a>
          
</form>
</body>
</html>

  <?php 


  include('config.php');
    if (isset($_POST['Edit'])) {
    $kode_kelas=$_POST["kode_kelas"];
    $kode_matkul=$_POST["kode_matkul"];
    $nama_matkul=$_POST["nama_matkul"];
    $tahun=$_POST["tahun"];
    $semester=$_POST["semester"];
    $sks=$_POST["sks"];
    
    $sql = mysqli_query($conn, "UPDATE kelas SET kode_kelas='$kode_kelas', kode_matkul='$kode_matkul', nama_matkul='$nama_matkul', tahun=$tahun, semester=$semester, sks=$sks WHERE id='$id'")
        or die (mysqli_error($conn));

    if($sql){
      echo "<script> alert('Penambahan Data Berhasil');
      document.location='lihatlistkelas.php?page=lihat';
      </script>";
  }
}
   ?>
  