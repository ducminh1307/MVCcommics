$('.close').on('click', function() {
    $('form').trigger('reset');
})
function sweetalert(title, type){
    swal({
        title: title,
        icon: type,
    });
}
function loadCmt(page){
    var url = $('#url').val() + "/quantri/loadCmt";
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
loadCmt();
$(document).on('click', '.page-link', function() {
    var page = $(this).data('page');
    loadCmt(page);
})
$(document).on('click', '#delete', function() {
    var id = $(this).data('id');
    $('#del_id').val(id);
})
$(document).on('click', '#remove', function() {
    var id = $('#del_id').val();
    var url = $('#url').val() + "/quantri/deleteCmt";
    $.ajax({
        url: url,
        method: 'POST',
        data: {id: id},
        success: function() {
            sweetalert("Xóa thành công!", "success");
            loadCmt();
        },
        error:function() {
            sweetalert("Xóa không thành công!", "error");
        }
    })
})