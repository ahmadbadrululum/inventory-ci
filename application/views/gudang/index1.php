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
                            <div class="header-dropdown m-r--5">
                            <button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#form" onclick="submit('addbtn')"><i class="material-icons" style="color:white">add</i><span>tambah barang</span></button>
                            </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
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
                                '<td><button type="button" class="btn btn-primary waves-effect m-r-20" data-toggle="modal" data-target="#form" onclick="submit('+data[i].id+')"><i class="material-icons" style="color:white">create</i><span></span></button><a class="btn btn-danger waves-effect m-r-20" onclick="deleteData('+data[i].id+')"><i class="material-icons" style="color:white">delete</i><span></span></a></td>'+
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
            $.ajax({
                type : 'POST',
                data : {
                    product_code:product_code,
                    product_name:product_name,
                },
                url  : '<?= base_url('product/saveData') ?>',
                dataType : 'json',
                success : function(res) {
                //    console.log(res);
                    $('#message').html(res.message)
                    if (res.message == '') {
                        $('#form').modal('hide');
                        showData();
                        $('#product_code').val('');
                        $('#product_name').val('');
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
                $('#product_code').val('');
                $('#product_name').val('');
            }else{
                $('#saveDatabtn').hide();
                $('#editDatabtn').show();
                $.ajax({
                    type : 'POST',
                    data : {id:action},
                    url  : '<?= base_url('product/getId') ?>',
                    dataType : 'json',
                    success : function (id) {
                        // console.log(id);
                        $('#editId').val(id.id);
                        $('#product_code').val(id.code_product);
                        $('#product_name').val(id.name_product);
                    }
                });
            }
        }



    // $('#simpaubahDatanData').on('click', function () {
        function editDataSubmit() {
            var id = $("[name='editId']").val();
            var product_code = $('#product_code').val();
            var product_name = $('#product_name').val();
            // console.log(id);
            $.ajax({
                type : 'POST',
                data : {
                    id:id,
                    product_code:product_code,
                    product_name:product_name,
                },
                url : '<?= base_url('product/updateData') ?>',
                dataType : 'json',
                success : function(res) {
                    $('#message').html(res.message)
                    if (res.message == '') {
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
                    success : function() {
                        location.reload();
                        showData();
                    }
                });
            }
        }
        
    </script>