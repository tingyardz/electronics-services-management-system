$(document).ready(function(){

    $('#remove').click(function(){
        var unit = $('.radio');
        var unitInChecked = false;
        for(var i = 0; i < unit.length; i++){
            if(unit[i].checked){
                unitInChecked = unit[i];
                break;
            }
        }
        if(!unitInChecked){
            alert('Please select data from the table!');
        }
        else if(unitInChecked != -1){
            var id = unitInChecked.value;
            var confirm = window.confirm('Are you sure you want to remove this technician?');
            if(confirm){
                window.location.href = 'lists-of-technicians.php?remove='+id;
            }
        }
    });

    $('#update').click(function(){
        var unit = $('.radio');
        var unitInChecked = false;
        for(var i = 0; i < unit.length; i++){
            if(unit[i].checked){
                unitInChecked = unit[i];
                break;
            }
        }
        if(!unitInChecked){
            alert('Please select data from the table!');
        }
        else if(unitInChecked != -1){
            $('.container001').fadeIn();
            $('.container001').css({'display':'flex'});
            var id = unitInChecked.value;

            $.post(
                'ajax.php',
                {
                    update1 : 'True',
                    slot : id
                },
                function(data){
                    var str = data;
                    var arr = str.split(",");
                    var inputToUpdate = $('.update-value');
                    
                    for(var i = 0; i < inputToUpdate.length; i++){
                        inputToUpdate[i].value = arr[i];
                        console.log(arr[i]);
                    }
                }
            );
        }
    });

    $('#add-new-unit').click(function(){
        $('.container000').fadeIn();
        $('.container000').css({'display':'flex'});
    });

    $('.close').click(function(){
        $('.container000').css({'display':'none'});
        $('.container001').css({'display':'none'});
    });
});