  <?php
   $payload = ["login-status" => "Sign in successful",
                     "cobra-deal-status" => "Deal updated.",
                     "cobra-user-status" => "User info updated.",
                     "forgot-password-status" => "A link to reset your password has been sent to your email.",
                     "cobra-forgot-password-status" => "A link to reset your password has been sent to your email.",
                     "reset-status" => "Password updated! You can now login.",
                     "add-deal-status" => "Deal added!",
                     "remove-cart-status" => "Deal removed from cart.",
                     "kloudpay-withdraw-status" => "Withdrawal request has been submitted and is pending review";
                     "login-status-error" => "There was a problem signing in, please contact support.",
                     "cobra-user-status-error" => "There was an error updating info for this user. Please try again.",
                     "cobra-deal-status-error" => "There was an error updating this deal. Please try again.",
                     "kloudpay-withdraw-status-error" => "Insufficient funds in KloudPay wallet";
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