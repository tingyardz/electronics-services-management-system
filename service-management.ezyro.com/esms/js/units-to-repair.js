function receipt(id){

    $('.container002').fadeIn();
    $('.container002').css({'display':'flex'});

    $.post(
        'ajax.php',
        {
            update3 : 'True',
            slot : id
        },
        function(data){
            var str = data;
            var arr = str.split(",");
            var receiptValue = $('.receipt-value');
            
            for(var i = 0; i < receiptValue.length; i++){
                receiptValue[i].value = arr[i];
            }
            
        }
    );
}


$(document).ready(function(){

    $('#claim-paid').click(function(){
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
        else if(unitInChecked){
            $('.container003').fadeIn();
            $('.container003').css({'display':'flex'});
            var id = unitInChecked.value;

            $.post(
                'ajax.php',
                {
                    update4 : 'True',
                    slot : id
                },
                function(data){
                    var str = data;
                    var arr = str.split(",");
                    var claimValue = $('.claim-value');
                    
                    for(var i = 0; i < claimValue.length; i++){
                        claimValue[i].value = arr[i];
                    }
                    
                }
            );
        }
    });

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
            var confirm = window.confirm('Are you sure you want to remove this unit?');
            if(confirm){
                window.location.href = 'units-to-repair.php?remove='+id;
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
        else if(unitInChecked){
            $('.container001').fadeIn();
            $('.container001').css({'display':'flex'});
            var id = unitInChecked.value;

            $.post(
                'ajax.php',
                {
                    update0 : 'True',
                    slot : id
                },
                function(data){
                    var str = data;
                    var arr = str.split(",");
                    var inputToUpdate = $('.update-value');
                    
                    for(var i = 0; i < inputToUpdate.length; i++){
                        inputToUpdate[i].value = arr[i];
                    }

                    var status = $('.status-0033');
                    for(var i = 0; i < status.length; i++){
                        if(status[i].value == arr[arr.length - 1]){
                            status[i].selected = true;
                        }
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
        $('.container002').css({'display':'none'});
        $('.container003').css({'display':'none'});
    });

    function changeBg(){
        var status = document.querySelectorAll('.status');
    
        for(var i = 0; i < status.length; i++){

            var value = status[i].innerHTML;
            if(value == 'Fixed'){
                status[i].className = 'status bg-success text-light';
            }
            else if(value == 'Pending'){
                status[i].className = 'status bg-danger text-light';
            }
        }
    }

    changeBg();

    $('.dataTable-sorter').click(function(){
        setTimeout(function(){
            changeBg()
        },1000);
    });

});
