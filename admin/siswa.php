<div class="well">
    <table class="table table-striped table-bordered">
        <div class="alert alert-dismissable alert-success">
            <h4 align="center"><b>SISTEM INFORMASI KELULUSAN <br>DAFTAR NAMA SISWA</b></h4>
        </div>
        <div class="input-group">
            <span class="input-group-addon" id="basic-addon1"><b>LIVE CARI DATA&nbsp;&nbsp;<span class="glyphicon glyphicon-search" aria-hidden="true"></span></b></span>
            <input type="text" name="search_box" id="search_box" class="form-control" placeholder="Ketikkan Data Yang Akan Dicari ..." />
        </div>
        </br>
        <div class="table-responsive" id="dynamic_content" style="margin-bottom: -25px;">
        </div>
</div>
<script>
    $(document).ready(function() {
        load_data(1);

        function load_data(page, query = '') {
            $.ajax({
                url: "fetch.php",
                method: "POST",
                data: {
                    page: page,
                    query: query
                },
                success: function(data) {
                    $('#dynamic_content').html(data);
                }
            });
        }
        $(document).on('click', '.page-link', function() {
            var page = $(this).data('page_number');
            var query = $('#search_box').val();
            load_data(page, query);
        });

        $('#search_box').keyup(function() {
            var query = $('#search_box').val();
            load_data(1, query);
        });

    });
</script>