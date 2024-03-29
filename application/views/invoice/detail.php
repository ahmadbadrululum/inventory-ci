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
                    <li class="active">
                        <i class="material-icons">library_books</i> detail
                    </li>
                </ol>
            </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2> <strong>Rincian Belanja</strong></h2>
                        <ul class="header-dropdown"  style="margin-right:-20px; margin-top:-10px;">
                            <button type="button" id="refresh" class="btn btn-info waves-effect" onclick="refreshPage()"><i class="material-icons" style="color:white">refresh</i><span>refresh</span></button>
                            <a href="<?= base_url('invoice') ?>" class="btn btn-warning waves-effect m-r-20"><i class="material-icons" style="color:white">reply</i><span>kembali</span></a>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>                    
                                        <th class="text-right">Nomor invoice</th>
                                        <th colspan="6"><strong><?= $invoice['no_invoice'] ?></strong><script>
                                        
                                        </script></th>
                                    </tr>
                                    <tr>
                                        <th class="text-right">Keterangan</th>
                                        <th colspan="6"><strong><?= $invoice['keterangan'] ?></strong></th>
                                    </tr>
                                    <tr>
                                        <th width="11%">No</th>
                                        <th width="20%">Nama barang</th>
                                        <th width="15%">Harga satuan</th>
                                        <th width="10%">Quantity</th>
                                        <th width="10%">Satuan</th>
                                        <th width="20%">Harga total</th>
                                        <th width="5%">Action</th>
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
//  var angka = 15000000;
//  var reverse = angka.toString().split('').reverse().join(''),
//  ribuan = reverse.match(/\d{1,3}/g);
//  ribuan = ribuan.join('.').split('').reverse().join('');
//  document.write(ribuan);

 
    function refreshPage() {
        location.reload();
    }

    load_data();
    
    function load_data(){
        var session_role = '<?= $_SESSION['role'] ?>';
        $.ajax({
        method: 'POST',
        url   : '<?= base_url('invoice/detailShow/'.$id) ?>',
        dataType: 'json',
        success : function(res) {
            if(res.invoice.catatan == null){res.invoice.catatan = '' }
            if(res.sum.total_akhir == null){ var total_akhir = res.sum.total_akhir = 'Rp. -' }
            else{
                var reverse = res.sum.total_akhir.toString().split('').reverse().join(''),
                total_akhir = reverse.match(/\d{1,3}/g);
                total_akhir = total_akhir.join('.').split('').reverse().join('');
            }
            // ---- admin1
            if (session_role === 'cfo') {
                var button2 = '';
                if (res.invoice.status_1 == 0) { var button1 = '<button id="cek_setuju" class="btn btn-warning btn-lg" style="margin-left:20px;">Belum setuju</button>' }
                else if(res.invoice.status_1 == 1){ var button1 = '<button id="cek_setuju" class="btn btn-success btn-lg" style="margin-left:20px;">Setuju</button></div>'}
                else { var button1 = '<button id="cek_setuju" class="btn btn-danger btn-lg" style="margin-left:20px;">Tidak Setuju</button></div>'}

                if (res.invoice.status_2 == 0) { var button2 = '<button id="cek_setuju2" class="btn btn-warning btn-lg" style="margin-left:20px;">Belum setuju</button>' }
                else if(res.invoice.status_2 == 1){ var button2 = '<button id="cek_setuju2" class="btn btn-success btn-lg" style="margin-left:20px;">Setuju</button></div>'}
                else { var button2 = '<button id="cek_setuju2" class="btn btn-danger btn-lg" style="margin-left:20px;">Tidak Setuju</button></div>'}
            }else if(session_role == 'admin'){
                if (res.invoice.status_1 == 0) { var button1 =      '<h3><span class="label label-warning">Belum disetujui</span></h3>' }
                else if(res.invoice.status_1 == 1){ var button1 =   '<h3><span class="label label-success">Disetujui</span></h3>'}
                else { var button1 = '<h3><span class="label label-danger">Tidak Disetujui</span></h3>'}
                // document.getElementById("catatan").disabled = true;
                if (res.invoice.status_2 == 0) { var button2 =      '<h3><span class="label label-warning">Belum disetujui</span></h3>' }
                else if(res.invoice.status_2 == 1){ var button2 =   '<h3><span class="label label-success">Disetujui</span></h3>'}
                else { var button2 =                                '<h3><span class="label label-danger">Tidak disetujui</span></h3>'}
            }
            else{
                if (res.invoice.status_1 == 0) { var button1 = '<button id="cek_setuju" class="btn btn-warning btn-lg" style="margin-left:20px;">Belum setuju</button>' }
                else if(res.invoice.status_1 == 1){ var button1 = '<button id="cek_setuju" class="btn btn-success btn-lg" style="margin-left:20px;">Setuju</button></div>'}
                else { var button1 = '<button id="cek_setuju" class="btn btn-danger btn-lg" style="margin-left:20px;">Tidak Setuju</button></div>'}

                if (res.invoice.status_2 == 0) { var button2 = '<button id="cek_setuju2" class="btn btn-warning btn-lg" style="margin-left:20px;">Belum setuju</button>' }
                else if(res.invoice.status_2 == 1){ var button2 = '<button id="cek_setuju2" class="btn btn-success btn-lg" style="margin-left:20px;">Setuju</button></div>'}
                else { var button2 = '<button id="cek_setuju2" class="btn btn-danger btn-lg" style="margin-left:20px;">Tidak Setuju</button></div>'}
            }
            // ==== admin2
            
            var html = ' <tr>';
                html += ' <td>#</td>';
                html += ' <td id="nama_barang" contenteditable></td>';
                html += ' <td name="harga" id="harga" contenteditable></td>';
                html += ' <td name="qty" id="qty" contenteditable></td>';
                html += ' <td id="satuan" contenteditable></td>';
                html += ' <td id="total"></td>';
                html += ' <td><button type="submit" name="btn_add" id="btn_add" class="btn btn-success" ><i class="material-icons" style="color:white">add</i><span>tambah</span></button></td>';
                html += ' </tr>';
            var no = 1;
            for (let i = 0; i < res.data.length; i++) {
                // var reverse = res.data[i].harga.toString().split('').reverse().join(''),
                // harga = reverse.match(/\d{1,3}/g);
                // harga = harga.join('.').split('').reverse().join('');

                var reverse = res.data[i].total.toString().split('').reverse().join(''),
                total = reverse.match(/\d{1,3}/g);
                total = total.join('.').split('').reverse().join('');

                html += '<tr value="'+i+'">';
                html += '<td>'+ no++ +'</td>';
                html += '<td class="table_data" data-row_id="'+res.data[i].id+'" data-column_name="nama_barang" contenteditable>'+res.data[i].nama_barang+'</td>';
                html += '<td class="table_data" data-row_id="'+res.data[i].id+'" data-column_name="harga" contenteditable>'+res.data[i].harga+'</td>';
                html += '<td class="table_data" data-row_id="'+res.data[i].id+'" data-column_name="quantity" contenteditable>'+res.data[i].quantity+'</td>';
                html += '<td class="table_data" data-row_id="'+res.data[i].id+'" data-column_name="satuan" contenteditable>'+res.data[i].satuan+'</td>';
                html += '<td class="table_data" data-row_id="'+res.data[i].id+'" data-column_name="total">'+total+'</td>';
                html += '<td><button type="submit" name="delete_btn" id="'+res.data[i].id+'" class="btn btn-danger btn_delete"><i class="material-icons" style="color:white">delete</i><span>hapus</span></button></td></tr>';
            }            
            
            html += '<tr>';
            html += '<td  colspan="5"class="text-right"><strong>Total akhir</strong></td>';
            html += '<td colspan="2"><strong>Rp. '+ total_akhir +'</strong></td>';
            html += '</tr>';
            html += '<tr>';
            html +='<td colspan="5" rowspan="2"><div class="form-group"><label for="catatan">Catatan:</label><textarea class="form-control" rows="7" id="catatan">'+ res.invoice.catatan +'</textarea></div></strong></td>';
            html += '<td colspan="2">'
                    +'<div class="row">'
                        +'<div class="col-md-12">'
                            +'<label for="selectSetuju">Pak Noor:</label>'
                        +'</div>'
                        +'<div class="col-md-6" id="select_setuju" style="display:none">'
                        +'<select class="form-control" onchange="selectFunction()" id="selectSetuju">'
                            +'<option value="0">Belum disetujui</option>'
                            +'<option value="1">Setujui</option>'
                            +'<option value="2">Tidak disetujui</option>'
                        +'</select>'
                        +'</div>'
                        +'<div class="col-md-6">'
                            +button1
                        +'</div>'
                    +'</td>';
            html +='</tr>';
            html += '<tr>';
            html += '<td colspan="2">'
                    +'<div class="row">'
                        +'<div class="col-md-12">'
                            +'<label for="selectSetuju">Pak Aphay:</label>'
                        +'</div>'
                        +'<div class="col-md-6" id="select_setuju2" style="display:none">'
                        +'<select class="form-control" onchange="selectFunction2()" id="selectSetuju2">'
                            +'<option value="0">Belum disetujui</option>'
                            +'<option value="1">Setujui</option>'
                            +'<option value="2">Tidak disetujui</option>'
                        +'</select>'
                        +'</div>'
                        +'<div class="col-md-2">'
                            +button2
                        +'</div>'
                    +'</td>';
            html += '</tr>';
            $('#dataTable').html(html);
        }
        });
    }

    $(document).on('click', '#cek_setuju', function () {
        var status1 = <?= $invoice['status_1'] ?>;
        $('#selectSetuju').val(status1);
        $('#select_setuju').show();
        $('#cek_setuju').hide();harga
    });

    $(document).on('click', '#cek_setuju2', function () {
        var status2 = <?= $invoice['status_2'] ?>;
        $('#selectSetuju2').val(status2);
        $('#select_setuju2').show();
        $('#cek_setuju2').hide();
    });

    $(document).on('click', '#btn_add', function () {
        var invoice_id = <?= $id ?>;
        var nama_barang = $('#nama_barang').text();
        var harga = $('#harga').text();
        var qty = $('#qty').text();
        var satuan = $('#satuan').text();
        var total = $('#total').text();
        if (nama_barang == '') {
            alert('Nama barang harus diisi');
            return false;
        }else if(harga == ''){
            alert('Harga harus diisi');
            return false;
        }else if(qty == ''){
            alert('Quantity harus disi');
            return false;
        }else if(satuan == ''){
            alert('satuan harus disi');
            return false;
        }else{
            $.ajax({
                method: 'POST',
                data  : { invoice_id:invoice_id, nama_barang : nama_barang, harga : harga, qty : qty, satuan : satuan, total : total, qty : qty, },
                url   : '<?= base_url('invoice/detailInsert') ?>',
                dataType: 'json',
                success : function(res) {
                    if (res.message == 'success') {
                        load_data();
                    }
                }
            });
        }
    });

    $(document).on('blur', '#catatan', function () {
        var catatan = $('#catatan').val();
        var invoice_id = <?= $id ?>;
        $.ajax({
            method: 'POST',
            data  : { invoice_id : invoice_id, catatan:catatan},
            url   : '<?= base_url('invoice/catatan') ?>',
            dataType: 'json',
            success : function(res) {
                load_data();
            }
        });        

    });
    $(document).on('blur', '#harga, #qty', function () {
        var harga = parseFloat($('#harga').text()) || 0;
        var qty = parseFloat($('#qty').text()) || 0;
        $('#total').text(harga * qty);
    });

// ini edit 
// ini nih ediiitttt 
// document.addEventListener('keyup', function(e) {
//   if (e.target.className === 'table_data') {
//     if(e.which < 48 || event.which > 57){
        
//     }else{
//         var txt = e.target.innerHTML.replace(/\./g, '');
//         txt = txt.replace(/\B(?=(\d{3})+(?!\d))/g, ".");
//         e.target.innerHTML = txt;
//         document.trigger(39);
//     }
//     // e.Handled = true;
//   }
// });
    $(document).on('blur', '.table_data', function () {
        var tr = $(this).closest('tr');
        var td = tr.find('td');
        // var harga = parseInt(td.eq(2).html().replace(/\.g, ''));
        // var jml = parseInt(td.eq(3).html().replace(/\./g, ''));
        var harga = parseInt(td.eq(2).html());
        var jml = parseInt(td.eq(3).html());
        var total = harga * jml;
        td.eq(5).html(total);

        console.log(total);
        
        var id  = $(this).data('row_id');
        var table_column = $(this).data('column_name');
        var value = $(this).text();
        // if (table_column == 'harga') {
        //     var id  = $(this).data('row_id');
        //     var table_column = $(this).data('quantity');
        //     var value = $(this).text();

        //     // var qty = parseFloat($('#qty').text()) || 0;
        //     // $('#total').text(harga * qty);
        // }
        $.ajax({
            method: 'POST',
            data  : { id : id, table_column : table_column, value : value, total : total },
            url   : '<?= base_url('invoice/detailUpdate') ?>',
            dataType: 'json',
            success : function(res) {
                if (res.message == 'success') {
                    load_data();
                }
            }
        });
    });

    $(document).on('click', '.btn_delete', function () {
        var id = $(this).attr('id');
        $.ajax({
            method: 'POST',
            data  : { id : id},
            url   : '<?= base_url('invoice/deleteData') ?>',
            dataType: 'json',
            success : function(res) {
                if (res.message == 'success') {
                    load_data();
                }
            }
        });
    });

    function selectFunction() {
        var status = $('#selectSetuju').val();
        var invoice_id = <?= $id ?>;
        $.ajax({
            method: 'POST',
            data  : { invoice_id : invoice_id, status:status },
            url   : '<?= base_url('invoice/updatestatus/status_1') ?>',
            dataType: 'json',
            success : function(res) {
                if (res.message == 'success') {
                    load_data();
                }
            }
        });
    }

    function selectFunction2() {
        var status = $('#selectSetuju2').val();
        var invoice_id = <?= $id ?>;
        $.ajax({
            method: 'POST',
            data  : { invoice_id : invoice_id, status:status },
            url   : '<?= base_url('invoice/updatestatus/status_2') ?>',
            dataType: 'json',
            success : function(res) {
                if (res.message == 'success') {
                    load_data();
                }
            }
        }); 
    }

//     jQuery.fn.putCursorAtEnd = function() {

//   return this.each(function() {
    
//     // Cache references
//     var $el = $(this),
//         el = this;

//     // Only focus if input isn't already
//     if (!$el.is(":focus")) {
//      $el.focus();
//     }

//     // If this function exists... (IE 9+)
//     if (el.setSelectionRange) {

//       // Double the length because Opera is inconsistent about whether a carriage return is one character or two.
//       var len = $el.val().length * 2;
      
//       // Timeout seems to be required for Blink
//       setTimeout(function() {
//         el.setSelectionRange(len, len);
//       }, 1);
    
//     } else {
      
//       // As a fallback, replace the contents with itself
//       // Doesn't work in Chrome, but Chrome supports setSelectionRange
//       $el.val($el.val());
      
//     }

//     // Scroll to the bottom, in case we're in a tall textarea
//     // (Necessary for Firefox and Chrome)
//     this.scrollTop = 999999;

//   });

// };


</script>