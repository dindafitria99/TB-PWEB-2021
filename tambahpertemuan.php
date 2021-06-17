<!DOCTYPE html>
<html> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Tambah Pertemuan</title>
</head>
<body>
<div class="container"></div>

<?php
include("config.php");

if(isset($_GET['kelas_id'])){
	$kelas_id = $_GET['kelas_id'];
}
if(isset($_GET['pertemuan_ke'])){
	$pertemuan_ke = $_GET['pertemuan_ke'];
}

?>

<center>
    <font size="6">Tambah Pertemuan</font>
</center>
<hr>
<div class="container">
    <a href="index.php?page=detail_kelas&&id=<?= $kelas_id ?>" class="btn btn-success btn-sm">Kembali</a><br><br>
    <form action="" method="POST">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Pertemuan Ke</label>
            <div class="col-md-6 col-sm-6 ">
                <input type="number" name="pertemuan_ke" class="form-control" size="4" required>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal</label>
            <div class="col-md-6 col-sm-6 ">
                <input type="date" name="tanggal" class="form-control" size="4" required>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Materi</label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" name="materi" class="form-control" size="4" required>
            </div>
        </div>

        <!--<table style="color:black; font-family: sans-serif;">
                <tr>
                    <td>Pertemuan Ke</td>
                    <td><input type="number" name="pertemuan_ke" value="<?= $pertemuan_ke ?>" readonly required></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td><input type="date" name="tanggal" size="30" required></td>
                </tr> -->
        <!-- <tr>
                    <td>Materi</td>
                    <td><input type="text" name="materi" size="30" required></td>
                </tr> -->
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3"><br>
                <input type="submit" name="simpan" class="btn btn-success btn-sm" value="Simpan">
            </div>
        </div>

        <!-- <tr>
                    <td></td>
                    <td><input type="submit" name="simpan" value="simpan" class="btn btn-success btn-sm"></td>
                </tr> 
            </table>-->
    </form>
</div>
<?php
if (isset($_POST['simpan'])) {

    $pertemuan_ke = $_POST['pertemuan_ke'];
    $tanggal = $_POST['tanggal'];
    $materi = $_POST['materi'];
    $result = mysqli_query($mysqli, "INSERT INTO pertemuan (pertemuan_id, kelas_id, pertemuan_ke, tanggal, materi) VALUES ('','$kelas_id','$pertemuan_ke','$tanggal','$materi')") or die(mysqli_error($mysqli));

?>
    <script>
        alert("Berhasil menambahkan data.");
        document.location.href = "index.php?page=detail_kelas&&id=<?= $kelas_id ?>";
    </script>

<?php
}
?>