
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div> -->

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <ol class="breadcrumb">
                    <li class="active">
                        <h2><i class="material-icons">home</i>  Dashboard</h2>
                    </li>
                </ol>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-blue hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">work</i>
                        </div>
                        <div class="content">
                            <div class="text">BARANG</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"><?= $sum_product['jumlah'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">vertical_align_bottom</i>
                        </div>
                        <div class="content">
                            <div class="text">PEMASUKAN</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"><?= $sum_masuk['jumlah'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">vertical_align_top</i>
                        </div>
                        <div class="content">
                            <div class="text">PENGELUARAN</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"><?= $sum_keluar['jumlah'] ?></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-amber hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">email</i>
                        </div>
                        <div class="content">
                            <div class="text">INVOICE</div>
                            <div class="number"><?= $sum_invoice['jumlah'] ?></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">access_time</i>
                        </div>
                        <div class="content">
                            <div class="text">WAKTU</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20">
                                                    <!-- Menampilkan Jam (Aktif) -->
                                <div id="clock"></div>
                                    <script type="text/javascript">
                                    function showTime() {
                                        var a_p = "";
                                        var today = new Date();
                                        var curr_hour = today.getHours();
                                        var curr_minute = today.getMinutes();
                                        var curr_second = today.getSeconds();
                                        if (curr_hour < 12) {
                                            a_p = "AM";
                                        } else {
                                            a_p = "PM";
                                        }
                                        if (curr_hour == 0) {
                                            curr_hour = 12;
                                        }
                                        if (curr_hour > 12) {
                                            curr_hour = curr_hour - 12;
                                        }
                                        curr_hour = checkTime(curr_hour);
                                        curr_minute = checkTime(curr_minute);
                                        curr_second = checkTime(curr_second);
                                    document.getElementById('clock').innerHTML=curr_hour + ":" + curr_minute + ":" + curr_second + " " + a_p;
                                        }

                                    function checkTime(i) {
                                        if (i < 10) {
                                            i = "0" + i;
                                        }
                                        return i;
                                    }
                                    setInterval(showTime, 500);
                                    </script>
                                    <br>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-purple hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">perm_contact_calendar</i>
                        </div>
                        <div class="content">
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20">
                                <script type='text/javascript'>
                                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                                    var date = new Date();
                                    var day = date.getDate();
                                    var month = date.getMonth();
                                    var thisDay = date.getDay(),
                                        thisDay = myDays[thisDay];
                                    var yy = date.getYear();
                                    var year = (yy < 1000) ? yy + 1900 : yy;
                                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
