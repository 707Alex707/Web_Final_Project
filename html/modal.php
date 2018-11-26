
<script>
// Login Modal
var modal_login = document.getElementById('modal-login');
var loginbtn = document.getElementById("loginBtn");
var loginspan = document.getElementsByClassName("loginClose")[0];
var modal_register = document.getElementById('modal-register');
function login(){
// When the user clicks on the button, open the modal 
    modal_login.style.display = "block";
    modal_register.style.display = "none";

// When the user clicks on <span> (x-1), close the modal
loginspan.onclick = function() {
    modal_login.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal_login) {
        modal_login.style.display = "none";
    }
}
}

// Register Modal

var registerbtn = document.getElementById("registerBtn");
var registerspan = document.getElementsByClassName("registerClose")[0];
// When the user clicks on the button, open the modal 
function register(){
    modal_register.style.display = "block";
    modal_login.style.display = "none";

// When the user clicks on <span> (x-1), close the modal
registerspan.onclick = function() {
    modal_register.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal_register) {
        modal_register.style.display = "none";
    }
}
}






//-------- PRODUCT MODAL -----------------------------------------------

// Get the modal
var modal = document.getElementsByClassName('modal');

function showModal(x){
// Get the button that opens the modal
var img = document.getElementsByClassName("img")[x-1];


// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[x-1];


// When the user clicks on the button, open the modal 

    modal[x-1].style.display = "block";
   


// When the user clicks on <span> (x-1), close the modal
span.onclick = function() {
    modal[x-1].style.display = "none";
    
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal[x-1]) {
        modal[x-1].style.display = "none";
        
    }
}
}


</script>