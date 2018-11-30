
<script>

//-------- PRODUCT MODAL -----------------------------------------------

// Get the modal
var modal = document.getElementsByClassName('modal');

function showModal(x){
// Get the button that opens the modal
var img = document.getElementsByClassName("divmodal")[x-1];


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