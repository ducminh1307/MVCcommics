$('.close').on('click', function() {
    $('form').trigger('reset');
    $('.text-danger').html('');
})
function sweetalert(title, type){
    swal({
        title: title,
        icon: type,
    });
}
function loadAcc(page){
    var url = $('#url').val() + "/quantri/loadAcc";
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
loadAcc();
$(document).on('click', '.page-link', function() {
    var page = $(this).data('page');
    loadAcc(page);
})
$(document).on('click', '#change', function() {
    var qtc = $(this).data('qtc');
    var user = $(this).data('user');
    var page = $('#active').data('page');
    var url = $('#url').val() + "/quantri/changeQTC";
    $.ajax({
        url: url,
        method: 'POST',
        data: {qtc: qtc, user: user},
        success: function() {
            loadAcc(page);
        }
    });
})
$(document).on('click', '#updateuser', function() {
    var user = $(this).data('user');
    var url = $('#url').val() + "/quantri/getAcc";
    $.ajax({
        url: url,
        method: 'POST',
        dataType: 'json',
        data: {user:user},
        success: function(data) {
            $('#username').val(data.tendangnhap);
            $('#name').val(data.tenhienthi);
            $('#email').val(data.email);
            $('.radio-img').filter('[value="'+ data.anhhienthi +'"]').attr('checked', true);
        }
    })
})
$(document).on('keyup', '#email', function() {
    var email = $(this).val();
    var user = $('#username').val();
    var url = $('#url').val() + "/user/checkEmailProfile";
    $.ajax({
        url: url,
        method: 'POST',
        data: {user:user, email: email},
        success: function(data){
            $('.text-danger').html(data);
        }
    });
})
$(document).on('click', '#update', function() {
    var user = $('#username').val();
    var name = $('#name').val();
    var email = $('#email').val();
    var img = $('input:radio[name=img]:checked').val();
    var url = $('#url').val() + "/quantri/updateAcc";
    if(name == '' || email == '') {
        sweetalert("Hãy nhập hết các trường!", "error");
    } else {
        $.ajax({
            url: url,
            method: 'POST',
            data: {user: user,name: name, email: email, img: img},
            success: function() {
                sweetalert("Sửa thành công!", "success");
                loadAcc();
                $('form').trigger('reset');
            }
        });
    }
})
$(document).on('click', '#delete', function() {
    var user = $(this).data('user');
    $('#del_user').val(user);
})
$(document).on('click', '#remove', function() {
    var user = $('#del_user').val();
    var url = $('#url').val() + "/quantri/deleteAcc";
    $.ajax({
        url: url,
        method: 'POST',
        data: {user: user},
        success: function() {
            sweetalert("Xóa thành công!", "success");
            loadAcc();
        },
        error:function() {
            sweetalert("Xóa không thành công!", "error");
        }
    })
})