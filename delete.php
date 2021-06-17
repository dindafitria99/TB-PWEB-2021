<?php
include "config.php";
if(isset($_GET['d'])){
     $stmt = $mysqli->prepare("DELETE FROM mahasiswa WHERE mahasiswa_id=?");
     
     $id = $_GET['d'];
     $stmt->bind_param('s', $id);

     if($stmt->execute()){
          echo "<script>location.href='index.php'</script>";
     }
     else{
          echo "<script>alert('".$stmt->error."')</script>";
     }
}
?>
