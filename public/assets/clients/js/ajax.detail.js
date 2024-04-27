$(document).ready(function(){
    function loadFollow() {
        var user = $("#username").val();
        var id = $("#idtr").val();
        var url = $("#url").val() + "/follow/loadFollow";
        $.ajax({
            url: url,
            method: "POST",
            dataType: "json",
            data: {user: user, id: id},
            success: function(data){
                $(".theodoi").html(data);
            }
        });
    }
    loadFollow();
    $(document).on("click", "#follow", function(){
        if($("#username").val()==''){
            $('.thongbao').html('Bạn chưa đăng nhập!');
            $('.thongbao').addClass('active');
            setTimeout(function(){ $('.thongbao').removeClass('active'); }, 3000);
        } else {
            var id = $(this).data('id');
            var user = $("#username").val();
            var url = $("#url").val() + "/follow/addFollow";
            $.ajax({
                url: url,
                method: "POST",
                data: {user: user, id: id},
                success: function(){
                    loadFollow();
                }
            });
        }
    });
    $(document).on("click", "#unfollow", function(){
        if($("#username").val()==''){
            $('.thongbao').html('Bạn chưa đăng nhập!');
            $('.thongbao').addClass('active');
            setTimeout(function(){ $('.thongbao').removeClass('active'); }, 3000);
        } else {
            var id = $(this).data('id');
            var user = $("#username").val();
            var url = $("#url").val() + "/follow/unFollow";
            $.ajax({
                url: url,
                method: "POST",
                data: {user: user, id: id},
                success: function(){
                    loadFollow();
                }
            });
        }
    });
});