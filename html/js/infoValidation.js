/*
Validation functions for billing and payment information
*/

/*
Function for checking billing information
*/
function validBillingInfo() {
    var name = document.getElementById("fname").value;
    var email = document.getElementById("email").value;
    var address = document.getElementById("adr").value;
    var city = document.getElementById("city").value;
    var province = document.getElementById("province").value;
    var postalCode = document.getElementById("zip").value;
    var nameCheck = /^[a-z ,.'-]+$/i;
    var addressCheck = /^[A-Za-z0-9'\.\-\s\,]/;
    var cityCheck = /^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/;
    var provinceCheck = /^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/;
    var postalCheck = /^[0-9A-Za-z]{6}$/;
    if (name == "" || email == "" || address == "" || city == "" || province == "" || postalCode == "") {
        event.preventDefault();
        alert("One or more fields need to be filled");
    } else if (!nameCheck.exec(name)) {
        event.preventDefault();
        alert("Invalid name");
    } else if (!addressCheck.exec(address)) {
        event.preventDefault();
        alert("Invalid address");
    } else if (!cityCheck.exec(city)) {
        event.preventDefault();
        alert("Invalid city name");
    } else if (!provinceCheck.exec(province)) {
        event.preventDefault();
        alert("Invalid province name");
    } else if (!postalCheck.exec(postalCode)) {
        event.preventDefault();
        alert("Invalid postal code");
    } else {
        return true;
    }
}

function validCreditInfo() {
    
}

function validInfo() {
    if (validBillingInfo() && validCreditInfo() == true) {

    }
}