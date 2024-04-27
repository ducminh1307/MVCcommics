$(document).ready(function(){
    $(window).scroll(function(){
        if($(window).scrollTop() > 50) {
            $('#up').addClass('active');
        } else {
            $('#up').removeClass('active');
        }
    });
    $('#up').on('click', function() {
        $('html').animate({scrollTop: 0}, 500);
    });
    $('#burger').on('click', function() {
        $('.main-menu').addClass('active');
        $('.hide-screen').addClass('show');
        $('body').addClass('hide');
    });
    $('#user-button').on('click', function() {
        $('.user-menu').addClass('active');
        $('.hide-screen').addClass('show');
        $('body').addClass('hide');
    });
    $('#close').on('click', function() {
        $('.main-menu').removeClass('active');
        $('.hide-screen').removeClass('show');
        $('body').removeClass('hide');
    });
    $('#close-user').on('click', function() {
        $('.user-menu').removeClass('active');
        $('.hide-screen').removeClass('show');
        $('body').removeClass('hide');
    });
    $('#menu-button').on('click', function() {
        $('#menu').toggleClass('active');
        if($('#type').hasClass('active')){
            $('#type').removeClass('active');
        }
    });
    $('#type-button').on('click', function() {
        $('#type').toggleClass('active');
        if($('#menu').hasClass('active')){
            $('#menu').removeClass('active');
        }
    });
    $('.hide-screen').on('click', function() {
        $('.main-menu').removeClass('active');
        $('.user-menu').removeClass('active');
        $('.hide-screen').removeClass('show');
        $('body').removeClass('hide');
        if($('#menu').hasClass('active')){
            $('#menu').removeClass('active');
        }
        if($('#type').hasClass('active')){
            $('#type').removeClass('active');
        }
    });
    $('#body').on('scroll', function(){
        if(($('#body').scrollTop()+ $('#body').height()) < $('#body').prop('scrollHeight')){
            $('#down').fadeIn('fast');
        } else {
            $('#down').fadeOut('fast');
        }
    });
    $('#down').on('click', function(){
        $('#body').animate({scrollTop: $('#body')[0].scrollHeight});
    });
    if($('#noidung').height() <= 97){
        $('#readmore').hide();
        $('#readless').hide();
    } else {
        $('#noidung').addClass('hide');
        $('#readmore').show();
        $('#readless').hide();
    }
    $('#readmore').on('click', function(){
        $('#noidung').removeClass('hide');
        $('#noidung').addClass('show');
        $('#readless').show();
        $('#readmore').hide();
    });
    $('#readless').on('click', function(){
        $('#noidung').addClass('hide');
        $('#noidung').removeClass('show');
        $('#readmore').show();
        $('#readless').hide();
    });
});