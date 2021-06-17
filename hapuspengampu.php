<?php
include 'config.php';
$krs_id = $_GET['krs_id'];
$id = $_GET['id'];
$cek = isset($_GET['cek']) ? $_GET['cek'] : '';


if ($cek == null) {
?>

    <script>
        alert("Semua data yang dipilih akan dihapus dari kelas termasuk absensi.")
        var check = confirm("Data akan dihapus?")
        if (check == true) {
            document.location.href = "index.php?page=hapuspengampu&&krs_id=<?= $krs_id ?>&&id=<?= $id ?>&&cek=true";
        } else {
            alert("Gagal menghapus data");
            document.location.href = "detil_kelas.php";
        }
    </script>
<?php
} else {
    $delete = mysqli_query($mysqli, "DELETE FROM absensi WHERE krs_id='$krs_id'");
    $delete = mysqli_query($mysqli, "DELETE FROM krs WHERE krs_id='$krs_id'");
?>
    <script>
        alert("Data berhasil dihapus");
        document.location.href = "detil_kelas.php";
    </script>
<?php
}
?>