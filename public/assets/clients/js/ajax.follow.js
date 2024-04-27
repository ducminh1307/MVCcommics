$(document).ready(function() {
    function loadFollow() {
        var url = $("#url").val() + "/follow/loadFollow";
        var user = $("#username").val();
        $.ajax({
            url: url,
            method: "POST",
            data: {user: user},
            success: function(data) {
                $("#follow").html(data);
            }
        })
    }
    loadFollow();
})