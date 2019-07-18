<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);"><img  style="width:60%" src="http://members.h-seo.com/uploads/company/logo.png" alt=""></a>
        </div>
        <div class="card">
            <div class="body">
                <div class="msg">LOGIN</div>
                <div class="row clearfix" id="message"></div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">person</i>
                    </span>
                    <div class="form-line">
                        <input type="text" class="form-control" id="username" placeholder="Username">
                    </div>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">
                        <i class="material-icons">lock</i>
                    </span>
                    <div class="form-line">
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <!-- <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                        <label for="rememberme">Remember Me</label> -->
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-green waves-effect" id="btnlogin">login</button>
                    </div>
                </div>
                <!-- <div class="row m-t-15 m-b--20">
                    <div class="col-xs-6">
                        <a href="sign-up.html">Register Now!</a>
                    </div>
                    <div class="col-xs-6 align-right">
                        <a href="forgot-password.html">Forgot Password?</a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    
<script>
    $(document).ready(function() {
        $('#username, #password').keypress(function(e){
            if(e.keyCode==13)
            $('#btnlogin').click();
        });
    });

    // function submitLogin(e) {
    $('#btnlogin').click(function () {
        var username = $('#username').val();
        var password = $('#password').val();
        if (username == '') { alert('username kosong'); }
        else if(password == '') { alert('password kosong'); }
        else{
            $.ajax({
            method: 'POST',
            data  : {   username : username, 
                        password : password },
            url   : '<?= base_url('auth/loginSubmit') ?>',
                success : function(res) {
                    if (res == 'ok') {
                        document.location='<?= base_url() ?>';
                    }else{
                        $('#message').empty();    
                        $('#message').append('<div class="alert alert-danger alert-dismissible" role="alert"> <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>Username atau password salah</div>');
                    }
                }
            });        
        }
    });
        

</script>
