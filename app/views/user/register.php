<section class="register">
    <form method="post" class="register-form log">
        <div class="title">Đăng ký</div>
        <div class="form-item">
            <input type="text" placeholder="Tên đăng nhập" name="username" id="user" value="<?php if(isset($old['username'])) echo $old['username'] ?>" required>
            <div class="check" id="checkuser"></div>
        </div>
        <div class="form-item">
            <input type="text" placeholder="Tên hiển thị" name="name" id="name" value="<?php if(isset($old['name'])) echo $old['name'] ?>" required>
            <div class="check" id="checkname"></div>
        </div>
        <div class="form-item">
            <input type="email" placeholder="Emai" name="email" id="email" value="<?php if(isset($old['email'])) echo $old['email'] ?>" required>
            <div class="check" id="checkemail"></div>
        </div>
        <div class="form-item">
            <input type="password" placeholder="Mật khẩu" name="password" id="password" value="<?php if(isset($old['password'])) echo $old['password'] ?>" required>
            <div class="show-pass" id="showPass"><i class="far fa-eye"></i></div>
            <div class="check" id="checkpass"></div>
        </div>
        <div class="form-item">
            <input type="password" placeholder="Nhập lại mật khẩu" name="re-password" id="repassword" required>
            <div class="show-pass" id="showRepass"><i class="far fa-eye"></i></div>
            <div class="check" id="checkrepass"></div>
        </div>
        <div class="form-item">
            <div class="d-flex">
                <input type="text" id="captcha" placeholder="Nhập mã xác thực" name="captcha" required>
                <img src="<?=_WEB_PUBLIC.'/clients/images/captcha.php' ?>" alt="">
            </div>
            <div class="text-danger" id="checkCaptcha"></div>
        </div>
        <div class="form-item d-flex">
            <input type="radio" name="logo" id="logo1" value="user-chat-1.png" checked>
            <label for="logo1"><img src="<?=_WEB_PUBLIC.'/clients/images/logo/user-chat-1.png' ?>" alt=""></label>
            <input type="radio" name="logo" id="logo2" value="user-chat-2.png">
            <label for="logo2"><img src="<?=_WEB_PUBLIC.'/clients/images/logo/user-chat-2.png' ?>" alt=""></label>
            <input type="radio" name="logo" id="logo3" value="user-chat-3.png">
            <label for="logo3"><img src="<?=_WEB_PUBLIC.'/clients/images/logo/user-chat-3.png' ?>" alt=""></label>
            <input type="radio" name="logo" id="logo4" value="user-chat-4.png">
            <label for="logo4"><img src="<?=_WEB_PUBLIC.'/clients/images/logo/user-chat-4.png' ?>" alt=""></label>
            <input type="radio" name="logo" id="logo5" value="user-chat-5.png">
            <label for="logo5"><img src="<?=_WEB_PUBLIC.'/clients/images/logo/user-chat-5.png' ?>" alt=""></label>
        </div>
        <div class="form-item">
            <button type="submit" class="button">Đăng ký</button>
        </div>
        <div class="form-item text-center">
            <span>Bạn đã có tài khoản? </span><a href="<?=_WEB_ROOT.'/dang-nhap' ?>">Đăng nhập ngay</a>
        </div>
    </form>
</section>
<script src="<?=_WEB_PUBLIC.'/clients/js/ajax.register.js' ?>"></script>