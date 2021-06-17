<?php
include "config.php";
include "header.php";
?>
<a href="index.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
<?php
if(isset($_POST['bts'])):
  if($_POST['nm']!=null && $_POST['gd']!=null && $_POST['tl']!=null && $_POST['tp']!=null  && $_POST['ar']!=null){
     $stmt = $mysqli->prepare("INSERT INTO mahasiswa(nama,nim,email,tipe,password) VALUES (?,?,?,?,?)");
     $stmt->bind_param('sssss', $nm, $gd, $tl, $tp, $ar);

     $nm = $_POST['nm'];
     $gd = $_POST['gd'];
     $tl = $_POST['tl'];
	 $tp = $_POST['tp'];
     $ar = $_POST['ar'];

     if($stmt->execute()):
?>
<p></p>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Berhasil!</strong> Silahkan tambah lagi, jika ingin keluar klik <a href="index.php">Home</a>.
</div>
<?php
     else:
?>
<p></p>
<div class="alert alert-danger alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Gagal!</strong> Gagal total, Silahkan coba lagi!!!.<?php echo $stmt->error; ?>
</div>
<?php
     endif;
  } else{
?>
<p></p>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
  <strong>Gagal!</strong> Form tidak boleh kosong, tolong diisi.
</div>
<?php
  }
endif;
?>

	    <p><br/></p>
	    <div class="panel panel-default">
	      <div class="panel-body">

		<form role="form" method="post">
		  <div class="form-group">
		    <label for="nm">Nama</label>
		    <input type="text" class="form-control" name="nm" id="nm" placeholder="Nama">
		  </div>
		  <div class="form-group">
		    <label for="gd">NIM</label>
			<input type="text" class="form-control" name="gd" id="gd" placeholder="NIM">
		  </div>
		  <div class="form-group">
		    <label for="tl">Email</label>
		    <input type="email" class="form-control" name="tl" id="tl" placeholder="Email">
		  </div>
		 

	<div class="form-group">
		    <label for="tp">Tipe</label>
			<select name="tp" id="tp" class="form-control" required>
					<option disabled selected value=""> Tipe </option>
					<option value="1">Mahasiswa</option>
					<option value="2">Admin</option>
				</select>
		  </div>


		  
		  <div class="form-group">
		    <label for="ar">Password</label>
		    <input type="text" class="form-control" name="ar" id="ar" placeholder="Password">
		</div>
		  <button type="submit" name="bts" class="btn btn-default">Submit</button>
		</form>
<?php
include "footer.php";
?>
