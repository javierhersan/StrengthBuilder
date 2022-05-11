function incorrectLogin(){
    var email=document.getElementById("email").value;
    var password=document.getElementById("password").value;
    if(email==""&&password==""){
        $('#emailEmpty').css({"display":"block","color":"#ba3538","font-size":"0.9em","margin-bottom":"10px"});
        $('#email').css({"border":"1px solid #ba3538"});
        $('#passwordEmpty').css({"display":"block","color":"#ba3538","font-size":"0.9em","margin-bottom":"10px"});
        $('#password').css({"border":"1px solid #ba3538",});
        return false;
    } else if(email==""){
        $('#emailEmpty').css({"display":"block","color":"#ba3538","font-size":"0.9em","margin-bottom":"10px"});
        $('#email').css({"border":"1px solid #ba3538",});
        $('#passwordEmpty').css({"display":"none"});
        $('#password').css({"border":"1px solid #8b8b8b"});
        return false;
    } else if(password==""){
        $('#emailEmpty').css({"display":"none"});
        $('#email').css({"border":"1px solid #8b8b8b"});
        $('#passwordEmpty').css({"display":"block","color":"#ba3538","font-size":"0.9em","margin-bottom":"10px"});
        $('#password').css({"border":"1px solid #ba3538",});
        return false;
    } else {
        return true;
    }
}

function onFocusEmail(){
    $('#email').css({"border":"1px solid #000000"});
    $('#emailEmpty').css({"display":"none"});
}

function onFocusPassword(){
    $('#password').css({"border":"1px solid #000000"});
    $('#passwordEmpty').css({"display":"none"});
}

function onLostFocusEmail(){
    $('#email').css({"border":"1px solid #8b8b8b",});
}

function onLostFocusPassword(){
    $('#password').css({"border":"1px solid #8b8b8b",});
}

$(document).ready(
    function () {
        history.pushState(null, null, "login.php")
    }
);
