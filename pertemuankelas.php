<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Detail Pertemuan</title>
</head>
<body>
<div class="container"></div>

<?php
include "config.php";
include "header.php";

if(isset($_GET['pertemuan_ke'])){
	$pertemuan_ke = $_GET['pertemuan_ke'];
}
if(isset($_GET['id'])){
	$id = $_GET['id'];
}
if(isset($_GET['pertemuan_id'])){
	$pertemuan_id = $_GET['pertemuan_id'];
}

?>

<div class="container" style="margin-top:20px">
    <center>
	
        <h2>Detail Pertemuan</h2>
    </center>

    <table class="table table-bordered ">
        <br>
        <h5>Data Mahasiswa Berstatus Hadir</h5>
        <thead class="thead-dark">
            <tr>
                <th style="width:2%">No</th>
                <th>Nama Mahasiswa</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
                <th>Durasi</th>
            </tr>
        </thead>

        <?php
		
		$no = 0;
		$pertemuan_id = 0;
        $hasil = mysqli_query($mysqli, "SELECT absensi.absensi_id, absensi.pertemuan_id, absensi.krs_id, absensi.jam_masuk, absensi.jam_keluar, absensi.durasi, krs.mahasiswa_id, krs.kelas_id, mahasiswa.nama FROM krs RIGHT JOIN absensi ON krs.krs_id=absensi.krs_id LEFT JOIN mahasiswa ON krs.mahasiswa_id=mahasiswa.mahasiswa_id WHERE absensi.pertemuan_id='$pertemuan_id'");
        while ($data = mysqli_fetch_array($hasil)) {
            $no++;
        ?>
            <tbody>
                <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['jam_masuk']; ?></td>
                    <td><?php echo $data['jam_keluar']; ?></td>
                    <td><?php echo $data['durasi']; ?></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>


    <br><br>

    <table class="table table-bordered ">
        <br>
        <h5>Data Mahasiswa Berstatus Tidak Hadir</h5>
        <thead class="thead-dark">
            <tr>
                <th style="width:2%">No</th>
                <th>Nama Mahasiswa</th>
            </tr>
        </thead>

        <?php
		$id = 0;
        $hasil = mysqli_query($mysqli, "SELECT DISTINCT mahasiswa.nama FROM krs LEFT JOIN mahasiswa ON krs.mahasiswa_id=mahasiswa.id WHERE krs.krs_id NOT IN (SELECT absensi.krs_id FROM krs RIGHT JOIN absensi ON krs.krs_id=absensi.krs_id LEFT JOIN mahasiswa ON krs.mahasiswa_id=mahasiswa.id WHERE pertemuan_id = '$pertemuan_id') AND kelas_id=$id");
        $no = 0;
        if ($hasil == FALSE) {
        } else {
            while ($data = mysqli_fetch_array($hasil)) {
                $no++;
        ?>
                <tbody>
                    <tr>
                        <td><?php echo $no ?></td>
                        <td><?php echo $data['nama']; ?></td>
                    </tr>
                </tbody>
        <?php
            }
        }
        ?>
    </table>


    <h3><a href="lihatlistkelas.php?page=detail_kelas&&id=<?= $id ?>" class="btn btn-danger">Kembali</a></h3>
</div>
</body>
</html>