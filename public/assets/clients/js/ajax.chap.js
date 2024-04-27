$(document).ready(function() {
    function loadComments(page) {
        var idchuong = $('#cmt').data("idch");
        var url = $('#url').val() + '/chap/loadBinhluan';
        $.ajax({
            url: url,
            method: "POST",
            dataType: "json",
            data:{idchuong: idchuong, page:page},
            success: function(data){
                $('.comment-body').html(data);
            }
        })
    }
    loadComments();
    $("#cmt").on('click', function(){
        var url = $('#url').val() + '/chap/addBinhluan';
        var idchuong = $(this).data("idch");
        var user = $(this).data("user");
        var content = $('#comment').val();
        if(content != ''){
            if(user != "") {
                $.ajax({
                    url: url,
                    method: "POST",
                    data:{idchuong: idchuong, user: user, content: content},
                    success: function(){
                        $('#comment').val('');
                        loadComments();
                    }
                })
            } else {
                $('.thongbao').html('Bạn chưa đăng nhập!');
                $('.thongbao').addClass('active');
                setTimeout(function(){ $('.thongbao').removeClass('active'); }, 3000);
            }
        }
    })
    $(document).on('click', '.page', function() {
        var page = $(this).data('page');
        loadComments(page);
    })
})