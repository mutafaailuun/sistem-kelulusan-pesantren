    <?php
    include "../controller/config.php";
    $hapus = mysqli_query($koneksi, "DELETE FROM tbl_siswa");
    if ($hapus) {
        echo '
                <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                DATA BERHASIL DIHAPUS SEMUA
                </div>';
    } else {
        echo '
        <div class="alert alert-warning alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
        DATA GAGAL DIHAPUS SEMUA
        </div>';
    }
    include "siswa.php";
    echo "<meta http-equiv='refresh' content='2; url=siswa'>";
    ?>