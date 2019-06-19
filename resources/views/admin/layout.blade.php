@include("admin.head")
@include("admin.sidebar")
@include("admin.nav")     

<!--------- Session notifications-------------->
        	<?php
               $pop = ""; $val = "";
               
               if(session()->has("login-status"))
               {
               	$pop = "login-status"; $val = session()->get("login-status");
               }
               if(session()->has("cobra-deal-status"))
               {
               	$pop = "cobra-deal-status"; $val = session()->get("cobra-deal-status");
               }
               if(session()->has("cobra-user-status"))
               {
               	$pop = "cobra-user-status"; $val = session()->get("cobra-user-status");
               }
               if(session()->has("cobra-forgot-password-status"))
               {
               	$pop = "cobra-forgot-password-status"; $val = session()->get("cobra-forgot-password-status");
               }
               if(session()->has("reset-password-status"))
               {
               	$pop = "reset-password-status"; $val = session()->get("reset-password-status");
               }
               if(session()->has("pay-card-status"))
               {
               	$pop = "pay-card-status"; $val = session()->get("pay-card-status");
               }
               if(session()->has("pay-kloudpay-status"))
               {
               	$pop = "pay-kloudpay-status"; $val = session()->get("pay-kloudpay-status");
               }
             ?> 

                 @if($pop != "" && $val != "")
                   <div class='row'>
                   @include('session-status',['pop' => $pop, 'val' => $val])
                   </div>
                 @endif
        	<!--------- Input errors -------------->
                    @if (count($errors) > 0)
                          <div class='row'>
                          @include('input-errors', ['errors'=>$errors])
                          </div>
                     @endif 
  	
@yield("content")
@include("admin.footer")
@include("admin.foot")
