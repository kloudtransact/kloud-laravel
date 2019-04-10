<?php
$showBanner = true; 
$cookieString = "kloudtransact_gdpr";
?>

@if($showBanner)
    <div id="cookieConsent" class="alert alert-info alert-dismissible fade show" role="alert">
        We use cookies to make interaction with our website and services easy and meaningful, to better understand how they are used and to tailor advertising. By continuing to use this site you are giving us your consent to do this. <a href="{{url('privacy')}}">Learn More</a>.
        <button type="button" class="accept-policy close" data-dismiss="alert" aria-label="Close" data-cookie-string="{{$cookieString}}">
            <span aria-hidden="true">Accept</span>
        </button>
    </div>
    <script>
        (function () {
            var button = document.querySelector("#cookieConsent button[data-cookie-string]");
            button.addEventListener("click", function (event) {
                document.cookie = button.dataset.cookieString;
            }, false);
        })();
    </script>
@endif