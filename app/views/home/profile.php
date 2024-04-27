<section class="profile">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <div class="menu-profile">
                    <div class="menu-profile-item">
                        <a href="<?=_WEB_ROOT?>/thong-tin-tai-khoan">Thông tin tài khoản</a>
                    </div>
                    <div class="menu-profile-item">
                        <a href="<?=_WEB_ROOT?>/thay-doi-mat-khau">Thay đổi mật khẩu</a>
                    </div>
                    <div class="menu-profile-item">
                        <a href="<?=_WEB_ROOT?>/theo-doi">Truyện theo dõi</a>
                    </div>
                    <div class="menu-profile-item">
                        <a href="<?=_WEB_ROOT?>/lich-su-doc">Lịch sử đọc</a>
                    </div>
                </div>
                <div class="menu-m-profile">
                    <a href="<?=_WEB_ROOT?>/thong-tin-tai-khoan"><i class="fas fa-user"></i></a>
                    <a href="<?=_WEB_ROOT?>/thay-doi-mat-khau"><i class="fas fa-key"></i></a>
                    <a href="<?=_WEB_ROOT?>/theo-doi"><i class="fas fa-heart"></i></a>
                    <a href="<?=_WEB_ROOT?>/lich-su-doc"><i class="fas fa-history"></i></a>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <?php if($func == 'profile'): ?>
                <form action="<?=_WEB_ROOT?>/doi-thong-tin" method="post" class="change-form">
                    <?php if(isset($mess)): ?>
                        <div class="form-group">
                            <?php if($mess): ?>
                                <div class="alert alert-success">Thay đổi thông tin thành công!</div>
                            <?php else: ?>
                                <div class="alert alert-danger">Nhập sai mật khẩu!</div>
                            <?php endif ?>
                        </div>
                    <?php endif ?>
                    <div class="form-group">
                        <input type="radio" id="img1" name="img" value="user-chat-1.png" <?=($_SESSION['acc']['anhhienthi']=='user-chat-1.png')?'checked':''?>>
                        <label for="img1"><img src="<?=_WEB_PUBLIC?>/clients/images/logo/user-chat-1.png" alt=""></label>
                        <input type="radio" id="img2" name="img" value="user-chat-2.png" <?=($_SESSION['acc']['anhhienthi']=='user-chat-2.png')?'checked':''?>>
                        <label for="img2"><img src="<?=_WEB_PUBLIC?>/clients/images/logo/user-chat-2.png" alt=""></label>
                        <input type="radio" id="img3" name="img" value="user-chat-3.png" <?=($_SESSION['acc']['anhhienthi']=='user-chat-3.png')?'checked':''?>>
                        <label for="img3"><img src="<?=_WEB_PUBLIC?>/clients/images/logo/user-chat-3.png" alt=""></label>
                        <input type="radio" id="img4" name="img" value="user-chat-4.png" <?=($_SESSION['acc']['anhhienthi']=='user-chat-4.png')?'checked':''?>>
                        <label for="img4"><img src="<?=_WEB_PUBLIC?>/clients/images/logo/user-chat-4.png" alt=""></label>
                        <input type="radio" id="img5" name="img" value="user-chat-5.png" <?=($_SESSION['acc']['anhhienthi']=='user-chat-5.png')?'checked':''?>>
                        <label for="img5"><img src="<?=_WEB_PUBLIC?>/clients/images/logo/user-chat-5.png" alt=""></label>
                    </div>
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" value="<?=$_SESSION['acc']['tendangnhap']?>" readonly>
                    </div>
                    <div class="form-group">
                        <input type="text" id="name" name="name" class="form-control" value="<?=$_SESSION['acc']['tenhienthi']?>" required>
                    </div>
                    <div class="form-group">
                        <input type="email" id="email" name="email" class="form-control" value="<?=$_SESSION['acc']['email']?>" required>
                        <div class="check" id="checkemail"></div>
                    </div>
                    <div class="form-group">
                        <input type="password" name="pass" class="form-control" placeholder="Nhập mật khẩu" required>
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <button class="btn btn-success">Lưu</button>
                    </div>
                </form>
                <?php else: ?>
                    <form class="change-form"  id="change-form">
                        <div class="result"></div>
                        <div class="form-group">
                            <input type="password" id="opass" class="form-control" placeholder="Nhập mật khẩu cũ" required>
                        </div>
                        <div class="form-group">
                            <input type="text" id="otp" class="form-control" placeholder="Nhập mã xác thực" required style="padding-right:80px">
                            <p class="sendotp active">Gửi OTP</p>
                            <p class="count"></p>
                        </div>
                        <div class="form-group">
                            <input type="password" id="npass" class="form-control" placeholder="Nhập mật khẩu mới" required>
                        </div>
                        <div class="form-group">
                            <input type="password" id="rnpass" class="form-control" placeholder="Nhập lại mật khẩu mới" required>
                        </div>
                        <div class="form-group d-flex justify-content-center">
                            <button class="btn btn-success" id="change" data-user="<?=$_SESSION['acc']['tendangnhap']?>">Đổi mật khẩu</button>
                        </div>
                        </form>
                <?php endif ?>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function(){
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
        if($.cookie('time') != undefined){
            timer();
        }
        $(document).on('click', '.sendotp', function(e){
            e.preventDefault();
            var user = $("#username").val();
            var url = $("#url").val() + "/user/sendOTP";
            $.ajax({
                url: url,
                method: "POST",
                data:{user:user},
                success:function(data){
                    timer();
                }
            })
        });
        $('#email').on('keyup', function(){
            var url = $('#url').val() + '/user/checkEmailProfile';
            var email = $(this).val();
            var user = $('#username').val();
            if(email.length > 0){
                $.ajax({
                    url: url,
                    method: 'POST',
                    data: {user:user, email: email},
                    success: function(data){
                        $('#checkemail').html(data);
                    }
                });
            } else {
                $('#checkemail').empty();
            }
        });
        $(document).on('submit', '#change-form', function(e){
            var url = $("#url").val() + "/thay-mat-khau";
            var opass = $("#opass").val();
            var otp = $("#otp").val();
            var npass = $("#npass").val();
            var rnpass = $("#rnpass").val();
            $.ajax({
                url: url,
                method: "POST",
                dataType: "json",
                data:{opass: opass, otp: otp, npass: npass, rnpass: rnpass},
                success:function(data){
                    if(data.status) { 
                        $(".result").html(data.content);
                        $("#opass").val("");
                        $("#otp").val("");
                        $("#npass").val("");
                        $("#rnpass").val("");
                    } else {
                        $(".result").html(data.content);
                        $("#otp").val("");
                    }
                }
            });
            return false;
        });
    })
</script>