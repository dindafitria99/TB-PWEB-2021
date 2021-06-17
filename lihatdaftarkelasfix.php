<?php
session_start();
//if (empty($_SESSION['nama']) or empty($_SESSION['tipe'])) {
 //    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='login.php'</script>";
 

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
    <title>Daftar Kelas</title>
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

<h1 style='text-align:center; background-color: #843df5; font-weight: bold;' class="text-white ">Daftar Kelas</h1>

<div class="card-body" style='text-align:center; background-color: white;'>
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr>
          <th style='text-align:center; background-color: #d1b6fb;' class="text-black">No</th>
          <th style='text-align:center; background-color: #d1b6fb;' class="text-black">Kode Kelas</th>
          <th style='text-align:center; background-color: #d1b6fb;' class="text-black">Kode Mata Kuliah</th>
          <th style='text-align:center; background-color: #d1b6fb;' class="text-black">Nama Mata Kuliah</th>
          <th style='text-align:center; background-color: #d1b6fb;' class="text-black" class="text-right">Tahun</th>
          <th style='text-align:center; background-color: #d1b6fb;' class="text-black" class="text-right">Semester</th>
          <th style='text-align:center; background-color: #d1b6fb;' class="text-black" class="text-right">SKS</th>
          <th style='text-align:center; background-color: #d1b6fb;' class="text-black" class="text-right">Aksi</th>
      </tr>
    </thead>
    <tbody>

<?php 
$conn = mysqli_connect("localhost","root","","tb-pweb")
or die("koneksi gagal");

$GetID = $_SESSION['nama'];

$hasil = mysqli_query($conn,"SELECT kode_kelas, kode_matkul, nama_matkul, tahun, semester, sks FROM kelas a LEFT JOIN krs b on b.kelas_id=a.kelas_id LEFT JOIN mahasiswa c ON b.mahasiswa_id=c.mahasiswa_id where c.nama='$GetID'");
$no=0;
//Menampilkan data dengan perulangan while
while ($data = mysqli_fetch_array($hasil)){
$no++;
?>
  <tr>
    <td style='text-align:center; background-color: white;'><?php echo $no; ?></td>
    <td style='text-align:center; background-color: white;'><?php echo $data['kode_kelas'] ?></td>
    <td style='text-align:center; background-color: white;'><?php echo $data['kode_matkul'] ?></td>
    <td style='text-align:center; background-color: white;'><?php echo $data['nama_matkul'] ?></td>
    <td style='text-align:center; background-color: white;'><?php echo $data['tahun'] ?></td>
    <td style='text-align:center; background-color: white;'><?php echo $data['semester'] ?></td>
    <td style='text-align:center; background-color: white;'><?php echo $data['sks'] ?></td>
    <td style='text-align:center; background-color: white;' class="text-center">
         <a href="detailkelas.php?kode_kelas=<?php echo $data['kode_kelas']; ?>"><button class="btn btn-outline-secondary">Detail</button> 
 </tr>
            <!-- bagian akhir (penutup) while -->
 <?php 
 }
 ?>
 </tbody>
</table>

