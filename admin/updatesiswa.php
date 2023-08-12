<?php
session_start();
if (isset($_SESSION['username']) and $_SESSION['pass']) {
?>
    <?php
    include "adm-header.php";
    ?>
    <div class="container">
        <div class="row" style="margin-top: 20px;">
            <div class="col-sm-3">
                <?php
                include "adm-menu.php";
                ?>
            </div>
            <div class="col-sm-9">
                <?php
                include('../controller/config.php');
                // menangkap data yang di kirim dari form
                $no = $_POST['no'];
                $nisn = $_POST['nisn'];
                $name = $_POST['name'];
                $addresse = $_POST['addresse'];
                $tgllhr = $_POST['tgllhr'];
                $kelas = $_POST['kelas'];
                $ket = $_POST['ket'];
                $jurusan = $_POST['jurusan'];
                $sekolah = $_POST['sekolah'];
                // update data ke database
                $simpan = mysqli_query($koneksi, "UPDATE tbl_siswa SET nisn='$nisn', name='$name', addresse='$addresse', tgllhr='$tgllhr', kelas='$kelas', ket='$ket', kd_jurusan='$jurusan', sekolah='$sekolah' WHERE no='$no'");
                if ($simpan) {
                    echo '<div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        DATA BERHASIL DIPERBAHARUI
                        </div>';
                } else {
                    echo '<div class="alert alert-danger alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                        GAGAL DIPERBAHARUI
                        </div>';
                }
                // mengalihkan halaman kembali ke index.php
                include "siswa.php";
                echo "<meta http-equiv='refresh' content='2; url=siswa'>";
                ?>
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
    echo "<meta http-equiv='refresh' content='1; url=../login'>";
}
?>