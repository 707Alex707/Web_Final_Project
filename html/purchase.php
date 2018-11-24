<?php
session_start();
?>


<html>
<head>
</head>
<body>


      <form action="">
            <h3>Billing Address</h3>
            <label for="fname">Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John Smith"><br>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" placeholder="johnsmith@example.com"><br>
            <label for="adr">Address</label>
            <input type="text" id="adr" name="address" placeholder="29 Mullord Ave"><br>
            <label for="city"></i> City</label>
            <input type="text" id="city" name="city" placeholder="Ajax"><br>

            
              
                <label for="province">Province</label>
                <input type="text" id="state" name="province" placeholder="ON">
              </div>
              
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="L1Z1L1">
              </div>
            </div>
          </div>

         
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
             <p> img of cards </p>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John Smith"><br>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444"><br>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September"><br>

            <div class="row">
              <div>
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018"><br>
              </div>
              <div>
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352"><br>
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label><br>
        <input type="submit" value="Continue to checkout" class="btn">
      </form>
    </div>
  </div>

  <div>
    <div>
      <h4>Cart 
        <span>
          <i class="fa fa-shopping-cart"></i> 
          <b><?php echo $_SESSION["count"];?></b>
        </span>
      </h4>
      <p>Product 1 <span class="price"></span></p>
      <p>Product 1 <span class="price"></span></p>
      <p>Product 1 <span class="price"></span></p>
      <p>Product 1 <span class="price"></span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b><?php echo $_SESSION["total"];?></b></span></p>
    </div>
  </div>
</div>
</body>
</html>