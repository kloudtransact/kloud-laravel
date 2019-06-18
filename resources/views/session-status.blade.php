  <?php
   $payload = ["login-status" => "There was a problem signing in, please contact support.",
                     "cobra-deal-status" => "Deal updated.",
                     "reset-status" => "An email has been sent to your address, click the link to reset your password",
                     "add-deal-status" => "Deal added!",
                     "remove-cart-status" => "Deal removed from cart.",
                     "pay-card-status" => "Transaction successful! ",
                     "cobra-deal-status-error" => "There was an error updating this deal. Please try again.",
                     
                   ];
   $class = "alert-warning";              
   if($val == "error"){
   	$class = "alert-danger";         
       $pop .= "-error";
   } 
  ?>                
  <div class="alert {{$class}}" role="alert">
     <p>@if($val == "error")<strong>Whoops!</strong> @endif {{$payload[$pop]}}</p>
     <button class="close" data-dismiss="alert">x</button>
     <div class="clearfix"></div>
     <br><br>                      
  </div>