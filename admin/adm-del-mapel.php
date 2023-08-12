<?php
include('../controller/config.php');
$hapus = mysqli_query($koneksi, "DELETE from tbl_mapel where id_mapel='$_POST[id]'");
if ($hapus) {
    echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    DATA BERHASIL DIHAPUS
    </div>';
} else {
    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    GAGAL DIHAPUS
    </div>';
}
echo "<meta http-equiv='refresh' content='2; url=mapel'>";
