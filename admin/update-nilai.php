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
                $n1 = $_POST['1'];
                $n2 = $_POST['2'];
                $n3 = $_POST['3'];
                $n4 = $_POST['4'];
                $n5 = $_POST['5'];
                $n6 = $_POST['6'];
                $n7 = $_POST['7'];
                $n8 = $_POST['8'];
                $n9 = $_POST['9'];
                $n10 = $_POST['10'];
                $n11 = $_POST['11'];
                $n12 = $_POST['12'];
                $n13 = $_POST['13'];
                $n14 = !empty($_POST['14']) ? $_POST['14'] : '';
                $n15 = !empty($_POST['15']) ? $_POST['15'] : '';
                $n16 = !empty($_POST['16']) ? $_POST['16'] : '';
                $n17 = !empty($_POST['17']) ? $_POST['17'] : '';
                $n18 = !empty($_POST['18']) ? $_POST['18'] : '';
                $n19 = !empty($_POST['19']) ? $_POST['19'] : '';
                $n20 = !empty($_POST['20']) ? $_POST['20'] : '';
                $n21 = !empty($_POST['21']) ? $_POST['21'] : '';
                $n22 = !empty($_POST['22']) ? $_POST['22'] : '';
                $n23 = !empty($_POST['23']) ? $_POST['23'] : '';
                $n24 = !empty($_POST['24']) ? $_POST['24'] : '';
                $n25 = !empty($_POST['25']) ? $_POST['25'] : '';
                $n26 = !empty($_POST['26']) ? $_POST['26'] : '';

                // update data ke database
                $simpan = mysqli_query($koneksi, "UPDATE tbl_siswa SET nilai1='$n1', nilai2='$n2', nilai3='$n3', nilai4='$n4', nilai5='$n5', nilai6='$n6', nilai7='$n7', nilai8='$n8', nilai9='$n9', nilai10='$n10', nilai11='$n11', nilai12='$n12', nilai13='$n13', nilai14='$n14', nilai15='$n15', nilai16='$n16', nilai17='$n17', nilai18='$n18', nilai19='$n19', nilai20='$n20', nilai21='$n21', nilai22='$n22', nilai23='$n23', nilai24='$n24', nilai25='$n25', nilai26='$n26' WHERE no='$no'");
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