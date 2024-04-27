$(document).ready(function() {
    $('.close').on('click', function() {
        $('form').trigger('reset');
    })
    function sweetalert(title, type){
        swal({
            title: title,
            icon: type,
        });
    }
    function loadType(page){
        var url = $('#url').val() + "/quantri/loadType";
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'json',
            data: {page: page},
            success: function(data) {
                $('#table1').html(data.table);
                $('.pagination').html(data.page);
            }
        });
    }
    loadType();
    $(document).on('click', '.page-link', function() {
        var page = $(this).data('page');
        loadType(page);
    })
    $(document).on('click', '#inserttype', function() {
        var name = $('#typename').val();
        var slug = $('#typeslug').val();
        var url = $('#url').val() + "/quantri/addType";
        if(name != '') {
            $.ajax({
                url: url,
                method: 'POST',
                data: {name: name, slug: slug},
                success: function() {
                    sweetalert("Thêm thành công!", "success");
                    loadType();
                    $('form').trigger('reset');
                }
            });
        } else {
            sweetalert("Hãy nhập tên thể loại!", "error");
        }
    })
    $(document).on('click', '#updatetype', function() {
        var id = $(this).data('id');
        var url = $('#url').val() + "/quantri/getType";
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'json',
            data: {id:id},
            success: function(data) {
                $('#up_id').val(data['idtheloai']);
                $('#up_name').val(data['tentheloai']);
                $('#up_slug').val(data['slugtheloai']);
            }
        })
    })
    $(document).on('click', '#update', function() {
        var id = $('#up_id').val();
        var name = $('#up_name').val();
        var slug = $('#up_slug').val();
        var url = $('#url').val() + "/quantri/updateType";
        if(name != '') {
            $.ajax({
                url: url,
                method: 'POST',
                data: {id: id,name: name, slug: slug},
                success: function() {
                    sweetalert("Sửa thành công!", "success");
                    loadType();
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
        var url = $('#url').val() + "/quantri/deleteType";
        $.ajax({
            url: url,
            method: 'POST',
            data: {id: id},
            success: function() {
                sweetalert("Xóa thành công", "success");
                loadType();
            }
        })
    })
})