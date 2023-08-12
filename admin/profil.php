<div class="well">
    <div class=" alert alert-dismissable alert-success">
        <h4 align="center"><b>SISTEM INFORMASI KELULUSAN</br>DATA PROFIL SEKOLAH</b></h4>
    </div>
    <form class="form-horizontal" method="post">
        <?php
        include('../controller/config.php');
        if (isset($_REQUEST['submit'])) {
            $cfgSekolah = $_REQUEST['nm_sekolah'];
            $cfgAplikasi = $_REQUEST['nm_aplikasi'];
            $cfgTahun = $_REQUEST['tahun'];
            $cfgTgl = $_REQUEST['cfgTanggal'] . ' ' . $_REQUEST['cfgJam'];

            $qCfg = "UPDATE tbl_profil SET nm_sekolah='$cfgSekolah', nm_aplikasi='$cfgAplikasi', tahun='$cfgTahun',tgl_pengumuman='$cfgTgl' WHERE id_profil='1'";
            $upCfg = mysqli_query($koneksi, $qCfg);
            sleep(2);
        }
        $q = mysqli_query($koneksi, "SELECT * from tbl_profil where id_profil='1'");
        while ($r = mysqli_fetch_array($q)) {
        ?>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>NAMA SEKOLAH</b></span>
                <input type="text" class="form-control" name="nm_sekolah" value="<?php echo $r['nm_sekolah']; ?>" readonly size="50" style="text-align: left;">
            </div>
            </br>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>NAMA APLIKASI</b></span>
                <input type="text" class="form-control" name="nm_aplikasi" value="<?php echo $r['nm_aplikasi']; ?>" readonly size="50" style="text-align: left;">
            </div>
            </br>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>TAHUN PELAJARAN</b></span>
                <input type="number" class="form-control" name="tahun" min="2021" max="2030" value="<?php echo $r['tahun']; ?>" readonly size="50" style="text-align: left;">
            </div>
            </br>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>TANGGAL PENGUMUMAN</b></span>
                <input type="date" class="form-control" name="cfgTanggal" value="<?= date('Y-m-d', strtotime($r['tgl_pengumuman'])) ?>" readonly size="50" style="text-align: left;">
            </div>
            </br>
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="min-width: 170px; text-align: left;"><b>JAM PENGUMUMAN</b></span>
                <input type="time" class="form-control" name="cfgJam" value="<?= date('H:i', strtotime($r['tgl_pengumuman'])) ?>" readonly size="50" style="text-align: left;">
            </div>
            </br>
            <div class="form-group">
                <p align="left">
                    <button type="button" id="btEnable" class="btn btn-danger"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span>&nbsp; <b>EDIT DATA</b></button>
                    <button type="submit" name="submit" class="btn btn-success" disabled="disabled"><span class="glyphicon glyphicon-retweet" aria-hidden="true"></span>&nbsp; <b>UPDATE</b></button>
                </p>
            </div>
            <script>
                $('button[name="submit"]').prop('disabled', true);
                $('#btEnable').click(function() {
                    $("input").removeAttr('readonly');
                    $('button[name="submit"]').removeAttr('disabled');
                });
            </script>

        <?php
        }
        ?>
    </form>
</div>