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
                        <i class="material-icons">library_books</i> Invoice
                    </li>
                </ol>
            </div>

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>BUAT INVOICE</strong></h2>
                            <ul class="header-dropdown"  style=" margin-top:-10px;">
                                <button type="button" id="refresh" class="btn btn-info waves-effect" onclick="refreshPage()"><i class="material-icons" style="color:white">refresh</i><span>refresh</span></button>
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
                                                <input readonly type="text" id="nomor_invoice" name="nomor_invoice" placeholder="<?php echo 'INV-0001/'.date('d/m/Y');?>" class="form-control">
                                                <input  id="editId" name="editId" type="hidden">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                        <h2 class="card-inside-title">Keterangan Rincian</h2>
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input type="text" id="keterangan" name="keterangan" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-3 col-sm-3 col-xs-6">
                                        <button style="margin-top:15px;" type="button" id="btnSave" class="btn btn-success waves-effect m-r-20" onclick="submitSave()"><i class="material-icons" style="color:white">add</i><span>tambah data</span></button>
                                        <button style="display:none; margin-top:15px;" type="button" id="btnEdit" onclick="editDataSubmit()" class="btn btn-primary waves-effect m-r-20"><i class="material-icons" style="color:white">create</i><span> edit data</span></button>
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
                                <h2><strong>DATA INVOICE</strong></h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th width="5%">No</th>
                                            <th width="20%">Nomor Invoice</th>
                                            <th width="30%">Keterangan</th>
                                            <th width="15%">Status</th>
                                            <th width="15%">Action</th>
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
// $(document).ready(function() {

    showData();
    function showData() {
            $.ajax({
                type : "POST",
                url  : '<?= base_url('invoice/showData') ?>',
                dataType : 'json',
                success : function (data) {
                    var baris = '';
                    var no = 1;
                    for (let i = 0; i < data.length; i++) { 
                        if (data[i].status_2 == 0) { var button = '<span class="label label-warning">Belum Disetujui</span>' }
                        else if(data[i].status_2 == 1){ var button = '<span class="label label-success">Disetujui</span>' }
                        else{ var button = '<span class="label label-danger">Tidak Disetujui</span>' }
                        baris += 
                            '<tr>'+
                                '<td>'+ no++ +'</td>' +
                                '<td>'+ data[i].no_invoice   +'</td>' +
                                '<td>'+ data[i].keterangan   +'</td>' +
                                '<td>'+ button +'</td>' +
                                '<td><a title="tambah rincian" class="btn btn-info waves-effect m-r-5" href="<?= base_url('invoice/detail/') ?>'+data[i].id+'"><i class="material-icons" style="color:white">playlist_add</i><span></span></a><button type="button" title="edit" class="btn btn-warning waves-effect m-r-5" data-target="#form" id="submit" onclick="submit('+data[i].id+')"><i class="material-icons" style="color:white">create</i><span></span></button><button class="btn btn-danger waves-effect m-r-5" title="hapus" onclick="deleteData('+data[i].id+')"><i class="material-icons" style="color:white">delete</i><span></span></button></td>'+
                            '</tr>';
                    }
                    $('#dataTable').html(baris);
                }
            });
    }

    fieldForm();
    function fieldForm(){
        $.ajax({
            type : "POST",
            url : '<?= base_url('invoice/getId') ?>',
            dataType : 'text',
            success : function (res) {
                if (res == 0) {
                    $('#nomor_invoice').val('<?php echo 'INV-'.date('d/m/Y').'-001';?>');
                }else{
                    var tambah = (+res + +1);
                    if(tambah < 10){
                        $('#nomor_invoice').val('<?php echo 'INV-'.date('d/m/Y').'-00';?>'+tambah);
                    }else if(tambah < 100){
                        $('#nomor_invoice').val('<?php echo 'INV-'.date('d/m/Y').'-0';?>'+tambah);
                    }else if(tambah < 1000){
                        $('#nomor_invoice').val('<?php echo 'INV-'.date('d/m/Y').'-';?>'+tambah);
                    }
                }
            }
        });    
    }  


    function submitSave() {
        var nomor_invoice   = $('#nomor_invoice').val();
        var keterangan   = $('#keterangan').val();
        $.ajax({
            type : "POST",
            data : {
                nomor_invoice:nomor_invoice,
                keterangan:keterangan,
            },
            url  : '<?=  base_url('invoice/saveData') ?>',
            dataType : 'json',
            success : function(res) {
                $('#message').empty();    
                $('#message').append('<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+ res.message +'</div>');
                if (res.message == '') {
                    showData();
                    $('#keterangan').val("");
                    fieldForm();
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
            url  : '<?= base_url('invoice/getIdData') ?>',
            dataType : 'json',
            success : function (id) {
                $('#message').empty();                    
                $('#editId').val(id.id);
                $('#nomor_invoice ').val(id.no_invoice);
                $("#keterangan").val(id.keterangan);
            }
        });
    }


    // $('#simpaubahDatanData').on('click', function () {
    function editDataSubmit() {
        var id = $("#editId").val();
        var nomor_invoice   = $('#nomor_invoice').val();
        var keterangan   = $('#keterangan').val();
        var jumlah = $('#jumlah').val();
        $.ajax({
            type : 'POST',
            data : {
                id:id,
                nomor_invoice:nomor_invoice,
                keterangan:keterangan,
            },
            url : '<?= base_url('invoice/update') ?>',
            dataType : 'json',
            success : function(res) {
                $('#message').empty();    
                $('#message').append('<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+ res.message +'</div>');
                if (res.message == '') {
                    showData();
                    $('#keterangan').val("");
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
                url  : '<?= base_url('invoice/delete') ?>',
                dataType : 'json',
                success : function(res) {
                    if (res.message == '') {
                        showData();
                        fieldForm();
                    }
                }
            });
        }
    }
    

    function refreshPage() {
        location.reload();
    }
</script>
