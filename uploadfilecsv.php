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
    <title>Upload File CSV</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Fredericka+the+Great" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
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

<h1 style='text-align:center; background-color: #00b3b3; font-weight: bold;' class="text-white">Daftar Kehadiran Mahasiswa</h1><html>

<div class="card mb-4" style='background-color: pink;'>
    <div class="card-header" style='background-color: white;'>

<?php

include 'config.php';

if (isset($_POST['submit'])) 
	{//Script akan berjalan jika di tekan tombolsubmit..
	//Script Upload File..    

		if (is_uploaded_file($_FILES['filename']['tmp_name'])) {        
			echo "<h1>" . "File ". $_FILES['filename']['name'] ." Berhasil diUpload" . "</h1>";        
			echo "<h2>Menampilkan Hasil Upload:</h2>";        
			readfile($_FILES['filename']['tmp_name']);    
			}    

			//Import uploaded file to Database, Letakan dibawah sini..    
			$handle = fopen($_FILES['filename']['tmp_name'], "r"); //Membuka filedan membacanya 

			$data_no = 1;   
			while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {  
			$data_no++; 

                $absensi_id  = isset($data[0]) ? strval($data[0]) : '';
                $krs_id  = isset($data[1]) ? strval($data[1]) : '';
                $pertemuan_id  = isset($data[2]) ? strval($data[2]) : '';
                $jam_masuk  = isset($data[3]) ? strval($data[3]) : '';
                $jam_keluar  = isset($data[4]) ? strval($data[4]) : '';
                $durasi  = isset($data[5]) ? strval($data[5]) : '';

				$import="INSERT into absensi (`absensi_id`, `krs_id`, `pertemuan_id`, `jam_masuk`, `jam_keluar`, `durasi`)
				values ('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')"; //data array sesuaikan dengan jumlahkolom pada CSV anda mulai dari “0” bukan “1”        
				mysqli_query($import) or die(mysqli_error()); //Melakukan Import    
				}    
				fclose($handle); //Menutup CSV file 

				// prepare once outside the loop
				
				echo "<br><strong>Import data selesai.</strong>";}
				else { //Jika belum menekan tombol submit, form dibawah akan muncul.. ?>
				<!-- Form Untuk Upload File CSV-->   
				Silahkan masukan file csv yang ingin diupload<br />   
				<form enctype='multipart/form-data' action='' method='post'>    
				Cari CSV File anda:<br />        
				<input type='file' name='filename' size='100'>   
				<input type='submit' name='submit' value='Upload'></form>
				<?php 
			} 
				?>

