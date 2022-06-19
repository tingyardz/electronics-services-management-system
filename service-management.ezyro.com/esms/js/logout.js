function logout(){

    var element = document.getElementById('logout');
    var permission = confirm("Are you sure you want to logout the system?");

    if(permission){

        element.href="?logout=";
    }
}