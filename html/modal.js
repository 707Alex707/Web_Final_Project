// Login Modal
var modal_login = document.getElementById('modal-login');
var loginbtn = document.getElementById("loginBtn");
var loginspan = document.getElementsByClassName("loginClose")[0];

// When the user clicks on the button, open the modal 
loginbtn.onclick = function() {
    modal_login.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
loginspan.onclick = function() {
    modal_login.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal_login) {
        modal_login.style.display = "none";
    }
}


// Register Modal
var modal_register = document.getElementById('modal-register');
var registerbtn = document.getElementById("registerBtn");
var registerspan = document.getElementsByClassName("registerClose")[0];

// When the user clicks on the button, open the modal 
registerbtn.onclick = function() {
    modal_register.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
registerspan.onclick = function() {
    modal_register.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal_register) {
        modal_register.style.display = "none";
    }
}







//------------------------------------------------------------------------------
var x=0;
// Get the modal
var modal = document.getElementsByClassName('modal');


// Get the button that opens the modal
var img = document.getElementsByClassName("img")[1];


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[1];


// When the user clicks on the button, open the modal 
img.onclick = function() {
    modal[1].style.display = "block";
   
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal[1].style.display = "none";
    
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal[1]) {
        modal[1].style.display = "none";
        
    }
}



