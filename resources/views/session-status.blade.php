  <?php
   $payload = ["login-status" => "There was a problem signing in, please contact support.",
                     "register-status" => "Welcome to KloudTransact! You can now log in to your account.",
                     "reset-status" => "An email has been sent to your address, click the link to reset your password",
                     "add-deal-status" => "Deal added!",
                     "remove-cart-status" => "Deal removed from cart.",
                     "pay-card-status" => "Transaction successful! ",
                     "pay-card-status-error" => "Transaction was not successful, please check your card details and try again ",
                     "pay-kloudpay-status" => "Transaction successful! ",
                     "pay-kloudpay-status-error" => "Transaction was not successful, please check your wallet balance and try again ",
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