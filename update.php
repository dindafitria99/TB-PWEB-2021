<?php
include "config.php";
include "header.php";
if(isset($_GET['u'])):
     if(isset($_POST['bts'])):
          $stmt = $mysqli->prepare("UPDATE mahasiswa SET nama=?, nim=?, email=?, tipe=?, password=? WHERE mahasiswa_id =?");
          $stmt->bind_param('ssssss', $nm, $gd, $tl, $tp, $ar, $id);

          $nm = $_POST['nm'];
          $gd = $_POST['gd'];
          $tl = $_POST['tl'];
		  $tp = $_POST['tp'];
          $ar = $_POST['ar'];
          $id = $_POST['id'];

          if($stmt->execute()):
            //    echo "<script>location.href='index.php'</script>";
			?>
			<!-- <p></p>
			<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<strong>Berhasil!</strong> Data Anda Telah Diperbarui <a href="index.php">Home</a>.
			</div> -->

			echo "<script>alert('Berhasil! Data Anda Telah Diperbarui');document.location='index.php'</script>";
			<?php 
          else:
               echo "<script>alert('".$stmt->error."')</script>";
          endif;
     endif;
     $res = $mysqli->query("SELECT * FROM mahasiswa WHERE mahasiswa_id=".$_GET['u']);
     $row = $res->fetch_assoc();
?>
	  <a href="index.php" class="btn btn-success btn-md"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Kembali</a>
	  <p><br/></p>

	    <div class="panel panel-default">

	      <div class="panel-body">
	     
		<form role="form" method="post">
		  <input type="hidden" value="<?php echo $row['mahasiswa_id'] ?>" name="id"/>
		  <div class="form-group">
		    <label for="nm">Nama</label>
		    <input type="text" class="form-control" name="nm" id="nm" value="<?php echo $row['nama'] ?>">
		  </div>
		  <div class="form-group">
		    <label for="gd">NIM</label>
			<input type="text" class="form-control" name="gd" id="gd" value="<?php echo $row['nim'] ?>">
		  </div>
		  <div class="form-group">
		    <label for="tl">Email</label>
		    <input type="tel" class="form-control" name="tl" id="tl" value="<?php echo $row['email'] ?>">
		  </div>
		  <div class="form-group">


		  <select name="tp" id="tp" class="form-control" required>
				<option disabled selected value=""> Tipe </option>
				<option value="1">Mahasiswa</option>
				<option value="2">Admin</option>
			</select>


		    
		  </div>
		  <div class="form-group">
		    <label for="ar">Password</label>
		    <input type="text" class="form-control" name="ar" id="ar" value="<?php echo $row['password'] ?>">

		  </div>
		  <button type="submit" name="bts" class="btn btn-default">Submit</button>
		</form>
<?php
endif;
include "footer.php";
?>
