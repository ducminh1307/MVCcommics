<section class="login">
    <form method="post" class="login-form log">
        <div class="title">Đăng nhập</div>
        <div class="form-item">
            <span class="text-danger"></span>
        </div>
        <div class="form-item">
            <input type="text" id="user" placeholder="Tên đăng nhập" value="<?php if(isset($_COOKIE['username'])) echo $_COOKIE['username'] ?>" name="user" required>
        </div>
        <div class="form-item">
            <input type="password" id="password" placeholder="Mật khẩu" value="<?php if(isset($_COOKIE['password'])) echo $_COOKIE['password'] ?>" name="pass" required>
            <div class="show-pass" id="showPass"><i class="far fa-eye"></i></div>
        </div>
        <div class="form-item">
            <input type="checkbox" name="remember" id="rem" <?php if(isset($_COOKIE['username'])) echo 'checked' ?>>
            <label for="rem"><span class="check"></span> Nhớ mật khẩu</label>
        </div>
        <div class="form-item">
            <button type="submit">Đăng nhập</button>
        </div>
        <div class="form-item text-center">
            <a href="<?=_WEB_ROOT.'/quen-mat-khau'?>">Quên mật khẩu?</a>
            <a href="<?=_WEB_ROOT.'/dang-ky'?>">Đăng ký</a>
        </div>
    </form>
</section>
<script>
    $('#showPass').on('click', function() {
        $(this).toggleClass('show');
        if($('#password').attr('type')=='password'){
            $('#password').attr('type', 'text');
        } else {
            $('#password').attr('type', 'password');
        }
    });
    $(document).on('submit', '.login-form', function(){
        var url = $('#url').val() + '/xu-ly-dang-nhap';
        var user = $('#user').val();
        var pass = $('#password').val();
        if($('#rem:checked')==undefined){ var rem = 0; } else { var rem = 1; }
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'json',
            data:{user: user, pass: pass, rem: rem},
            success: function(data) {
                $('.text-danger').html(data);
            }
        })
        return false;
    })
</script>