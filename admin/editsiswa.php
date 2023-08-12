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
                <div id="rightPan">
                    <div class="well">
                        <div class="cleaner_h5"></div>
                        <div id="hasil"></div>
                        <div class="cleaner_h5"></div>
                        <fieldset>
                            <div class=" alert alert-dismissable alert-success">
                                <h4 align="center"><b>SISTEM INFORMASI KELULUSAN</br>UPDATE DATA SISWA</b></h4>
                            </div>
                            <?php
                            include "../controller/config.php";
                            $no = $_GET['no'];
                            $q = mysqli_query($koneksi, "SELECT * from tbl_siswa INNER JOIN tbl_jurusan ON tbl_siswa.kd_jurusan=tbl_jurusan.kd_jurusan where no='$no'");
                            while ($r = mysqli_fetch_array($q)) {
                            ?>
                                <form class="form-horizontal" method="post" action="updatesiswa.php">
                                    <input type="hidden" class="form-control" name="no" value="<?php echo $r['no']; ?>" size="50" style="text-align: left;">
                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>NISN</b></span>
                                        <input type="text" class="form-control" name="nisn" value="<?php echo $r['nisn']; ?>" size="50" style="text-align: left;">
                                    </div>

                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>NAMA LENGKAP</b></span>
                                        <input type="text" class="form-control" name="name" value="<?php echo $r['name']; ?>" size="50" style="text-align: left;">
                                    </div>

                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>TEMPAT LAHIR</b></span>
                                        <input type="text" class="form-control" name="addresse" value="<?php echo $r['addresse']; ?>" size="50" style="text-align: left;">
                                    </div>

                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>TANGGAL LAHIR</b></span>
                                        <input type="text" class="form-control" name="tgllhr" value="<?php echo $r['tgllhr']; ?>" size="50" style="text-align: left;">
                                    </div>
                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>JURUSAN</b></span>
                                        <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="jurusan" required="yes">
                                            <option value="<?php echo $r['kd_jurusan']; ?>" selected><?php echo $r['nm_jurusan']; ?></option>
                                            <option>-- PILIH JURUSAN --</option>
                                            <?php
                                            include('config.php');
                                            $q = mysqli_query($koneksi, "SELECT * FROM tbl_jurusan ORDER BY kd_jurusan ASC");
                                            while ($data = mysqli_fetch_array($q)) {
                                            ?>
                                                <option value="<?php echo $data['kd_jurusan'] ?>"><?php echo $data['nm_jurusan'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>KELAS</b></span>
                                        <input type="text" class="form-control" name="kelas" value="<?php echo $r['kelas']; ?>" size="50" style="text-align: left;">
                                    </div>
                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>SEKOLAH</b></span>
                                        <input type="text" class="form-control" name="sekolah" value="<?php echo $r['sekolah']; ?>" size="50" style="text-align: left;">
                                    </div>
                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>STATUS KELULUSAN</b></span>
                                        <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="ket" required="yes">
                                            <option value="<?php echo $r['ket']; ?>" selected><?php echo $r['ket']; ?></option>
                                            <option value="KOSONG">-- PILIH KELULUSAN --</option>
                                            <option value="LULUS">LULUS</option>
                                            <option value="TIDAK LULUS">TIDAK LULUS</option>
                                        </select>
                                    </div>

                                    </br>
                                    <div class="form-group" style="margin: -10px 0 -10px 0;">
                                        <p align="left">
                                            <input type="submit" value="UPDATE DATA" name="simpan" class="btn btn-xs btn-danger" />
                                            <a class="btn btn-xs btn-info" href="siswa" value=""><b>KEMBALI</b></a>
                                        </p>
                                    </div>
                                <?php
                            }
                                ?>
                                </form>
                        </fieldset>
                    </div>
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