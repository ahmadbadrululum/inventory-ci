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