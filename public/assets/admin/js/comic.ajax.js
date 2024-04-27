$(document).ready(function() {
    
    let MyEditor;
    let MyEditorAdd;
    ClassicEditor
    .create(document.querySelector('#editor'))
    .then(editor => {
        window.editor = editor;
        MyEditorAdd = editor;
    })
    .catch(error => {
        console.error(error);
    });
    ClassicEditor
    .create(document.querySelector('#editorEdit'))
    .then(editor => {
        window.editor = editor;
        MyEditor = editor;
    })
    .catch(error => {
        console.error(error);
    });
    
    let myChoices = new Choices('#up_theloai',{removeItemButton: true});
    
    $('.close').on('click', function() {
        $('form').trigger('reset');
        MyEditor.setData('');
        MyEditorAdd.setData('');
    })
    function sweetalert(title, type){
        swal({
            title: title,
            icon: type,
        });
    }
    function loadTruyen(page){
        var url = $('#url').val() + "/quantri/loadTruyen";
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
    loadTruyen();
    $(document).on('click', '.page-link', function() {
        var page = $(this).data('page');
        loadTruyen(page);
    })
    $(document).on('submit', '#add_form', function(e) {
        e.preventDefault();
        var url = $('#url').val() + "/quantri/addTruyen";
        var form = new FormData(this);
        var arr = [];
        $('#theloai :selected').each(function(){
            arr.push($(this).val());
        });
        form.append('theloai', arr.join("#"));
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: function(data) {
                if(data.status){
                    sweetalert("Thêm truyện thành công!", "success");
                    $('#addcomic').modal('hide');
                    loadTruyen();
                    $('form').trigger('reset');
                    MyEditorAdd.setData('');
                    $('.text-danger').empty();
                } else {
                    $('.text-danger').html('File không đúng định dạng!');
                }                
            }
        });
    })
    $(document).on('click', '#updatetruyen', function() {
        var id = $(this).data('id');
        var url = $('#url').val() + "/quantri/getTruyen";
        $('form').trigger('reset');
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'json',
            data: {id:id},
            success: function(data) {
                $('#id').val(id);
                $('#ten').val(data.tentruyen);
                $('#slug').val(data.slugtruyen);
                $('#tacgia').val(data.tacgia);
                MyEditor.setData(data.tomtat);
                $.each(data.theloai, function(index, value){
                    myChoices.setChoices([
                        value,
                    ]);
                })
            }
        })
    })
    $(document).on('click', '#change', function() {
        var stt = $(this).data('stt');
        var idtr = $(this).data('idtr');
        var page = $('#active').data('page');
        var url = $('#url').val() + "/quantri/changeStatus";
        $.ajax({
            url: url,
            method: 'POST',
            data: {stt: stt, idtr: idtr},
            success: function() {
                loadTruyen(page);
            }
        });
    })
    $(document).on('submit', '#edit_form', function(e) {
        e.preventDefault();
        var page = $('#active').data('page');
        var url = $('#url').val() + "/quantri/updateTruyen";
        var form = new FormData(this);
        var arr = [];
        $('#up_theloai :selected').each(function(){
            arr.push($(this).val());
        });
        form.append('up_theloai', arr.join("#"));
        $.ajax({
            type: 'POST',
            url: url,
            data: form,
            dataType: 'json',
            contentType: false,
            cache: false,
            processData:false,
            success: function(data) {
                if(data.status){
                    sweetalert("Sửa truyện thành công!", "success");
                    $('#edittruyen').modal('hide');
                    loadTruyen(page);
                    $('form').trigger('reset');
                    MyEditor.setData('');
                    $('.text-danger').empty();
                } else {
                    $('.text-danger').html('File không đúng định dạng!');
                }                
            }
        });
    })
    $(document).on('click', '#delete', function() {
        var id = $(this).data('id');
        $('#del_id').val(id);
    })
    $(document).on('click', '#remove', function() {
        var page  = $('#active').data('page');
        var id = $('#del_id').val();
        var url = $('#url').val() + "/quantri/deleteTruyen";
        $.ajax({
            url: url,
            method: 'POST',
            data: {id: id},
            success: function() {
                sweetalert("Xóa truyện thành công!", "success");
                loadTruyen(page);
            }
        })
    })
    $(document).on('click', '#targetchuong', function() {
        var id = $(this).data('id');
        var url = $('#url').val() + "/quantri/loadChuong";
        $.ajax({
            url: url,
            method: 'POST',
            data: {id:id},
            dataType: 'json',
            success: function(data) {
                $('#listchuong').html(data)
            }
        });
    })
    $(document).on('click', '#addchuong', function() {
        var id = $(this).data('idtr');
        $('#idtruyen').val(id);
    })
    $(document).on('submit', '#addchuong_form', function(e) {
        e.preventDefault();
        var url = $('#url').val() + "/quantri/addChuong";
        var idtr = $('#idtruyen').val();
        var ten = $('#tench').val();
        var slug = $('#slugch').val();
        var hinhanh = $('#hinhanh').val();
        $.ajax({
            url: url,
            method: 'POST',
            data: {idtr: idtr, ten: ten, slug: slug, hinhanh: hinhanh},
            dataType: 'json',
            success: function() {
                $('#addchuongModal').modal('hide');
                sweetalert("Thêm chương thành công!", "success");
            }
        })
    })
    $(document).on('click', '#editchuong', function() {
        var id = $(this).data('id');
        var url = $('#url').val() + "/quantri/getChuong";
        $.ajax({
            url: url,
            method: 'POST',
            data: {id:id},
            dataType: 'json',
            success: function(data) {
                $('#up_idch').val(data.idchuong);
                $('#up_tench').val(data.tenchuong);
                $('#up_slugch').val(data.slugchuong);
                $('#up_hinhanh').html(data.hinhanh);
            }
        });
    })
    $(document).on('submit', '#editchuong_form', function(e) {
        e.preventDefault();
        var url = $('#url').val() + "/quantri/updateChuong";
        var id = $('#up_idch').val();
        var ten = $('#up_tench').val();
        var slug = $('#up_slugch').val();
        var hinhanh = $('#up_hinhanh').val();
        $.ajax({
            url: url,
            method: 'POST',
            data: {id: id, ten: ten, slug: slug, hinhanh: hinhanh},
            dataType: 'json',
            success: function() {
                $('#editchuongModal').modal('hide');
                sweetalert("Sửa truyện thành công!", "success");
            }
        })
    })

})