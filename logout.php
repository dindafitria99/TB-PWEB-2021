

<?php

session_start();
unset($_SESSION['nama']);
unset($_SESSION['tipe']);
unset($_SESSION['mahasiswa_id']);


include('connect.php');

session_destroy();
echo "<script>alert('Anda telah keluar dari halaman Anda');document.location='login.php'</script>";
