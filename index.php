<?php
include "config.php";
include "header.php";
include 'connect.php';
session_start();
if (empty($_SESSION['nama']) or empty($_SESSION['tipe'])) {
    echo "<script>alert('Maaf, untuk mengakses halaman ini, anda harus login terlebih dahulu, terima kasih');document.location='login.php'</script>";
}

?>
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
     <body>

<div class="container">
        <div class="jumbotron bg-primary text-white" width="500px" >
            <h10 class="display-4"><b>Hello Admin</b></h10>
            <p class="lead"><b>Selamat Datang, Anda Berhasil Login</b> </p>
            <hr class="my-4">
            <a class="btn btn-danger btn-lg" href="logout.php" role="button">Logout</a>
        </div>
    </div>


</body>
<p>
<a href="create.php" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tambah Data</a> &nbsp; &nbsp;
<a href="cetak.php" class="btn btn-success btn-md" target="_blank"><span class="glyphicon glyphicon-arrow-left"  aria-hidden="true"></span> Cetak Data</a> &nbsp; &nbsp;
<a href="uploadfilecsv.php" class="btn btn-success btn-md" target="_blank"><span class="glyphicon glyphicon-arrow-left"  aria-hidden="true"></span> Upload CSV</a> &nbsp; &nbsp;
 
 <a href="lihatlistkelas.php" class="btn btn-success btn-md" target="_blank"><span class="glyphicon glyphicon-arrow-right"  aria-hidden="true"></span> List Kelas</a>

 <br/>
 <br>

</p>
<table id="ghatable" class="display table table-bordered table-striped table-responsive" cellspacing="0" width="100%">
<thead>
     <tr>
          <th>Nomor</th>
          <th>Nama</th>
          <th>NIM</th>
          <th>Email</th>
          <th>Tipe</th>
          <th>Password</th>
          <th>Aksi</th>
     </tr>
</thead>
<tbody>
<?php
$res = $mysqli->query("SELECT * FROM mahasiswa order by nama");
$no = 1;
while ($row = $res->fetch_assoc()):
?>
     <tr>
          <td><?= $no ?></td>
          <td><?= $row['nama'] ?></td>
          <td><?= $row['nim'] ?></td>
          <td><?= $row['email'] ?></td>
          
          <?php
						switch ($row['tipe']) {
							case 1:
								echo "<td>Mahasiswa</td>";
								break;
							case 2:
								echo "<td>admin</td>";
								break;
						}
						?>
          <td><?= $row['password'] ?></td>
          <td>
          <a href="update.php?u=<?= $row['mahasiswa_id'] ?>" class="btn btn-success"> Edit</a> &nbsp;&nbsp;
          <a onclick="return confirm('Yakin ingin menghapus ? ')" href="delete.php?d=<?= $row['mahasiswa_id'] ?>" class="btn btn-danger"> Delete</a>
          </td>
     </tr>

<?php
$no++;
endwhile;
?>

</tbody>
</table>

<?php
include "footer.php";
?>
   </div> <!-- /.container-fluid -->
    
   

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-datepicker.min.js"></script>
    <!-- DataTables -->
    <script src="assets/js/dataTables/js/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/js/dataTables.bootstrap.js"></script>

    <script type="text/javascript">
      $(function () {

        //datepicker plugin
        $('.date-picker').datepicker({
          autoclose: true,
          todayHighlight: true
        });

        // toolip
        $('[data-toggle="tooltip"]').tooltip();

        $('#dataTables-example').dataTable( {
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            "pageLength": 5
        } );
      })
    </script>
    </body>
</html>
