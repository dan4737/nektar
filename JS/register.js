// select all form inputs

var fullName = document.forms['Formregister']['name'];
var email = document.forms['Formregister']['email'];
var password = document.forms['Formregister']['pass'];
var confirmPassword = document.forms['Formregister']['cass'];
var country = document.forms['Formregister']['country'];
var city = document.forms['Formregister']['city'];
var phoneNumber = document.forms['Formregister']['contact'];

// select all error display elements

var nameError = document.getElementById('fullNameError');
var emailError = document.getElementById('emailError');
var passwordError = document.getElementById('passwordError');
var confirmPasswordError = document.getElementById('confirmPasswordError');
var countryError = document.getElementById('countryError');
var cityError = document.getElementById('cityError');
var contactError = document.getElementById('contactError');

// setting all event listeners

fullName.addEventListener('blur', fullNameVerify, true);
email.addEventListener('blur', emailVerify, true);
password.addEventListener('blur', passwordVerify, true);
country.addEventListener('blur', countryVerify, true);
city.addEventListener('blur', cityVerify, true);
phoneNumber.addEventListener('blur', phoneNumberVerify, true);

function validateForm(){
    //validate full name
    if (fullName.value == ""){
        nameError.innerHTML = "<span style='color: red;'> Full Name is required </span>";
       
        fullName.focus();
        return false;
    }
    if (fullName.value.length > 100){
        nameError.innerHTML = "<span style='color: red;'>Full Name is too long </span>";
        fullName.focus();
        return false;
    }
    
    if (!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)))
    {
        emailError.innerHTML = "<span style='color: red;'>Full Name is too long </span>";
        return (false);
    }
        


    
    //check if country is entered
    if (country.value == ""){
        countryError.innerHTML = "<span style='color: red;'>Country is required </span>";
        country.focus();
        return false;
    }

    //check country length
    if (country.value.length > 30){
        countryError.innerHTML = "<span style='color: red;'> Country is too long </span>";
        country.focus();
        return false;
    }

    //check if city is entered
    if (city.value == ""){
        cityError.innerHTMl= "<span style='color: red;'> City is required </span>";
        city.focus();
        return false;
    }

    //check city length
    if (city.value.length > 30){
        cityError.innerHTML = " <span style='color: red;'> Country is too long </span>";
        city.focus();
        return false;
    }

    //check if phone number is entered
    if (phoneNumber.value == ""){
        contactError.innerHTML = "<span style='color: red;'> Phone Number is required </span>";
        phoneNumber.focus();
        return false;
    }

    //check contact length
    if (phoneNumber.value.length > 15){
        contactError.innerHTML = "<span style='color: red;'> Country is too long </span>";
        phoneNumber.focus();
        return false;
    }

    //validate password
    if (password.value == ""){
        passwordError.innerHTML = "<span style='color: red;'>Password is required</span>";
        password.focus();
        return false;
    }
    if (password.value.length < 8){
        passwordError.innerHTML = "<span style='color: red;'>Password must be at least 8 characters long</span>";
        password.focus()
        return false;
    } else if (password.value.search(/[0-9]/) == -1){
        passwordError.innerHTML="<span style='color: red;'> At least 1 numeric value must be entered </span>";
        password.focus();
        return false;
    }else if (password.value.search(/[a-z]/) == -1){
        passwordError.innerHTML="<span style='color: red;'> At least 1 small letter must be entered </span>";
        password.focus();
        return false;
    }else if (password.value.search(/[A-Z]/) == -1){
        passwordError.innerHTML="<span style='color: red;'>At least 1 uppercase letter must be entered </span>";
        password.focus();
        return false;
    }

    //check if passwords match
    if (password.value != confirmPassword.value){
        confirmPasswordError.innerHTML = "<span style='color: red;'>The two passwords do not match </span>";
        return false;
    }

}