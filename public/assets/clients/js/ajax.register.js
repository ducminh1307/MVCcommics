$(document).ready(function() {
    $('#showPass').on('click', function() {
        $(this).toggleClass('show');
        if($('#password').attr('type')=='password'){
            $('#password').attr('type', 'text');
        } else {
            $('#password').attr('type', 'password');
        }
    });
    $('#showRepass').on('click', function() {
        $(this).toggleClass('show');
        if($('#repassword').attr('type')=='password'){
            $('#repassword').attr('type', 'text');
        } else {
            $('#repassword').attr('type', 'password');
        }
    });
    function check() {
        if($('#checkuser').text()==''&& $('#checkname').text()==''&& $('#checkemail').text()==''&& $('#checkpass').text()=='' && $('#checkrepass').text()=='') {
            $(".button").prop("disabled", false);
            $(".button").removeClass('disabled');
        } else {
            $(".button").prop("disabled", true);
            $(".button").addClass('disabled');
        }
    }
    setInterval(check,0);
    $('#user').on('keyup', function(){
        var url = $('#url').val() + '/user/checkUser';
        var user = $(this).val();
        check();
        if(user.length > 0){
            $.ajax({
                url: url,
                method: 'POST',
                data: {user: user},
                success: function(data){
                    $('#checkuser').html(data);
                }
            });
        } else {
            $('#checkuser').empty();
        }
    });
    $('#name').on('keyup', function(){
        var name = $(this).val();
        check();
        if(name.length > 0){
            if(name.length >= 5 && name.length <= 20){
                $('#checkname').empty();
            }
            if(name.length < 5) {
                $('#checkname').html('<span class="text-danger">&#10006; Tên hiển thị phải lớn hơn 5 ký tự!</span>');
            }
            if(name.length > 20) {
                $('#checkname').html('<span class="text-danger">&#10006; Tên hiển thị phải nhỏ hơn 20 ký tự!</span>');
            }
        } else {
            $('#checkname').empty();
        }
    });
    $('#email').on('keyup', function(){
        var url = $('#url').val() + '/user/checkEmail';
        var email = $(this).val();
        check();
        if(email.length > 0){
            $.ajax({
                url: url,
                method: 'POST',
                data: {email: email},
                success: function(data){
                    $('#checkemail').html(data);
                }
            });
        } else {
            $('#checkemail').empty();
        }
    });
    $('#password').on('keyup', function(){
        var pass = $(this).val();
        var rePass = $('#repassword').val();
        check();
        if(pass.length > 0){
            if(pass.length < 5) {
                $('#checkpass').html('<span class="text-danger">&#10006; Mật khẩu phải có ít nhất 5 ký tự!</span>');
            } else {
                if(pass.length > 20) {
                    $('#checkpass').html('<span class="text-danger">&#10006; Mật khẩu không quá 20 ký tự!</span>');
                } else {
                    $('#checkpass').empty();
                    if(rePass.length > 0) {
                        if(pass == rePass) {
                            $('#checrekpass').empty();
                        } else {
                            $('#checkrepass').html('<span class="text-danger">&#10006; Mật khẩu nhập lại không đúng!</span>');
                        }
                    } else {
                        $('#checkrepass').empty();
                    }
                }
            }
        } else {
            $('#checkpass').empty();
        }
    });
    $('#repassword').on('keyup', function(){
        var rePass = $(this).val();
        var pass = $('#password').val();
        check();
        if(rePass.length > 0){
            if(rePass != pass) {
                $('#checkrepass').html('<span class="text-danger">&#10006; Mật khẩu nhập lại không đúng!</span>');
            } else {
                $('#checkrepass').empty();
            }
        } else {
            $('#checkrepass').empty();
        }
    });
    $(document).on('submit', '.register-form', function(){
        var url = $('#url').val() + "/xu-ly-dang-ky";
        var user = $('#user').val();
        var name = $('#name').val();
        var email = $('#email').val();
        var pass = $('#password').val();
        var captcha = $('#captcha').val();
        var logo = $('input[name="logo"]:checked').val();
        $.ajax({
            url: url,
            method: 'POST',
            dataType: 'json',
            data:{username:user, name:name, email:email, password:pass, captcha:captcha, logo:logo},
            success: function(data){
                $('#checkCaptcha').html(data);
            }
        })
        return false;
    })
});