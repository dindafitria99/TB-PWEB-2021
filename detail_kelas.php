<?php 

include "header.php";


?>
<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Halaman Mahasiswa</title>
   
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

<body>
<div class="container-fluid">
      
      
<div class="container"></div>
<h1 style='text-align:center; background-color: #00b3b3; font-weight: bold;' class="text-white ">Daftar Kelas</h1>

&nbsp;<a class="btn btn-info" href="index.php" 

role="button">Kembali</a>

    <?php
        include_once("config.php");
		
		if(isset($_GET['id'])){
			$id = $_GET['id'];
		}
		else{
			$id = "id not set in GET Method";
		}
		
		if(isset($_GET['kelas_id'])){
			$kelas_id = $_GET['kelas_id'];
		}
        else{
			$kelas_id = "kelas_id not set in GET Method";
		}
		
		if(isset($_GET['krs_id'])){
			$krs_id = $_GET['krs_id'];
		}
		else{
			$krs_id = "krs_id not set in GET Method";
		}
		
        $result = mysqli_query($mysqli,"SELECT * from kelas where id=$id");
        $result1 = mysqli_query($mysqli,"SELECT * from pertemuan where kelas_id=$kelas_id");
        $result2 = mysqli_query($mysqli,"SELECT * from absensi where krs_id=$krs_id");
    ?>

    <div class="row py-2">
            <div class="col-sm">
            
            <?php if(isset($message)){ ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $message; ?>
                    </div>
              <?php  } ?>

            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                <tr>
                <th class="text-center">Kelas ID</th> 
                <th class="text-center">Kode Kelas</th> 
                <th class="text-center">Kode matkul</th> 
                <th class="text-center">Nama matkul</th>
                </tr>
                 </thead>
                <tbody>
                
                    <?php
					$id = 1;
					$result = mysqli_query($mysqli,"SELECT * from kelas where id=$id");
                        while($data = mysqli_fetch_array($result)) {
                    ?>
                    <tr>
                        <td><?php echo $data['id'] ?></td>
                        <td><?php echo $data['kode_kelas'] ?></td>
                        <td><?php echo $data['kode_matkul'] ?></td>
                        <td><?php echo $data['nama_matkul'] ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
              
            </table>
            <br><br><br><br>
            <table class="table table-striped table-hover table-bordered">
                <thead class="table-dark">
                <tr>
                <th class="text-center">Tanggal</th> 
                <th class="text-center">Pertemuan Ke</th> 
                <th class="text-center">Materi</th>
                <th class="text-center">Kehadiran</th>
                </tr>
                 </thead>
                <tbody>
                    <?php
					$kelas_id = 1;
					$result1 = mysqli_query($mysqli,"SELECT * from pertemuan where kelas_id=$kelas_id");
                        while($data = mysqli_fetch_array($result1 )) {
                    ?>
                        <td><?php echo $data['tanggal'] ?></td>
                        <td><?php echo $data['pertemuan_ke'] ?></td>
                        <td><?php echo $data['materi'] ?></td>
                        <td>
                        <?php 
                        $krs_id =1;
                            $result2=mysqli_query($mysqli,"SELECT * FROM absensi where krs_id=$krs_id");
                        while($data1 = mysqli_fetch_array($result1)) {
                            if($data1['pertemuan_id']==$data['pertemuan_id']){
                                echo "Hadir";
                            }else{
                                echo "Tidak hadir";
                            }
                        }
                        ?>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
          
</body>

<!-- <a class="btn btn-danger btn-lg" href="logout.php" role="button">Logout</a> -->

 
</html>
<footer
><?php include "footer.php"; ?></footer>

