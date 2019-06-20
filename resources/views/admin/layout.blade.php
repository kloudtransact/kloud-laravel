@include("admin.head")
@include("admin.sidebar")
@include("admin.nav")     

<!--------- Session notifications-------------->
        	<?php
               $pop = ""; $val = "";
               
               if(isset($signals))
               {
                  foreach($signals['okays'] as $s)
                  {
                    if(session()->has($s))
                    {
                  	$pop = $s; $val = session()->get($s);
                    }
                 }
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
