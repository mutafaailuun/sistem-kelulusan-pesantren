<div class="navbar navbar-inverse navbar-fixed-bottom">
    <?php
    require "config.php";
    $p = mysqli_query($koneksi, "SELECT * FROM tbl_profil WHERE  id_profil='1'");
    while ($data = mysqli_fetch_array($p)) {
        echo '<h5 align="center" style="color:#ffff;">' . $data['nm_sekolah'] . '</br>' . $data['nm_aplikasi'] . ' &copy ' . $data['tahun'] . '</h5>';
    }
    ?>
</div>