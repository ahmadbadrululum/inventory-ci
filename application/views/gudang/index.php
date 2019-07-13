<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb">
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons">home</i> Home
                        </a>
                    </li>
                    <li class="active">
                        <i class="material-icons">library_books</i> Gudang
                    </li>
                  
                </ol>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                                <h2><strong>STOK DATA BARANG DI GUDANG</strong></h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Tanggal</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Stok Awal</th>
                                            <th>Satuan</th>
                                            <th>Stok Masuk</th>
                                            <th>Stok Keluar</th>
                                            <th>Stok Akhir</th>
                                            <th>keterangan</th>
                                        </tr>
                                    </thead>

                                    <tbody id="dataTable">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
</section>

<script>

    showData();

    function showData() {
            $.ajax({
                type : "POST",
                url  : '<?= base_url('gudang/showAllData/gudang') ?>',
                dataType : 'json',
                success : function (data) {

                    var baris = '';
                    var no = 1;
                    for (let i = 0; i < data.length; i++) {
                        baris += 
                            '<tr>'+
                                '<td>'+ no++ +'</td>' +
                                '<td>'+ data[i].tanggal   +'</td>' +
                                '<td>'+ data[i].kode    +'</td>' +
                                '<td>'+ data[i].nama    +'</td>' +
                                '<td>'+ data[i].stok_awal       +'</td>' +
                                '<td>'+ data[i].unit_name   +'</td>' +
                                '<td>'+ data[i].stok_masuk       +'</td>' +
                                '<td>'+ data[i].stok_keluar       +'</td>' +
                                '<td>'+ data[i].stok_akhir     +'</td>' +
                                '<td>'+ data[i].keterangan       +'</td>' +
                            '</tr>';
                    }
                    $('#dataTable').html(baris);
                }
            });
    }


</script>