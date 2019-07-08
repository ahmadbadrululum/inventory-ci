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
                        <i class="material-icons">library_books</i> transaksi
                    </li>
                    <li class="active">
                        <i class="material-icons">library_books</i> keluar
                    </li>
                </ol>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                FORM BARANG KELUAR
                            </h2>
                            <ul class="header-dropdown" style="margin-right:-20px; margin-top:-10px;">
                                    <button type="button" id="refresh" class="btn btn-info waves-effect m-r-20" onclick="refreshPage()"><i class="material-icons" style="color:white">refresh</i><span>refresh</span></button>
                            </ul>
                        </div>
                        <div class="body">
                            <form>
                                <div class="row clearfix" id="message">
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                        <h2 class="card-inside-title">Nomor Invoice</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input readonly type="text" id="nomor_invoice" name="nomor_invoice" class="form-control">
                                                <input  id="editId" name="editId" type="hidden">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                    <h2 class="card-inside-title">Tanggal Keluar</h2>
                                        <div class="form-group">
                                            <div class="input-group date" id="bs_datepicker_component_container">
                                                <div class="form-line focused">
                                                    <input id="tanggal_keluar" name="tanggal_keluar" type="text" class="form-control" placeholder="tanggal keluar">
                                                </div>
                                                <span class="input-group-addon">
                                                    <i class="material-icons">date_range</i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                        <h2 class="card-inside-title">Barang</h2>
                                        <select class="form-control show-tick" id="selectBarang">
                                            <option value="">--Pilih Barang--</option>
                                            <?php
                                            foreach ($product as $pro) {
                                                foreach ($productid as $proid) {
                                                    if ($pro->id == $proid->product_id) {
                                                        ?>
                                                <option value="<?= $pro->id ?>"><?= $pro->name_product ?></option>
                                            <?php
                                                    }
                                                }
                                            }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                        <h2 class="card-inside-title">Jumlah</h2>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input  id="jumlah" name="jumlah" type="number" name="quantity" min="1" max="5" class="form-control">
                                                </div>
                                                <div id="cektotal"></div>
                                            </div>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                        <h2 class="card-inside-title">Satuan</h2>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input readonly id="selectSatuan" name="selectSatuan" type="text" class="form-control">
                                                </div>
                                            </div>
                                    </div>
                                        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                        <button type="button" id="btnSave" class="btn btn-success waves-effect m-r-20" onclick="submitSave()"><i class="material-icons" style="color:white">add</i><span>tambah data</span></button>
                                        <button style="display:none;" type="button" id="btnEdit" onclick="editDataSubmit()" class="btn btn-primary waves-effect m-r-20"><i class="material-icons" style="color:white">create</i><span> edit data</span></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                                <h2>DATA BARANG KELUAR</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%;">No</th>
                                            <th width="10%;">Nomor Invoice</th>
                                            <th width="13%;">Tanggal keluar</th>
                                            <th width="13%;">Kode Barang</th>
                                            <th width="15%;">Nama Barang</th>
                                            <th width="10%;">Satuan</th>
                                            <th width="10%;">Jumlah</th>
                                            <th width="10%;">Action</th>
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
    function refreshPage() {
        location.reload();
    }

    $('#selectBarang').change(function () {
        var id = $('#selectBarang').val();
        $.ajax({
            method: 'POST',
            data  : { id : id },
            url   : '<?= base_url('transaksi/getIdSatuan') ?>',
            dataType: 'json',
            success : function(res) {
                if ( id != '') {
                    if (res.total != 0) {
                        $('#cektotal').empty();
                        $('#cektotal').append('<p style="color:red"> stok barang '+res.total+'</p>');
                        $('#selectSatuan').val(res.cekid.unit_name);
                        $('#jumlah').attr('disabled',false);                       
                    }else{
                        $('#cektotal').empty()
                        $('#cektotal').append('<p style="color:red"> stok barang '+res.total+'</p>');
                        $('#selectSatuan').val(res.cekid.unit_name);
                        $('#jumlah').attr('disabled',true);
                    }
                }else{
                    $('#cektotal').empty()
                    $('#selectSatuan').val('');
                }

            }
        });
    })
    showData();
    fieldForm();

    
    function fieldForm(){
        $.ajax({
            type : "POST",
            url : '<?= base_url('transaksi/getId/keluar') ?>',
            dataType : 'text',
            success : function (res) {
                if (res == 0) {
                    $('#nomor_invoice').val('BK001');
                }else{
                    var tambah = (+res + +1);
                    if(tambah < 10){
                        $('#nomor_invoice').val('BK00'+tambah);
                    }else if(tambah < 100){
                        $('#nomor_invoice').val('BK0'+tambah);
                    }else if(tambah < 1000){
                        $('#nomor_invoice').val('BK'+tambah);
                    }
                }
            }
        });    
    }

    function showData() {
            $.ajax({
                type : "POST",
                url  : '<?= base_url('transaksi/showAllData/keluar') ?>',
                dataType : 'json',
                success : function (data) {
                    var baris = '';
                    var no = 1;
                    for (let i = 0; i < data.length; i++) {
                        baris += 
                            '<tr>'+
                                '<td>'+ no++ +'</td>' +
                                '<td>'+ data[i].nomor_invoice   +'</td>' +
                                '<td>'+ data[i].tanggal   +'</td>' +
                                '<td>'+ data[i].code_product    +'</td>' +
                                '<td>'+ data[i].name_product    +'</td>' +
                                '<td>'+ data[i].unit_name   +'</td>' +
                                '<td>'+ data[i].total       +'</td>' +
                                '<td><button type="button" title="edit" class="btn btn-primary waves-effect m-r-5" data-toggle="modal" data-target="#form" onclick="submit('+data[i].id+')"><i class="material-icons" style="color:white">create</i><span></span></button><a class="btn btn-danger waves-effect m-r-5" title="edit" onclick="deleteData('+data[i].id+')"><i class="material-icons" style="color:white">delete</i><span></span></a></td>'+
                            '</tr>';
                    }
                    $('#dataTable').html(baris);
                }
            });
    }

    function submitSave() {
        var nomor_invoice = $('#nomor_invoice').val();
        var tanggal_keluar = $('#tanggal_keluar').val();
        var selectBarang  = $('#selectBarang').val();
        var selectSatuan = $('#selectSatuan').val();
        var jumlah = $('#jumlah').val();
        $.ajax({
                type : "POST",
                data : {
                    nomor_invoice:nomor_invoice,
                    tanggal_keluar:tanggal_keluar,
                    selectBarang:selectBarang,
                    selectSatuan:selectSatuan,
                    jumlah:jumlah,
                },
                url  : '<?=  base_url('transaksi/saveData/keluar') ?>',
                dataType : 'json',
                success : function(res) {
                    $('#message').empty();    
                    $('#message').append('<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+ res.message +'</div>');
                    if (res.message == '') {
                        showData();
                        $('#tanggal_keluar').val("");
                        $('#selectBarang').val("");
                        $('#selectSatuan').val('');
                        $('#jumlah').val('');
                        fieldForm();
                        $('#cektotal').empty()
                        $('#message').empty();    
                        $('#message').append('<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Masukkan barang sukses</div>');
                    }
                }                
            });
    }

    function submit(action) {
        $('#btnSave').hide();
        $('#btnEdit').show();
        $.ajax({
            type : 'POST',
            data : {id:action},
            url  : '<?= base_url('transaksi/getIdData/keluar') ?>',
            dataType : 'json',
            success : function (id) {
                $('#message').empty();                
                $('#cektotal').empty()
                $('#cektotal').append('<p style="color:red"> stok barang '+id.total+'</p>');
                $('#editId').val(id.result.id);
                $('#nomor_invoice ').val(id.result.nomor_invoice);
                $('#tanggal_keluar').val(id.result.tanggal.split('-').reverse().join('/'));
                $("#selectBarang").val(id.result.product_id);
                $('#selectSatuan').val(id.result.unit_name);
                $('#jumlah').val(id.result.total);
            }
        });
    }

      // $('#simpaubahDatanData').on('click', function () {
        function editDataSubmit() {
            var id = $("#editId").val();
            var nomor_invoice = $('#nomor_invoice').val();
            var tanggal_keluar = $('#tanggal_keluar').val();
            var selectBarang  = $('#selectBarang').val();
            var selectSatuan = $('#selectSatuan').val();
            var jumlah = $('#jumlah').val();
            $.ajax({
                type : 'POST',
                data : {
                    id:id,
                    nomor_invoice:nomor_invoice,
                    tanggal_keluar:tanggal_keluar,
                    selectBarang:selectBarang,
                    selectSatuan:selectSatuan,
                    jumlah:jumlah,
                },
                url : '<?= base_url('transaksi/updateData/keluar') ?>',
                dataType : 'json',
                success : function(res) {
                    $('#message').empty();
                    $('#message').append('<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+ res.message +'</div>');
                    if (res.message == '') {
                        showData();
                        $('#cektotal').empty();
                        $('#tanggal_keluar').val("");
                        $('#selectBarang').val("");
                        $('#selectSatuan').val(''); 
                        $('#jumlah').val('');
                        fieldForm();
                        $('#message').empty();    
                        $('#message').append('<div class="alert alert-success alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Edit barang sukses</div>');
                        $('#btnEdit').hide();
                        $('#btnSave').show();
                    }
                }            
            });
        }
        // });


        function deleteData(id){
            var deleteconfirm = confirm('apakah yakin menghapus ?');
            if (deleteconfirm) {
                $.ajax({
                    type : 'POST',
                    data : {id:id},
                    url  : '<?= base_url('transaksi/deleteData/keluar') ?>',
                    dataType : 'json',
                    success : function(res) {
                        if (res.message == '') {
                        showData();
                        $('#tanggal_keluar').val("");
                        $('#selectBarang').val("");
                        $('#selectSatuan').val('');
                        $('#cektotal').empty()
                        $('#jumlah').val('');
                        fieldForm();
                        $('#message').empty();    
                        }
                    }
                });
            }
        }

</script>