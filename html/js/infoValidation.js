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
    var province = document.getElementById("state").value;
    var postalCode = document.getElementById("zip").value;
    var nameCheck = /^[A-Z]{1}[a-z]{1,} [A-Z]{1}[a-z]{1,}$/;
    var addressCheck = /^[0-9]{0,5} [A-Z]{1}[a-z]{1,} [A-Z]{1}[a-z]{1,}$/;
    var cityCheck = /^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/;
    var provinceCheck = /^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/;
    var postalCheck = /^[ABCEGHJKLMNPRSTVXY][0-9][ABCEGHJKLMNPRSTVWXYZ][0-9][ABCEGHJKLMNPRSTVWXYZ][0-9]/;
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
    }
}

function validCreditInfo() {
    var cName = document.getElementById("cname").value;
    var cardNum = document.getElementById("ccname").value;
    var expMonth = document.getElementById("expmonth").value;
    var expYear = document.getElementById("expyear").value;
    var ccv = document.getElementById("ccv").value;
    var cNameCheck = /^[A-Z]{1}[a-z]{1,} [A-Z]{1}[a-z]{1,}$/;
    var cardNumCheck = /^[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}$/;
    var expMonthCheck = /^January$|February$|March$|April$|May$|June$|July$|August$|September$|October$|November$|December$/
    var expYearCheck = /^201[8-9]{1}$|20[2-9]{1}[0-9]{1}$/;
    var ccvCheck = /^[0-9]{3}$/;
    debugger;
    if (cName == "" || cardNum == "" || expMonth == "" || expYear == "" || ccv == "") {
        event.preventDefault();
        alert("One or more fields need to be filled");
    } else if (!cNameCheck.exec(cName)) {
        event.preventDefault();
        alert("Invalid credit card owner name");
    } else if (!cardNumCheck.exec(cardNum)) {
        event.preventDefault();
        alert("Invalid credit card number");
    } else if (!expMonthCheck.exec(expMonth)) {
        event.preventDefault();
        alert("Invalid card expiry month");
    } else if (!expYearCheck.exec(expYear)) {
        event.preventDefault();
        alert("Invalid card expiry year");
    } else if (!ccvCheck.exec(ccv)) {
        event.preventDefault();
        alert("Invalid card ccv");
    }
}

function validInfo() {
    validBillingInfo();
    validCreditInfo();
}