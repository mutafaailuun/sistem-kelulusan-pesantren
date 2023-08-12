    <?php
    include('../controller/config.php');
    $no = $_POST['urutan'];
    $mapel = $_POST['mapel'];
    $jurusan = $_POST['jurusan'];
    $tambah = mysqli_query($koneksi, "INSERT INTO tbl_mapel (no_urut,nm_mapel,kd_jurusan) VALUES ('$no','$mapel','$jurusan')");

    if ($tambah) {
        echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        <strong> SUKSES!!!</strong> DATA PETUGAS BERHASIL DISIMPAN!.
        </div>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        <strong> Sukses..!</strong> GAGAL DISIMPAN!.
        </div>';
    }
    echo "<meta http-equiv='refresh' content='0; url=mapel'>";
    ?>