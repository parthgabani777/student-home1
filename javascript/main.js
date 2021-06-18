
//var error = document.getElementById("error");
var txtarea = document.getElementById("errtext");

function validate_field(){
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var dob = document.getElementById("dob").value;
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var cpassword = document.getElementById("cpassword").value;


    const username_regex = RegExp("^[a-zA-Z0-9]+$");
    const password_regex = RegExp("^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$");

    if(!username_regex.test(username)){
        txtarea.innerHTML= "Username is not valid. Only characters A-Z, a-z and 0-9 acceptable." 
        txtarea.style.display = "block";       
        return false;
    }
    else if(!password_regex.test(password)){
        console.log(password_regex.test(password) + password + username);
        txtarea.innerHTML = "Enter Valid Password: -.\n1. Password should contain 8 character with 1 digit, 1 uppercase and 1 lowercase letter, 1 special character.\n2. No spaces are allowed.";
        txtarea.style.display = "block"; 
        return false;
    }
    
    else if(password != cpassword){
        txtarea.innerHTML = "Password does not match";
        txtarea.style.display = "block"; 
        return false;
    }
    else{
        console.log("all");
        return true;   
    }
}