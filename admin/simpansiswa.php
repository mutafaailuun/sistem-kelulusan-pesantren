<?php
include('../controller/config.php');
$nisn = $_POST['nisn'];
$name = $_POST['name'];
$addresse = $_POST['addresse'];
$tgllhr = $_POST['tgllhr'];
$kelas = $_POST['kelas'];
$ket = $_POST['ket'];
$jurusan = $_POST['jurusan'];
$sekolah = $_POST['sekolah'];
$tambah = mysqli_query($koneksi, "INSERT INTO tbl_siswa (nisn, name, addresse, tgllhr, kelas, ket, kd_jurusan, sekolah) VALUES ('$nisn','$name','$addresse','$tgllhr','$kelas','$ket','$jurusan','$sekolah')");

if ($tambah) {
    echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        <strong>BERHASIL! </strong> DATA SISWA BERHASIL DISIMPAN!.
        </div>';
} else {
    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        <strong>GALAL!</strong> GAGAL DISIMPAN!.
        </div>';
}
echo "<meta http-equiv='refresh' content='10; url=siswa'>";
