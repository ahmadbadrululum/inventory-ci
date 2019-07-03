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
                        <i class="material-icons">library_books</i> Barang
                    </li>
                </ol>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                                <h2>DATA BARANG</h2>
                            <div class="header-dropdown" style="margin-right:-20px; margin-top:-10px;">
                            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#form" onclick="submit('addbtn')"><i class="material-icons" style="color:white">add</i><span>tambah barang</span></button>
                            </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th  width="5%">No</th>
                                            <th  width="25%">Kode Barang</th>
                                            <th  width="25%">Nama Barang</th>
                                            <th  width="25%">Satuan</th>
                                            <th  width="15%">Action</th>
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

        <!-- Default Size -->
        <div class="modal fade" id="form" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">Tambah Barang</h4>
                    </div>
                    <div class="modal-body">
                        <center><p id="message"></p></center>
                        <form class="form-horizontal">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Kode barang</label>
                                </div>
                                <div class="col-lg-9 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" required name="product_code" id="product_code" class="form-control" placeholder="kode barang" />
                                            <input type="hidden" name="editId" id="editId" value="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Nama Barang</label>
                                </div>
                                <div class="col-lg-9 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Nama barang" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Satuan</label>
                                </div>
                                <div class="col-lg-9 col-md-10 col-sm-8 col-xs-7">
                                    <select class="form-control" id="select_satuan" style="margin-left:-15px;">
                                        <option value="">--Pilih satuan--</option>
                                        <?php foreach ($unit as $unit) { ?>
                                            <option value="<?= $unit->id ?>"><?= $unit->unit_name ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                            <button type="button" id="saveDatabtn" onclick="saveDataSubmit()" class="btn btn-success waves-effect">Simpan</button> 
                            <button type="button" id="editDatabtn" onclick="editDataSubmit()" class="btn btn-info waves-effect">Ubah</button> 
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Close</button>
                            
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        showData();
        function showData() {
            $.ajax({
                type : 'POST',
                url  : '<?= base_url('product/showData') ?>',
                dataType : 'json',
                success : function (data) {
                    var baris = '';
                    var no = 1;
                    for (let i = 0; i < data.length; i++) {
                        baris += 
                            '<tr>'+
                                '<td>'+ no++ +'</td>' +
                                '<td>'+ data[i].code_product +'</td>' +
                                '<td>'+ data[i].name_product  +'</td>' +
                                '<td>'+ data[i].unit_name  +'</td>' +
                                '<td><button title="edit" type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#form" onclick="submit('+data[i].id+')"><i class="material-icons" style="color:white">create</i><span></span></button><a title="hapus" class="btn btn-danger waves-effect m-r-20" onclick="deleteData('+data[i].id+')"><i class="material-icons" style="color:white">delete</i><span></span></a></td>'+
                            '</tr>';
                    }
                    $('#dataTable').html(baris);
                }
            });
        }

        // $('#saveDatabtn').on('click', function () {
        function saveDataSubmit() {
            var product_code = $('#product_code').val();
            var product_name = $('#product_name').val();
            var select_satuan = $('#select_satuan').val();
            $.ajax({
                type : 'POST',
                data : {
                    product_code:product_code,
                    product_name:product_name,
                    select_satuan:select_satuan,
                },
                url  : '<?= base_url('product/saveData') ?>',
                dataType : 'json',
                success : function(res) {
                    $('#message').empty();    
                    $('#message').append('<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+ res.message +'</div>');
                    if (res.message == '') {
                        $('#form').modal('hide');
                        showData();
                        $('#message').empty();    
                        $('#product_code').val('');
                        $('#product_name').val('');
                        $('#select_satuan').val('');
                    }
                }                
            });
        }
        // });

        function submit(action) {
            if (action == 'addbtn') {
                $('#saveDatabtn').show();
                $('#editDatabtn').hide();
                $('#product_code').val('');
                $('#product_name').val('');
                $('#select_satuan').val('');
            }else{
                $('#saveDatabtn').hide();
                $('#editDatabtn').show();
                $.ajax({
                    type : 'POST',
                    data : {id:action},
                    url  : '<?= base_url('product/getId') ?>',
                    dataType : 'json',
                    success : function (id) {
                        $('#editId').val(id.id);
                        $('#product_code').val(id.code_product);
                        $('#product_name').val(id.name_product);
                        $('#select_satuan').val(id.unit_product_id);
                    }
                });
            }
        }

    // $('#simpaubahDatanData').on('click', function () {
        function editDataSubmit() {
            var id = $("[name='editId']").val();
            var product_code = $('#product_code').val();
            var product_name = $('#product_name').val();
            var select_satuan = $('#select_satuan').val();
            $.ajax({
                type : 'POST',
                data : {
                    id:id,
                    product_code:product_code,
                    product_name:product_name,
                    select_satuan:select_satuan,
                },
                url : '<?= base_url('product/updateData') ?>',
                dataType : 'json',
                success : function(res) {
                    $('#message').empty();    
                    $('#message').append('<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+ res.message +'</div>');
                    if (res.message == '') {
                        $('#message').empty();
                        $('#form').modal('hide');
                        showData();
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
                    url  : '<?= base_url('product/deleteData') ?>',
                    dataType : 'json',
                    success : function(res) {
                        if (res.message == '') {
                        showData();
                        }
                    }
                });
            }
        }
        
    </script>