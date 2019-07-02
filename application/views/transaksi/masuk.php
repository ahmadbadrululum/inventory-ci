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
                        <i class="material-icons">library_books</i> masuk
                    </li>
                </ol>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                FORM BARANG MASUK
                                <!-- <small>With floating label</small> -->
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form>
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
                                    <h2 class="card-inside-title">Tanggal Masuk</h2>
                                        <div class="form-group">
                                            <div class="input-group date" id="bs_datepicker_component_container">
                                                <div class="form-line focused">
                                                    <input id="tanggal_masuk" name="tanggal_masuk" type="text" class="form-control" placeholder="tanggal masuk">
                                                </div>
                                                <span class="input-group-addon">
                                                    <i class="material-icons">date_range</i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                       <h2 class="card-inside-title">Barang</h2>
                                        <select class="form-control" id="selectBarang">
                                            <option value="">--Pilih Barang--</option>
                                            <?php foreach ($product as $pro) {?>
                                                <option value="<?= $pro->id ?>"><?= $pro->name_product ?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                        <h2 class="card-inside-title">Jumlah</h2>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input  id="jumlah" name="jumlah" type="text" class="form-control">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                        <h2 class="card-inside-title">Satuan</h2>
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <input  readonly id="selectSatuan" name="selectSatuan" type="text" class="form-control">
                                                </div>
                                            </div>
                                    </div>
                                  
                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                        <button type="button" id="btnSave" class="btn btn-success waves-effect m-r-20" onclick="submitSave()"><i class="material-icons" style="color:white">add</i><span>tambah data</span></button>
                                        <button style="display:none;" type="button" id="btnEdit" onclick="editDataSubmit()" class="btn btn-primary waves-effect m-r-20"><i class="material-icons" style="color:white">create</i><span> edit data</span></button>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <!-- <div class="alert alert-danger"> -->
                                        <!-- <strong id="message">Gagal Menyimpan</strong> -->
                                    <!-- </div> -->
                                    <center><p id="message"></p></center>
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
                                <h2>DATA BARANG MASUK</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nomor Invoice</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan</th>
                                            <th>Jumlah</th>
                                            <th>Action</th>
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
    $('#selectBarang').change(function () {
        var id = $('#selectBarang').val();
        $.ajax({
            method: 'POST',
            data  : { id : id },
            url   : '<?= base_url('product/getIdSatuan') ?>',
            dataType: 'json',
            success : function(res) {
                // console.log(res.unit_name);
                $('#selectSatuan').val(res.unit_name);
            }
        });
    });
    showData();
    fieldForm();

    function fieldForm(){
        $.ajax({
            type : "POST",
            url : '<?= base_url('transaksi/getId/masuk') ?>',
            dataType : 'text',
            success : function (res) {
                if (res == 0) {
                    $('#nomor_invoice').val('BM001');
                }else{
                    var tambah = (+res + +1);
                    if(tambah < 10){
                        $('#nomor_invoice').val('BM00'+tambah);
                    }else if(tambah < 100){
                        $('#nomor_invoice').val('BM0'+tambah);
                    }else if(tambah < 1000){
                        $('#nomor_invoice').val('BM'+tambah);
                    }
                }
            }
        });    
    }  

    function showData() {
            $.ajax({
                type : "POST",
                url  : '<?= base_url('transaksi/showAllData/masuk') ?>',
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
                                '<td><button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#form" id="submit" onclick="submit('+data[i].id+')"><i class="material-icons" style="color:white">create</i><span></span></button><a class="btn btn-danger waves-effect m-r-20" onclick="deleteData('+data[i].id+')"><i class="material-icons" style="color:white">delete</i><span></span></a></td>'+
                            '</tr>';
                    }
                    
                    
                    $('#dataTable').html(baris);
                }
            });
    }

    function submitSave() {
        var nomor_invoice   = $('#nomor_invoice').val();
        var tanggal_masuk   = $('#tanggal_masuk').val();
        var selectBarang    = $('#selectBarang').val();
        var jumlah = $('#jumlah').val();
        
        $.ajax({
                type : "POST",
                data : {
                    nomor_invoice:nomor_invoice,
                    tanggal_masuk:tanggal_masuk,
                    selectBarang:selectBarang,
                    jumlah:jumlah,
                },
                url  : '<?=  base_url('transaksi/saveData/masuk') ?>',
                dataType : 'json',
                success : function(res) {
                    // console.log(res);
                    $('#message').html(res.message)
                    if (res.message == '') {
                        showData();
                        $('#tanggal_masuk').val("");
                        // console.log($('#selectBarang option'));
                        $('#selectSatuan').val("");
                        // $('#selectSatuan').selectpicker('refresh');
                        $('#jumlah').val('');
                        fieldForm();
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
            url  : '<?= base_url('transaksi/getIdData/masuk') ?>',
            dataType : 'json',
            success : function (id) {
                // console.log(id);
                $('#editId').val(id.id);
                $('#nomor_invoice ').val(id.nomor_invoice);
                $('#tanggal_masuk').val(id.tanggal.split('-').reverse().join('/'));
                // $("#selectBarang").val(1);
                // $('#selectSatuan').val(id.unit_id);
                $('#jumlah').val(id.total);
            }
        });
    }

      // $('#simpaubahDatanData').on('click', function () {
        function editDataSubmit() {
            var id = $("[name='editId']").val();
            var nomor_invoice = $('#nomor_invoice').val();
            var tanggal_masuk = $('#tanggal_masuk').val();
            var selectBarang  = $('#selectBarang').val();
            var selectSatuan = $('#selectSatuan').val();
            var jumlah = $('#jumlah').val();
        
            // console.log(id);
            $.ajax({
                type : 'POST',
                data : {
                    id:id,
                    nomor_invoice:nomor_invoice,
                    tanggal_masuk:tanggal_masuk,
                    selectBarang:selectBarang,
                    selectSatuan:selectSatuan,
                    jumlah:jumlah,
                },
                url : '<?= base_url('transaksi/updateData/masuk') ?>',
                dataType : 'json',
                success : function(res) {
                    // console.log(res.message);
                    $('#message').html(res.message)
                    if (res.message == '') {
                        showData();
                        $('#tanggal_masuk').val("");
                        $('#selectBarang').val("");
                        $('#selectSatuan').val(''); 
                        $('#jumlah').val('');

                        fieldForm();
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
                    url  : '<?= base_url('transaksi/deleteData/masuk') ?>',
                    dataType : 'json',
                    success : function() {
                    
                    u = $('#dataTable');
                    u.fnClearTable();
                    u.fnDraw();
                    u.fnDestroy();
                        showData();
                        fieldForm();
                    }
                });
            }
        }
     
  

</script>