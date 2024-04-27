$(document).ready(function() {
    $('.close').on('click', function() {
        $('form').trigger('reset');
    })
    function loadMenu(){
        var url = $('#url').val() + "/quantri/loadMenu";
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'json',
            success: function(data) {
                $('#table1').html(data);
            }
        });
    }
    loadMenu();
    function sweetalert(title, type){
        swal({
            title: title,
            icon: type,
        });
    }
    $(document).on('click', '#insertmenu', function() {
        var name = $('#menuname').val();
        var slug = $('#menuslug').val();
        var url = $('#url').val() + "/quantri/addMenu";
        if(name != '') {
            $.ajax({
                url: url,
                method: 'POST',
                data: {name: name, slug: slug},
                success: function() {
                    sweetalert("Thêm thành công!", "success");
                    loadMenu();
                    $('form').trigger('reset');
                }
            });
        } else {
            sweetalert("Hãy nhập tên danh mục!", "error");
            $('#addmenu').model('show');
        }
    })
    $(document).on('click', '#updatemenu', function() {
        var id = $(this).data('id');
        var url = $('#url').val() + "/quantri/getMenu";
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'json',
            data: {id:id},
            success: function(data) {
                $('#up_id').val(data['idmenu']);
                $('#up_name').val(data['tenmenu']);
                $('#up_slug').val(data['slugmenu']);
            }
        })
    })
    $(document).on('click', '#update', function() {
        var id = $('#up_id').val();
        var name = $('#up_name').val();
        var slug = $('#up_slug').val();
        var url = $('#url').val() + "/quantri/updateMenu";
        if(name != '') {
            $.ajax({
                url: url,
                method: 'POST',
                data: {id: id,name: name, slug: slug},
                success: function() {
                    sweetalert("Sửa thành công!", "success");
                    loadMenu();
                    $('form').trigger('reset');
                }
            });
        } else {
            sweetalert("Hãy nhập tên danh mục!", "error");
        }
    })
    $(document).on('click', '#delete', function() {
        var id = $(this).data('id');
        $('#del_id').val(id);
    })
    $(document).on('click', '#remove', function() {
        var id = $('#del_id').val();
        var url = $('#url').val() + "/quantri/deleteMenu";
        $.ajax({
            url: url,
            method: 'POST',
            data: {id: id},
            success: function() {
                sweetalert("Xóa thành công", "success");
                loadMenu();
            }
        })
    })
})