function incorrectSignUp() {
    var isCorrect= true;
    var firstname = document.getElementById("firstname").value;
    var lastname = document.getElementById("lastname").value;
    var born_day = document.getElementById("born-day").value;
    var born_month = document.getElementById("born-month").value;
    var born_year = document.getElementById("born-year").value;
    var username = document.getElementById("username").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var confirm_password = document.getElementById("confirm_password").value;

    if(firstname=="") {
        isCorrect= false;
        $('#firstnameEmpty').css({"display":"block","color":"#ba3538","font-size":"0.9em","margin-bottom":"10px"});
        $('#firstname').css({"border":"1px solid #ba3538"});
    } else{
        $('#firstnameEmpty').css({"display":"none"});
        $('#firstname').css({"border":"1px solid #8b8b8b"});
    }
    if(lastname=="") {
        isCorrect= false;
        $('#lastnameEmpty').css({"display":"block","color":"#ba3538","font-size":"0.9em","margin-bottom":"10px"});
        $('#lastname').css({"border":"1px solid #ba3538"});
    } else{
        $('#lastnameEmpty').css({"display":"none"});
        $('#lastname').css({"border":"1px solid #8b8b8b"});
    }
    if(born_day=="") {
        isCorrect= false;
        $('#borndateEmpty').css({"display":"block","color":"#ba3538","font-size":"0.9em","margin-bottom":"10px"});
        $('#born-day').css({"border":"1px solid #ba3538"});
    } else{
        $('#born-day').css({"border":"1px solid #8b8b8b"});
    }
    if(born_month=="Mes") {
        isCorrect= false;
        $('#borndateEmpty').css({"display":"block","color":"#ba3538","font-size":"0.9em","margin-bottom":"10px"});
        $('#born-month').css({"border":"1px solid #ba3538"});
    } else{
        $('#born-month').css({"border":"1px solid #8b8b8b"});
    }
    if(born_year=="") {
        isCorrect= false;
        $('#borndateEmpty').css({"display":"block","color":"#ba3538","font-size":"0.9em","margin-bottom":"10px"});
        $('#born-year').css({"border":"1px solid #ba3538"});
    } else{
        $('#born-year').css({"border":"1px solid #8b8b8b"});
    }
    if(born_day!=""&&born_month!="Mes"&&born_year!=""){
        $('#borndateEmpty').css({"display":"none"});
    }else{
        /*var today_date =  new Date();
        var expire_date = new Date();
        expire_date.setFullYear(1920,1,1);
        var user_birth_date = new Date();
        user_birth_date.setFullYear(parseInt(born_year),parseInt(born_month),parseInt(born_day));
        if(user_birth_date<expire_date||user_birth_date>today_date) {
            isCorrect=false;
        }*/
    }
    if(!document.getElementById('male').checked) {
        if(!document.getElementById('female').checked) {
            isCorrect = false;
            $('#genderEmpty').css({"display": "block", "color": "#ba3538","font-size":"0.9em","margin-bottom":"10px"});
        }
    }
    if(document.getElementById('male').checked||document.getElementById('female').checked){
        $('#genderEmpty').css({"display": "none"});
    }
    if(username=="") {
        isCorrect= false;
        $('#usernameEmpty').css({"display":"block","color":"#ba3538","font-size":"0.9em","margin-bottom":"10px"});
        $('#username').css({"border":"1px solid #ba3538"});
    } else{
        $('#usernameEmpty').css({"display":"none"});
        $('#username').css({"border":"1px solid #8b8b8b"});
        $.ajax({
            type: 'post',
            url: '../assets/php/signup_validation_client.php',
            async: false,
            data: {username:username,},
            success: function (response) {
                if(response==false){
                    isCorrect= false;
                }
            }
        });
    }
    if(email==""){
        $('#emailEmpty').css({"display":"block","color":"#ba3538","font-size":"0.9em","margin-bottom":"10px"});
        $('#email').css({"border":"1px solid #ba3538",});
        isCorrect= false;
    } else{
        $('#emailEmpty').css({"display":"none"});
        $('#email').css({"border":"1px solid #8b8b8b"});
        $.ajax({
            type: 'post',
            url: '../assets/php/signup_validation_client.php',
            async: false,
            data: {email:email,},
            success: function (response) {
                if(response==false){
                    isCorrect= false;
                }
            }
        });
    }
    if(password==""){
        $('#passwordEmpty').css({"display":"block","color":"#ba3538","font-size":"0.9em","margin-bottom":"10px"});
        $('#password').css({"border":"1px solid #ba3538"});
        isCorrect= false;
    } else{
        $('#passwordEmpty').css({"display":"none"});
        $('#password').css({"border":"1px solid #8b8b8b"});
    }
    if(confirm_password=="") {
        isCorrect= false;
        $('#confirmpasswordEmpty').css({"display":"block","color":"#ba3538","font-size":"0.9em","margin-bottom":"10px"});
        $('#confirm_password').css({"border":"1px solid #ba3538"});
    } else{
        $('#confirmpasswordEmpty').css({"display":"none"});
        $('#confirm_password').css({"border":"1px solid #8b8b8b"});
    }
    if(password!=""&&confirm_password!=""){
        if(password!=confirm_password){
            isCorrect=false;
            $('#passwordNotMatch').css({"display":"block","color":"#ba3538","font-size":"0.9em","margin-bottom":"10px"});
        } else{
            $('#passwordNotMatch').css({"display":"none"});
        }
    }
    return isCorrect;
}

function onFocusFirstname(){
    $('#firstname').css({"border":"1px solid #000000",});
    $('#firstnameEmpty').css({"display":"none"});
}
function onFocusLastname(){
    $('#lastname').css({"border":"1px solid #000000",});
    $('#lastnameEmpty').css({"display":"none"});
}
function onFocusBornday(){
    $('#born-day').css({"border":"1px solid #000000",});
    $('#born-month').css({"border":"1px solid #000000",});
    $('#born-year').css({"border":"1px solid #000000",});
    $('#borndateEmpty').css({"display":"none"});
}
function onFocusBornmonth(){
    $('#born-day').css({"border":"1px solid #000000",});
    $('#born-month').css({"border":"1px solid #000000",});
    $('#born-year').css({"border":"1px solid #000000",});
    $('#borndateEmpty').css({"display":"none"});
}
function onFocusBornyear(){
    $('#born-day').css({"border":"1px solid #000000",});
    $('#born-month').css({"border":"1px solid #000000",});
    $('#born-year').css({"border":"1px solid #000000",});
    $('#borndateEmpty').css({"display":"none"});
}
function onFocusMale(){
    $('#genderEmpty').css({"display":"none"});
}
function onFocusFemale(){
    $('#genderEmpty').css({"display":"none"});
}
function onFocusUsername(){
    $('#username').css({"border":"1px solid #000000",});
    $('#usernameEmpty').css({"display":"none"});
}
function onFocusEmail(){
    $('#email').css({"border":"1px solid #000000",});
    $('#emailEmpty').css({"display":"none"});
}
function onFocusPassword(){
    $('#password').css({"border":"1px solid #000000",});
    $('#passwordEmpty').css({"display":"none"});
}
function onFocusConfirmpassword(){
    $('#confirm_password').css({"border":"1px solid #000000",});
    $('#confirmpasswordEmpty').css({"display":"none"});
}

function onFocusLostFirstname(){
    $('#firstname').css({"border":"1px solid #8b8b8b",});
}
function onFocusLostLastname(){
    $('#lastname').css({"border":"1px solid #8b8b8b",});
}
function onFocusLostBornday(){
    $('#born-day').css({"border":"1px solid #8b8b8b",});
    $('#born-month').css({"border":"1px solid #8b8b8b",});
    $('#born-year').css({"border":"1px solid #8b8b8b",});
}
function onFocusLostBornmonth(){
    $('#born-day').css({"border":"1px solid #8b8b8b",});
    $('#born-month').css({"border":"1px solid #8b8b8b",});
    $('#born-year').css({"border":"1px solid #8b8b8b",});
}
function onFocusLostBornyear(){
    $('#born-day').css({"border":"1px solid #8b8b8b",});
    $('#born-month').css({"border":"1px solid #8b8b8b",});
    $('#born-year').css({"border":"1px solid #8b8b8b",});
}
function onFocusLostUsername(){
    $('#username').css({"border":"1px solid #8b8b8b",});
    validate_username();
}
function onFocusLostEmail(){
    $('#email').css({"border":"1px solid #8b8b8b",});
    validate_email();
}
function onFocusLostPassword(){
    $('#password').css({"border":"1px solid #8b8b8b",});
}
function onFocusLostConfirmpassword(){
    $('#confirm_password').css({"border":"1px solid #8b8b8b",});
}

$(document).ready(
    function () {
        history.pushState(null, null, "signup.php")
    }
);

function validate_username() {
    var username=document.getElementById( "username" ).value;
    $.ajax({
        type: 'post',
        url: '../assets/php/signup_validation_client.php',
        data: {username:username,},
        success: function (response) {
            if(response==true) {
                $('#username_validation').css({"display":"none"});
                $('#username').css({"border":"1px solid #8b8b8b"});
                return true;
            } else {
                $('#username_validation').css({"display":"block","color":"#ba3538","font-size":"0.9em","margin-bottom":"10px"});
                $('#username').css({"border":"1px solid #ba3538"});
                return false;
            }
        }
    });
}

function validate_email() {
    var email=document.getElementById( "email" ).value;
    $.ajax({
        type: 'post',
        url: '../assets/php/signup_validation_client.php',
        data: {email:email,},
        success: function (response) {
            if(response==true) {
                $('#email_validation').css({"display":"none"});
                $('#email').css({"border":"1px solid #8b8b8b"});
                return true;
            } else {
                $('#email_validation').css({"display":"block","color":"#ba3538","font-size":"0.9em","margin-bottom":"10px"});
                $('#email').css({"border":"1px solid #ba3538"});
                return false;
            }
        }
    });
}
