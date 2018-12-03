/*
Validation functions for billing and payment information
Author: Anson Tu
Created on: 11/30/2018
*/

/*
Function for checking user's billing information
*/
function validBillingInfo() {
    //Save the user's input
    var name = document.getElementById("fname").value;
    var email = document.getElementById("email").value;
    var address = document.getElementById("adr").value;
    var city = document.getElementById("city").value;
    var province = document.getElementById("state").value;
    var postalCode = document.getElementById("zip").value;
    //Create regex sequences to validate the user's input
    var nameCheck = /^[A-Za-z]{1,} [A-Za-z]{1,}$/;
    var addressCheck = /^[0-9]{0,5} [A-Za-z]{1,} [A-Za-z]{1,}$|^[0-9]{0,5} [A-Za-z]{1,} [A-Za-z]{1,} [A-Za-z]{1,}$|^[0-9]{0,5} [A-Za-z]{1,} [A-Za-z]{1,} [A-Za-z]{1}$/;
    var cityCheck = /^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/;
    var provinceCheck = /^[a-zA-Z]+(?:[\s-][a-zA-Z]+)*$/;
    var postalCheck = /^[ABCEGHJKLMNPRSTVXYabcrghjklmnprstvxy][0-9][ABCEGHJKLMNPRSTVWXYZabceghjklmnprstvwxyz][0-9][ABCEGHJKLMNPRSTVWXYZabceghjklmnprstvwxyzs][0-9]$/;
    //Compare the user's input to the regex sequences. If there are any errors, stop submitting, and output an error message
    if (name == "" || email == "" || address == "" || city == "" || province == "" || postalCode == "") {
        event.preventDefault(); //One or more fields were left empty
        alert("One or more fields for the billing address need to be filled");
    } else if (!nameCheck.exec(name)) {
        event.preventDefault(); //Error with the user's name
        alert("Invalid billing name" + "\n" + "Ex: John Doe");
    } else if (!addressCheck.exec(address)) {
        event.preventDefault(); //Error with the user's address
        alert("Invalid billing address" + "\n" + "Ex: 2000 Simcoe Street");
    } else if (!cityCheck.exec(city)) {
        event.preventDefault(); //Error with the user's city name
        alert("Invalid billing city name" + "\n" + "Ex: Oshawa");
    } else if (!provinceCheck.exec(province)) {
        event.preventDefault(); //Error with the user's province name
        alert("Invalid billing province name" + "\n" + "Ex: Ontario");
    } else if (!postalCheck.exec(postalCode)) {
        event.preventDefault(); //Error with the user's postal code
        alert("Invalid billing postal code" + "\n" + "Ex: L2E4V9");
    }
}

/*
Function for checking user's credit card information
*/
function validCreditInfo() {
    //Save the user's input
    var cName = document.getElementById("cname").value;
    var cardNum = document.getElementById("ccnum").value;
    var expDate = document.getElementById("expdate").value;
    var cvv = document.getElementById("cvv").value;
    //Create regex sequences to validate the user's input
    var cNameCheck = /^[A-Za-z]{1,} [A-Za-z]{1,}$/;
    var cardNumCheck = /^[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}$|^[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}$|^[0-9]{16}$/;
    var expDateCheck = "2018-11";
    //var expMonthCheck = /^January$|February$|March$|April$|May$|June$|July$|August$|September$|October$|November$|December$/
    //var expYearCheck = /^201[8-9]{1}$|^20[2-9]{1}[0-9]{1}$/;
    var cvvCheck = /^[0-9]{3}$/;
    //Compare the user's input to the regex sequences. If there are any errors, stop submitting, and output an error message
    if (cName == "" || cardNum == "" || expDate == "" || cvv == "") {
        event.preventDefault(); //One or more fields were left empty
        alert("One or more fields for the payment information need to be filled");
    } else if (!cNameCheck.exec(cName)) {
        event.preventDefault(); //Error with the credit card owner's name
        alert("Invalid credit card owner name" + "\n" + "Ex: John Doe");
    } else if (!cardNumCheck.exec(cardNum)) {
        event.preventDefault(); //Error with the credit card number
        alert("Invalid credit card number" + "\n" + "Ex: 1111-2222-3333-4444, 1111 2222 3333 4444, 1111222233334444");
    } else if (expDate <= expDateCheck) {
        event.preventDefault(); //Error with the credit card expiration month
        alert("Invalid card expiry date" + "\n" + "Ex: January 2020");
    } else if (!cvvCheck.exec(cvv)) {
        event.preventDefault(); //Error with the credit card cvv
        alert("Invalid card cvv" + "\n" + "Ex: 123");
    }
}

/*
Function containing all validation methods
Called when user tries to submit
*/
function validInfo() {
    validBillingInfo();
    validCreditInfo();
}