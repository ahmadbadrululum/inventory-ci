<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a href="javascript:void(0);">Admin<b>BSB</b></a>
            <small>Admin BootStrap Based - Material Design</small>
        </div>
        <div class="card">
            <div class="body">
                <div class="msg">Sign in to start your session</div>
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
                        <button class="btn btn-block bg-pink waves-effect" onclick="submitLogin()">SIGN IN</button>
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
    function submitLogin() {
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
            // dataType: 'json',
                success : function(res) {
                    if (res == 'ok') {
                        // alert('login success');
                        document.location='<?= base_url() ?>';
                    }else{
                        alert('gagal login');
                    }
                }
            });        
        }
    }


</script>
