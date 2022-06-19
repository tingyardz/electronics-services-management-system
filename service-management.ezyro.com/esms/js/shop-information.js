$(document).ready(function(){

    $('#update').click(function(){
        $('.container000').fadeIn();
        $('.container000').css({'display':'flex'});

        var total = $('#total').val();
        var input = $('.input-field-update');

        $.post(
            'ajax.php',
            {
                update2 : 'True',
                Id : total
            },
            function(data){
                var str = data;
                var arr = str.split(",");
                for(var i = 0; i < input.length; i++){
                    input[i].value = arr[i];
                }
            }
        );
    });

    $('.close').click(function(){
        $('.container000').css({'display':'none'});
        $('.container001').css({'display':'none'});
    });

    
});