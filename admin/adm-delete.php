<?php
session_start();
if (isset($_SESSION['username']) and $_SESSION['pass']) {
?>
    <?php
    include "adm-header.php";
    ?>
    <div class="container">
        <div class="row" style="margin-top: 30px;">
            <div class="col-sm-3">
                <?php
                include "adm-menu.php";
                ?>
            </div>
            <div class="col-sm-9">
                <?php
                include('../controller/config.php');
                $no = $_GET['no'];
                $hapus = mysqli_query($koneksi, "DELETE from tbl_siswa where no='$no'");
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
                echo "<meta http-equiv='refresh' content='2; url=siswa'>";
                include "siswa.php"; ?>
            </div>
        </div>
    </div>
    <?php
    include "../controller/footer.php";
    ?>
    </body>

    </html>
<?php
} else { ?>
<?php
    echo "<meta http-equiv='refresh' content='0; url=../login'>";
}
?>