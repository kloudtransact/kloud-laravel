  <?php
   $payload = ["login-status" => "There was a problem signing in, please contact support.",
                     "register-status" => "Welcome to KloudTransact! You can now log in to your account.",
                     "reset-status" => "An email has been sent to your address, click the link to reset your password",
                   ];
   $class = "alert-warning";              
   if($val == "error") $class = "alert-danger";         
  ?>                
  <div class="alert {{$class}}" role="alert">
     <p>@if($val == "error")<strong>Whoops!</strong> @endif {{$payload[$pop]}}</p>
     <button class="close" data-dismiss="alert">x</button>
     <div class="clearfix"></div>
     <br><br>                      
  </div>