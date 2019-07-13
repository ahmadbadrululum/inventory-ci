 
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url('adminbsb/images/user.png') ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['username'] ?></div>
                    <div class="email"><?php echo $_SESSION['role']; ?></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?= base_url('dashboard') ?>">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Master</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?= base_url('unit') ?>">Satuan</a>
                            </li>
                            <li>
                                <a href="<?= base_url('product') ?>">Barang</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">swap_horiz</i>
                            <span>Transaksi</span>
                        </a>
                        <ul class="ml-menu">
                            <li>
                                <a href="<?= base_url('transaksi/home/masuk') ?>">Masuk</a>
                            </li>
                            <li>
                                <a href="<?= base_url('transaksi/home/keluar') ?>">Keluar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?= base_url('gudang') ?>">
                            <i class="material-icons">layers</i>
                            <span>Gudang</span>
                        </a>
                    </li>
                    <!-- <li class="header">LABELS</li> -->
                    <li>
                        <a href="<?= base_url('invoice') ?>">
                            <i class="material-icons">library_books</i>
                            <span>Invoice</span>
                        </a>
                    </li>
                    <?php if($_SESSION['role'] != 'admin') { ?>
                    <li>
                        <a href="<?= base_url('auth') ?>">
                            <i class="material-icons">people</i>
                            <span>Users</span>
                        </a>
                    </li>                        
                    <?php } ?>
                    <li>
                        <a href="javascript:void(0);" id="signout" class=" waves-effect waves-block">
                            <i class="material-icons">exit_to_app</i>
                            <span>Keluar</span>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2019 <a href="javascript:void(0);">Developer - Hseo Tekno Media</a>.
                </div>
                <div class="version">
                    <b>Version: </b> beta
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>


    <script>
    $( "document" ).on( "click", "ul.list li", function() {
        $("ul.list li").removeClass("active"); //Remove any "active" class
            $(this).addClass("active"); //Add "active" class to selected tab
            // $(".tab_content").hide(); //Hide all tab content
            // var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
            // $(activeTab).fadeIn(); //Fade in the active content
            // return false; 
    });

    $('#signout').click(function () {
        $.ajax({
            method: 'POST',
            url   : '<?= base_url('auth/logout') ?>',
            success : function(res) {
                document.location= '<?php echo base_url('auth/login') ?>';
                
            }
        });
    });
    </script>