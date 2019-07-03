<section class="content">
    <div class="container-fluid">
        <div class="block-header">
        live crud
        </div>
        <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>First Name</th>
                                        <th>Last name</th>
                                        <th>Age</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="dataTable">
                                    <!-- <tr>
                                        <td id="first_name" contenteditable placeholder="name"></td>
                                    </tr> -->
                                    <!-- <button type="submit" class="btn btn-xs btn-success" >Tambah</button> -->
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
$(document).ready(function() {
    load_data();
    function load_data(){
        $.ajax({
            method: 'POST',
            url   : '<?= base_url('livetable/showData') ?>',
            dataType: 'json',
            success : function(res) {
                // console.log(res);
                var html = '<tr>';
                html += '<td></td>';
                html += '<td id="first_name" contenteditable placeholder="name"></td>';
                html += '<td id="last_name" contenteditable placeholder="last name"></td>';
                html += '<td id="age" contenteditable placeholder="name"></td>';
                html += '<td><button type="submit" name="btn_add" id="btn_add" class="btn btn-success" >tambah</button></td></tr>';
                var no = 1;
                for (let i = 0; i < res.length; i++) {
                    html += '<tr>';
                    html += '<td>'+ no++ +'</td>';
                    html += '<td class="table_data" data-row_id="'+res[i].id+'" data-column_name="first_name" contenteditable>'+res[i].first_name+'</td>';
                    html += '<td class="table_data" data-row_id="'+res[i].id+'" data-column_name="last_name" contenteditable>'+res[i].last_name+'</td>';
                    html += '<td class="table_data" data-row_id="'+res[i].id+'" data-column_name="age" contenteditable>'+res[i].age+'</td>';
                    html += '<td><button type="submit" name="delete_btn" id="'+res[i].id+'" class="btn btn-danger btn_delete" >hapus</button></td></tr>';
                }
                $('#dataTable').html(html);
            }
        });
    }

    $(document).on('click', '#btn_add', function () {
        var first_name = $('#first_name').text();
        var last_name = $('#last_name').text();
        var age = $('#age').text();
        if (first_name == '') {
            alert('first name');
            return false;
        }else if(last_name == ''){
            alert('last name');
            return false;
        }else if(age == ''){
            alert('age');
            return false;
        }else{
            $.ajax({
                method: 'POST',
                data  : { first_name : first_name, last_name : last_name, age : age },
                url   : '<?= base_url('livetable/insertData') ?>',
                dataType: 'json',
                success : function(res) {
                    if (res.message == 'success') {
                        load_data();
                    }
                }
            });
        }
    });

    $(document).on('blur', '.table_data', function () {
        var id = $(this).data('row_id');
        var table_column = $(this).data('column_name');
        var value = $(this).text();
        $.ajax({
            method: 'POST',
            data  : { id : id, table_column : table_column, value : value },
            url   : '<?= base_url('livetable/updateData') ?>',
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
            url   : '<?= base_url('livetable/deleteData') ?>',
            dataType: 'json',
            success : function(res) {
                if (res.message == 'success') {
                    load_data();
                }
            }
        });
    });


});



</script>