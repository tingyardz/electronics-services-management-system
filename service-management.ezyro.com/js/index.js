    var username = document.querySelector('#username');
    var password = document.querySelector('#password');
    
    username.addEventListener('focusin', function(){
        document.querySelector('#first-inp-wrapper').style.outline = '#1877f2 solid 1px';
    });

    username.addEventListener('focusout', function(){
        document.querySelector('#first-inp-wrapper').style.outline = 'solid 1px rgb(170, 170, 170)';
    });

    password.addEventListener('focusin', function(){
        document.querySelector('#second-inp-wrapper').style.outline = '#1877f2 solid 1px';
    });

    password.addEventListener('focusout', function(){
        document.querySelector('#second-inp-wrapper').style.outline = 'solid 1px rgb(170, 170, 170)';
    });