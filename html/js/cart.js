
 var y =document.getElementById("cart"+x);
function addCart(){
  
    y = y + 1;
    

    return y;
}

function result(){
    
    var w =addCart();
   
    var total = (w);
    document.getElementsByClassName("icon").innerHTML = total;
   // document.getElementById("aftertax").innerHTML = (total*1.13).toFixed(2);
    
}