<?php
$host = "localhost"; // Nama hostnya
$user = "root"; // Username
$pass = ""; // Password (Isi jika menggunakan password)
$db = "tb-pweb"; // Database (Isikan dengan nama database yang kamu buat)
$conn = mysqli_connect($host, $user, $pass, $db) or die (mysqli_error($conn)); // Koneksi ke MySQL
?> 