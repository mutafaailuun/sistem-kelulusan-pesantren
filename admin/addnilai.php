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
                                <h4 align="center"><b>SISTEM INFORMASI KELULUSAN<br>TAMBAH SISWA</b></h4>
                            </div>
                            <?php
                            include "../controller/config.php";
                            $no = $_GET['no'];
                            $q = mysqli_query($koneksi, "SELECT * FROM tbl_siswa INNER JOIN tbl_jurusan ON tbl_siswa.kd_jurusan=tbl_jurusan.kd_jurusan WHERE no='$no'");
                            while ($r = mysqli_fetch_array($q)) {
                            ?>
                                <form class="form-horizontal" method="post" action="update-nilai.php">
                                    <input type="hidden" class="form-control" name="no" value="<?php echo $r['no']; ?>">
                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <span class="input-group-addon" id="basic-addon1" style="min-width: 120px; text-align: left;"><b>NISN</b></span>
                                        <input type="text" value="<?php echo $r['nisn']; ?>" class="form-control" name="nisn" readonly style="text-align: left;">
                                    </div>
                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <span class="input-group-addon" id="basic-addon1" style="min-width: 120px; text-align: left;"><b>NAMA SISWA</b></span>
                                        <input type="text" value="<?php echo $r['name']; ?>" class="form-control" name="name" readonly style="text-align: left;">
                                        <input type="hidden" value="<?php echo $r['nm_jurusan']; ?>" class="form-control" name="name" readonly style="text-align: left;">
                                    </div>
                                    <br>
                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <span class="input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>1</b></span>
                                        <input type="number" value="<?php echo $r['nilai1']; ?>" class="form-control" name="1" placeholder="Nilai 1" size="50">
                                        <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>2</b></span>
                                        <input type="number" value="<?php echo $r['nilai2']; ?>" class="form-control" name="2" placeholder="Nilai 2" size="50">
                                        <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>3</b></span>
                                        <input type="number" value="<?php echo $r['nilai3']; ?>" class="form-control" name="3" placeholder="Nilai 3" size="50">
                                        <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>4</b></span>
                                        <input type="number" value="<?php echo $r['nilai4']; ?>" class="form-control" name="4" placeholder="Nilai 4" size="50">
                                        <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>5</b></span>
                                        <input type="number" value="<?php echo $r['nilai5']; ?>" class="form-control" name="5" placeholder="Nilai 5" size="50">
                                        <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>6</b></span>
                                        <input type="number" value="<?php echo $r['nilai6']; ?>" class="form-control" name="6" placeholder="Nilai 6" size="50">
                                        <span class="input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>7</b></span>
                                        <input type="number" value="<?php echo $r['nilai7']; ?>" class="form-control" name="7" placeholder="Nilai 7" size="10">
                                    </div>
                                    <div class="input-group" style="margin-bottom: 5px;">
                                        <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>8</b></span>
                                        <input type="number" value="<?php echo $r['nilai8']; ?>" class="form-control" name="8" placeholder="Nilai 8" size="10">
                                        <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>9</b></span>
                                        <input type="number" value="<?php echo $r['nilai9']; ?>" class="form-control" name="9" placeholder="Nilai 9" size="10">
                                        <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>10</b></span>
                                        <input type="number" value="<?php echo $r['nilai10']; ?>" class="form-control" name="10" placeholder="Nilai 10" size="10">
                                        <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>11</b></span>
                                        <input type="number" value="<?php echo $r['nilai11']; ?>" class="form-control" name="11" placeholder="Nilai 11" size="10">
                                        <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>12</b></span>
                                        <input type="number" value="<?php echo $r['nilai12']; ?>" class="form-control" name="12" placeholder="Nilai 12" size="10">
                                        <span class="input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>13</b></span>
                                        <input type="number" value="<?php echo $r['nilai13']; ?>" class="form-control" name="13" placeholder="Nilai 13" size="10">
                                        <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>14</b></span>
                                        <input type="number" value="<?php echo $r['nilai14']; ?>" class="form-control" name="14" placeholder="Nilai 14" size="10">
                                    </div>
                                    <?php if ($r['nm_jurusan'] == 'IPA') { ?>
                                        <div class="input-group" style="margin-bottom: 5px;">
                                            <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px;"><b>15</b></span>
                                            <input type="number" value="<?php echo $r['nilai15']; ?>" class="form-control" name="15" placeholder="Nilai 15" size="10">
                                            <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>16</b></span>
                                            <input type="number" value="<?php echo $r['nilai16']; ?>" class="form-control" name="16" placeholder="Nilai 16" size="10">
                                            <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>17</b></span>
                                            <input type="number" value="<?php echo $r['nilai17']; ?>" class="form-control" name="17" placeholder="Nilai 17" size="10">
                                            <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>18</b></span>
                                            <input type="number" value="<?php echo $r['nilai18']; ?>" class="form-control" name="18" placeholder="Nilai 18" size="10">
                                            <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>23</b></span>
                                            <input type="number" value="<?php echo $r['nilai23']; ?>" class="form-control" name="23" placeholder="Nilai 23" size="10">
                                            <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>24</b></span>
                                            <input type="number" value="<?php echo $r['nilai24']; ?>" class="form-control" name="24" placeholder="Nilai 24" size="10">
                                        </div>
                                    <?php } else { ?>
                                        <div class="input-group" style="margin-bottom: 5px;">
                                            <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>19</b></span>
                                            <input type="number" value="<?php echo $r['nilai19']; ?>" class="form-control" name="19" placeholder="Nilai 19" size="10">
                                            <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>20</b></span>
                                            <input type="number" value="<?php echo $r['nilai20']; ?>" class="form-control" name="20" placeholder="Nilai 20" size="10">
                                            <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>21</b></span>
                                            <input type="number" value="<?php echo $r['nilai21']; ?>" class="form-control" name="21" placeholder="Nilai 21" size="10">
                                            <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>22</b></span>
                                            <input type="number" value="<?php echo $r['nilai22']; ?>" class="form-control" name="22" placeholder="Nilai 22" size="10">
                                            <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>25</b></span>
                                            <input type="number" value="<?php echo $r['nilai25']; ?>" class="form-control" name="25" placeholder="Nilai 25" size="10">
                                            <span class=" input-group-addon" id="basic-addon1" style="min-width: 40px; "><b>26</b></span>
                                            <input type="number" value="<?php echo $r['nilai26']; ?>" class="form-control" name="26" placeholder="Nilai 26" size="10">
                                        </div>
                                    <?php } ?>
                                    <br>
                                    <div class="form-group" style="margin-bottom: -10px;">
                                        <p align="left">
                                            <input type="submit" value="UPDATE" name="simpan" class="btn btn-danger" />
                                            <a class="btn btn-info" href="siswa" value=""><b>KEMBALI</b></a>
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