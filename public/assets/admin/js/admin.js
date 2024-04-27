$(document).ready(function() {
    $(".text").on('keyup',function () {
        var text = $(this).val().toLowerCase();
        var text_create;
        text_create = text.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        text_create = text_create.replace(/\ /g, '-');
        text_create = text_create.replace(/đ/g, "d");
        text_create = text_create.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
        text_create = text_create.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
        text_create = text_create.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ.+/g,"o");
        text_create = text_create.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ.+/g, "e");
        text_create = text_create.replace(/ì|í|ị|ỉ|ĩ/g,"i");
        text_create = text_create.replace(/:|~/g,"");
        $('.slug').val(text_create);
    });
});