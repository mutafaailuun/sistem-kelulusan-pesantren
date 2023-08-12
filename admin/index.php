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
        require "../controller/config.php";
        error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
        $page = $_GET['page'];
        $filename = "$page.php";
        if (!file_exists($filename)) {
          include "home.php";
        } else {
          include "$page.php";
        }
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
  echo "<meta http-equiv='refresh' content='0; url=../login'>";
}
?>