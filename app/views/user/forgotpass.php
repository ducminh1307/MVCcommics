<section class="forgot">
    <form class="log" id="forgot">
        <div class="title">Quên mật khẩu</div>
        <div class="form-item">
            <span class="text-danger"></span>
            <span class="text-success"></span>
        </div>
        <div class="form-item">
            <input type="email" id="email" placeholder="Nhập email" required style="padding-right:80px">
            <p class="sendotp active disabled">Gửi OTP</p>
            <p class="count"></p>
        </div>
        <div class="form-item">
            <input type="text" id="otp" placeholder="Nhập mã OTP" required>
        </div>
        <div class="form-item">
            <input type="password" id="npass" placeholder="Nhập mật khẩu mới" required>
        </div>
        <div class="form-item">
            <input type="password" id="rnpass" placeholder="Nhập lại mật khẩu" required>
        </div>
        <div class="form-item">
            <button type="submit">Đổi mật khẩu</button>
        </div>
        <div class="form-item text-center">
            <a href="<?=_WEB_ROOT.'/dang-nhap'?>">Đăng nhập</a> /
            <a href="<?=_WEB_ROOT.'/dang-ky'?>">Đăng ký</a>
        </div>
    </form>
</section>
<script>
    $(document).ready(function() {
        function timer(){
            if($.cookie('time')  == undefined) {
                $.cookie('time', 30);
            }
            var second = $.cookie('time');
            var countdown = setInterval(() => {
                $('.sendotp').removeClass("active");
                $(".count").addClass("active");
                if(second < 10){
                    $(".count").html("00:0"+second);
                } else {
                    $(".count").html("00:"+second);
                }  
                second -= 1;
                $.cookie('time', second);
                if(second <= 0) {
                    clearInterval(countdown);
                    $.removeCookie('time');
                    $('.sendotp').addClass("active");
                    $(".count").removeClass("active");
                }
            }, 1000);
        }
        $(document).on('keyup', '#email', function(){
            var email = $('#email').val();
            if(email.length > 0){
                $('.sendotp').removeClass('disabled')
            } else {
                $('.sendotp').addClass('disabled');
            }
        })
        $(document).on('click', '.sendotp', function(){
            var url = $('#url').val() + "/user/checkEmailForgot";
            var email = $('#email').val();
            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data:{email: email},
                success: function(data){
                    if(data.status){
                        $('.text-danger').empty();
                        $('.text-success').html(data.content);
                        timer();
                    } else {
                        $('.text-danger').html(data.content);
                        $('.text-success').empty();
                    }
                }
            })
        })
        $(document).on('submit', '#forgot', function(){
            var url = $('#url').val() + "/user/forgotPass";
            var email = $('#email').val();
            var otp = $('#otp').val();
            var npass = $('#npass').val();
            var rnpass = $('#rnpass').val();
            $.ajax({
                url: url,
                method: 'POST',
                dataType: 'json',
                data: {email: email, otp: otp, npass: npass, rnpass: rnpass},
                success: function(data) {
                    if(data.status){
                        $('.text-success').html(data.content);
                        $('.text-danger').empty();
                    } else {
                        $('.text-danger').html(data.content);
                        $('.text-success').empty();
                    }
                }
            });
            return false;
        })
    })
</script>