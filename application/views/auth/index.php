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
                    <i class="material-icons">library_books</i>  Users
                </li>
            </ol>
        </div>
        <!-- Basic Examples -->
        <div class="row clearfix">
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <div class="card">
                    <div class="header">
                        <h2><strong>DATA USERS</strong></h2>
                        <ul class="header-dropdown"  style="margin-right:-20px; margin-top:-10px;">
                                <button type="button" id="refresh" class="btn btn-info waves-effect m-r-20" onclick="refreshPage()"><i class="material-icons" style="color:white">refresh</i><span>refresh</span></button>
                            </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th width="5%">No</th>
                                        <th width="20%">Username</th>
                                        <th width="15%">Role</th>
                                        <!-- <th width="15%">Status</th> -->
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>

                                <tbody id="dataTable">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
        <!-- <div class="row clearfix" > -->
            <div id="register" class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                <div class="signup-box">
                    <div class="card">
                        <div class="body">
                            <form>
                                <div class="msg"><strong> Register a new membership</strong></div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" required="" autofocus="" aria-required="true">
                                        <input type="hidden" name="editid" id="editid">
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <?php if($_SESSION['role'] == 'super_admin' || $_SESSION['role'] == 'ceo') { ?>
                                        <div class="form-group">
                                            <select class="form-control" id="role">
                                                <option value="">--pilih peran--</option>
                                                <option value="super_admin">Super admin</option>
                                                <option value="ceo">ceo</option>
                                                <option value="cfo">manajemen</option>
                                                <option value="admin">admin</option>
                                            </select>
                                        </div>
                                    <?php }elseif ($_SESSION['role'] == 'cfo') { ?>
                                        <div class="form-group">
                                            <select class="form-control" id="role">
                                                <option value="">--pilih peran--</option>
                                                <option value="cfo">manajemen</option>
                                                <option value="admin">admin</option>
                                            </select>
                                        </div>
                                    <?php } ?>
                                    
                                </div>
                                <div style="display:none" class="input-group" id="status">
                                    <span class="input-group-addon">
                                        <i class="material-icons">person</i>
                                    </span>
                                    <div class="form-group">
                                        <select class="form-control" id="role">
                                            <option value="">--pilih peran--</option>
                                            <option value="aktif">Aktif</option>
                                            <option value="tidak_aktif">Tidak aktif</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="password" id="password" minlength="6" placeholder="Password" required="" aria-required="true">
                                    </div>
                                </div>
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="material-icons">lock</i>
                                    </span>
                                    <div class="form-line">
                                        <input type="password" class="form-control" name="password_confirm" id="password_confirm" minlength="6" placeholder="Confirm Password" required="" aria-required="true">
                                    </div>
                                </div>
                                <button class="btn btn-block btn-lg bg-green waves-effect" type="button" id="btnSave" class="btn btn-success waves-effect m-r-20" onclick="submitSave()">SIMPAN</button>
                                <button  style="display:none;" class="btn btn-block btn-lg bg-blue waves-effect" type="button" id="btnEdit" onclick="editDataSubmit()">EDIT</button>
                            </form>
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
    
    showData();
    function showData() {
        var session_role = '<?= $_SESSION['role'] ?>';
        $.ajax({
            type : "POST",
            url  : '<?= base_url('auth/showData/'.$_SESSION['role']) ?>',
            dataType : 'json',
            success : function (data) {
                var baris = '';
                var no = 1;
                for (let i = 0; i < data.length; i++) { 
                    
                    baris += 
                        '<tr>'+
                            '<td>'+ no++ +'</td>' +
                            '<td>'+ data[i].username   +'</td>' +
                            '<td>'+ data[i].role   +'</td>' +
                            '<td><button type="button" title="edit" class="btn btn-warning waves-effect m-r-20" data-target="#form" id="submit" onclick="submit('+data[i].id+')"><i class="material-icons" style="color:white">create</i><span></span></button><button class="btn btn-danger waves-effect m-r-20" title="hapus" onclick="deleteData('+data[i].id+')"><i class="material-icons" style="color:white">delete</i><span></span></button></td>'+
                        '</tr>';
                }
                $('#dataTable').html(baris);
            }
        });
    }

    
  // $('#saveDatabtn').on('click', function () {
    function submitSave() {
        var username = $('#username').val();
        var role =     $('#role').val();
        var password = $('#password').val();
        var password_confirm = $('#password_confirm').val();

        if (username == '') 
            alert ("Please enter username"); 
        else if (role == '') 
            alert ("Please enter peran"); 
        else if (password == '') 
            alert ("Please enter Password"); 
        else if (password_confirm == '') 
            alert ("Please enter role"); 
        else if (password != password_confirm) { 
            alert ("\nPassword did not match: Please try again...") 
            return false; 
        }
        else{ 
            $.ajax({
                type : "POST",
                data : {username:username, role:role,password:password},
                url  : '<?= base_url('auth/register') ?>',
                dataType : 'json',
                success : function(res) {
                    // console.log(res.message);
                    // $('#message').empty();    
                    // $('#message').append('<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+ res.message +'</div>');
                    if (res.message == 'success') {
                        showData();
                        $('#username').val('');
                        $('#role').val('');
                        $('#password').val('');
                        $('#password_confirm').val('');
                        // $('#message').empty();    
                        // $('#unit_name').val('');
                    }
                }                
            });
        } 
    }
        // });


    function submit(action) {
        $('#btnSave').hide();
        $('#btnEdit').show();
        $.ajax({
            type : "POST",
            data : {id:action},
            url  : '<?= base_url('auth/getId') ?>',
            dataType : 'json',
            success : function (id) {
                $('#username').val(id.username);
                $('#role').val(id.role);
                $('#editid').val(id.id);
                // $('#password').val('');
                // $('#password_confirm').val('');
            }
        });
    }

    function editDataSubmit() {
        var id = $("#editid").val();
        var username = $('#username').val();
        var role =     $('#role').val();
        var password = $('#password').val();
        var password_confirm = $('#password_confirm').val();
        console.log(id);
        
        $.ajax({
            type : 'POST',
            data : {id:id, username:username, role:role,password:password},
            url : '<?= base_url('auth/updateUser') ?>',
            dataType : 'json',
            success : function(res) {
                // $('#message').empty();    
                // $('#message').append('<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>'+ res.message +'</div>');
                if (res.message == 'success') {
                    showData();
                    $('#username').val('');
                    $('#role').val('');
                    $('#password').val('');
                    $('#password_confirm').val('');
                    $('#btnSave').show();
                    $('#btnEdit').hide();
                    // $('#message').empty();    
                    // $('#unit_name').val('');
                }
            }            
        });
    }

    function deleteData(id){
        var deleteconfirm = confirm('apakah yakin menghapus ?');
        if (deleteconfirm) {
            $.ajax({
                type : 'POST',
                data : {id:id},
                url  : '<?= base_url('auth/deleteData') ?>',
                dataType : 'json',
                success : function(res) {
                    if (res.message == 'success') {
                        showData();
                    }
                }
            });
        }
    }


</script>