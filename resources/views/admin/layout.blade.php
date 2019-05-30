@include("admin.head")
@include("admin.sidebar")
@include("admin.nav")
        	<!--------- Input errors -------------->
                    @if (count($errors) > 0)
                          @include('input-errors', ['errors'=>$errors])
                     @endif 
@yield("content")
@include("admin.footer")
@include("admin.foot")
