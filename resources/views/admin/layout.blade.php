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
               if(session()->has("reset-status"))
               {
               	$pop = "reset-status"; $val = session()->get("reset-status");
               }
               if(session()->has("add-deal-status"))
               {
               	$pop = "add-deal-status"; $val = session()->get("add-deal-status");
               }
               if(session()->has("remove-cart-status"))
               {
               	$pop = "remove-cart-status"; $val = session()->get("remove-cart-status");
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
                   @include('session-status',['pop' => $pop, 'val' => $val])
                 @endif
        	<!--------- Input errors -------------->
                    @if (count($errors) > 0)
                          @include('input-errors', ['errors'=>$errors])
                     @endif 
  	
@yield("content")
@include("admin.footer")
@include("admin.foot")
