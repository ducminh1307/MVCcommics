$(document).ready(function(){
    $('#search').on('keyup', function(){
        var url = $('#url').val();
        var value = $(this).val();
        if( value.length > 0) {
            $.ajax({
                url: url + '/ajax/searchTruyen',
                method: 'POST',
                data: {search: value},
                success: function(data) {
                    $('.manga-search').html(data);
                }
            });
        } else {
            $('.manga-search').empty();
        }
    });
});