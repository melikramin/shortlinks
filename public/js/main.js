$(document).ready(function(){

    $('#exit_btn_ok').click(function () {

        var exit_btn = "1";

        $.ajax({
        url: '/user',
        type: 'POST',
        cache: false,
        data: {'exit_btn' : exit_btn},
        dataType: 'html',
        success: function(data) {
            document.location.reload(true);
          }
    });
    });

});