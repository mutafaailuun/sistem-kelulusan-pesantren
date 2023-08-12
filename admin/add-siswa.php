<?php
session_start();
if (isset($_SESSION['username']) and $_SESSION['pass']) {
?>
    <script src="../js/jquery.validate.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#frm").validate({
                debug: false,
                rules: {
                    nisn: "required",
                    name: "required",
                    addresse: "required",
                    tgllhr: "required",
                    kelas: "required",
                    ket: "required",
                    jurusan: "required"
                },
                messages: {
                    nisn: "* Nama Tidak Boleh Kosong",
                    name: "* Username Tidak Boleh Kosong",
                    addresse: "* Password Tidak Boleh Kosong",
                    tgllhr: "* Password Tidak Boleh Kosong",
                    kelas: "* Password Tidak Boleh Kosong",
                    ket: "* Password Tidak Boleh Kosong",
                    jurusan: "* Password Tidak Boleh Kosong"
                },
                submitHandler: function(form) {
                    // do other stuff for a valid form
                    $.post('simpansiswa.php', $("#frm").serialize(), function(data) {
                        $('#hasil').html(data);
                        document.frm.nisn.value = "";
                        document.frm.name.value = "";
                        document.frm.addresse.value = "";
                        document.frm.tgllhr.value = "";
                        document.frm.kelas.value = "";
                        document.frm.ket.value = "";
                        document.frm.jurusan.value = "";
                    });
                }
            });
        });
    </script>
    <link href="../css/thickbox.css" rel="stylesheet" type="text/css" />
    <script src="../js/thickbox.js" type="text/javascript"></script>
    <div id="rightPan">
        <div class="well">
            <div class="cleaner_h5"></div>
            <div id="hasil"></div>
            <div class="cleaner_h5"></div>
            <fieldset>
                <div class=" alert alert-dismissable alert-success">
                    <h4 align="center"><b>SISTEM INFORMASI KELULUSAN</br>TAMBAH DATA SISWA</b></h4>
                </div>
                <form class="form-horizontal" method="post" action="" name="frm" id="frm">
                    <div class="input-group" style="margin-bottom: 5px;">
                        <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>NISN</b></span>
                        <input type="number" placeholder="NISN" class="form-control" name="nisn" size="50" style="text-align: left;" required="yes">
                    </div>

                    <div class="input-group" style="margin-bottom: 5px;">
                        <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>NAMA LENGKAP</b></span>
                        <input type="text" placeholder="NAMA LENGKAP" class="form-control" name="name" size="50" style="text-align: left;" required="yes">
                    </div>

                    <div class="input-group" style="margin-bottom: 5px;">
                        <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>TEMPAT LAHIR</b></span>
                        <input type="text" placeholder="TEMPAT LAHIR" class="form-control" name="addresse" size="50" style="text-align: left;" required="yes">
                    </div>

                    <div class="input-group" style="margin-bottom: 5px;">
                        <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>TANGGAL LAHIR</b></span>
                        <input type="text" placeholder="FORMAT HARI/BULAN/TAHUN CONTOH 30/08/200" class="form-control" name="tgllhr" size="50" style="text-align: left;" required="yes">
                    </div>
                    <div class="input-group" style="margin-bottom: 5px;">
                        <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>JURUSAN</b></span>
                        <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="jurusan" required="yes">
                            <option>PILIH JURUSAN</option>
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
                        <input type="text" placeholder="CONTOH: X IPA 1" class="form-control" name="kelas" size="50" style="text-align: left;" required="yes">
                    </div>
                    <div class="input-group" style="margin-bottom: 5px;">
                        <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>SEKOLAH</b></span>
                        <input type="text" placeholder="NAMA SEKOLAH" class="form-control" name="sekolah" size="50" style="text-align: left;" required="yes">
                    </div>

                    <div class="input-group" style="margin-bottom: 5px;">
                        <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>STATUS KELULUSAN</b></span>
                        <select class="form-control form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="ket" required="yes">
                            <option value="KOSONG">PILIH KELULUSAN</option>
                            <option value="LULUS">LULUS</option>
                            <option value="TIDAK LULUS">TIDAK LULUS</option>
                        </select>
                    </div>

                    </br>
                    <div class="form-group" style="margin: -10px 0 -10px 0;">
                        <p align="left">
                            <button type="submit" name="submit" id="submit" value="SIMPAN" class="btn btn-xs btn-danger" onclick="tb_remove()"><span class="glyphicon glyphicon-upload" aria-hidden="true"></span><b>&nbsp;SIMPAN DATA</b></button>
                            <a class="btn btn-xs btn-info" href="siswa" value=""><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> <b>KEMBALI</b></a>
                        </p>
                    </div>
                </form>
            </fieldset>
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