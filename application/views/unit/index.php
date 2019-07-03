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
                        <i class="material-icons">library_books</i>  Satuan
                    </li>
                </ol>
            </div>
            <!-- Basic Examples -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                                <h2>DATA SATUAN</h2>
                            <div class="header-dropdown" style="margin-right:-20px; margin-top:-10px;">
                                <button type="button" title="tambah" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#form" onclick="submit('addbtn')"><i class="material-icons" style="color:white">add</i><span>tambah satuan</span></button>
                            </div>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th width="10%">No</th>
                                            <th width="70%">Nama satuan</th>
                                            <th width="30%">Action</th>
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
                        <h4 class="modal-title" id="defaultModalLabel">Tambah satuan</h4>
                    </div>
                    <div class="modal-body">
                        <center><p id="message"></p></center>
                        <form class="form-horizontal">
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email_address_2">Nama Satuan</label>
                                </div>
                                <div class="col-lg-9 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                        <input type="text" name="unit_name" id="unit_name" class="form-control" placeholder="Nama satuan" />
                                        <input type="hidden" name="editId" id="editId" value="">    
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                            <button type="submit" id="saveDatabtn" onclick="saveDataSubmit()" class="btn btn-success waves-effect">Simpan</button> 
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
                type : "POST",
                url  : '<?= base_url('unit/showData') ?>',
                dataType : 'json',
                success : function (data) {
                    var baris = '';
                    var no = 1;
                    for (let i = 0; i < data.length; i++) {
                        baris += 
                            '<tr>'+
                                '<td>'+ no++ +'</td>' +
                                '<td>'+ data[i].unit_name  +'</td>' +
                                '<td><button type="button" title="edit" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#form" onclick="submit('+data[i].id+')"><i class="material-icons" style="color:white">create</i><span></span></button> <a class="btn btn-danger  waves-effect m-r-20" title="hapus" onclick="deleteData('+data[i].id+')"><i class="material-icons" style="color:white">delete</i><span></span></a></td>'+
                            '</tr>';
                    }
                    $('#dataTable').html(baris);
                }
            });
        }

        // $('#saveDatabtn').on('click', function () {
        function saveDataSubmit() {
            var unit_name = $('#unit_name').val();
            $.ajax({
                type : "POST",
                data : {
                    unit_name:unit_name,
                },
                url  : '<?= base_url('unit/saveData') ?>',
                dataType : 'json',
                success : function(res) {
                    $('#message').empty();    
                    $('#message').append('<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+ res.message +'</div>');
                    if (res.message == '') {
                        $('#form').modal('hide');
                        showData();
                        $('#message').empty();    
                        $('#unit_name').val('');
                    }
                }                
            });
        }
        // });

        function submit(action) {
            if (action == 'addbtn') {
                // console.log('oke');
                $('#saveDatabtn').show();
                $('#editDatabtn').hide();
                $('#unit_name').val('');
            }else{
                $('#saveDatabtn').hide();
                $('#editDatabtn').show();
                $.ajax({
                    type : "POST",
                    data : {id:action},
                    url  : '<?= base_url('unit/getId') ?>',
                    dataType : 'json',
                    success : function (id) {
                        $('#editId').val(id.id);
                        $('#unit_name').val(id.unit_name);
                    }
                });
            }
        }



    // $('#simpaubahDatanData').on('click', function () {
        function editDataSubmit() {
            var id = $("[name='editId']").val();
            var unit_name = $('#unit_name').val();
            // console.log(id);
            $.ajax({
                type : "POST",
                data : {
                    id:id,
                    unit_name:unit_name,
                },
                url : '<?= base_url('unit/updateData') ?>',
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
                    type : "POST",
                    data : {id:id},
                    url  : '<?= base_url('unit/deleteData') ?>',
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