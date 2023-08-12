<nav style="margin: -2px 0px;">
    <ul class="pagination pagination-sm justify-content-end">
        <li class="page-item">
            <a href="add-mapel"><span class="glyphicon glyphicon-random" aria-hidden="true"></span><b>&nbsp; TAMBAH MATA PELAJARAN</b></a>
        </li>
    </ul>
    <ul class="pagination pagination-sm justify-content-end">
        <?php
        $jumlah_page = ceil($jumlah_data / $batas);
        $jumlah_number = 1; //jumlah halaman ke kanan dan kiri dari halaman yang aktif
        $start_number = ($halaman > $jumlah_number) ? $halaman - $jumlah_number : 1;
        $end_number = ($halaman < ($jumlah_page - $jumlah_number)) ? $halaman + $jumlah_number : $jumlah_page;

        if ($halaman == 1) {
            echo '<li class="page-item disabled"><a class="page-link" href="#">Pertama</a></li>';
            echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&laquo;</span></a></li>';
        } else {
            $link_prev = ($halaman > 1) ? $halaman - 1 : 1;
            echo '<li class="page-item"><a class="page-link" href="mapel&hal=1">Pertama</a></li>';
            echo '<li class="page-item"><a class="page-link" href="mapel&hal=' . $link_prev . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
        }

        for ($i = $start_number; $i <= $end_number; $i++) {
            $link_active = ($halaman == $i) ? ' active' : '';
            echo '<li class="page-item ' . $link_active . '"><a class="page-link" href="mapel&hal=' . $i . '">' . $i . '</a></li>';
        }

        if ($halaman == $jumlah_page) {
            echo '<li class="page-item disabled"><a class="page-link" href="#"><span aria-hidden="true">&raquo;</span></a></li>';
            echo '<li class="page-item disabled"><a class="page-link" href="#">Terakhir</a></li>';
        } else {
            $link_next = ($halaman < $jumlah_page) ? $halaman + 1 : $jumlah_page;
            echo '<li class="page-item"><a class="page-link" href="mapel&hal=' . $link_next . '" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
            echo '<li class="page-item"><a class="page-link" href="mapel&hal=' . $jumlah_page . '">Terakhir</a></li>';
        }
        ?>
    </ul>
</nav>