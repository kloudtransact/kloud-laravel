@extends("layout")

@section('title',"Merchants")

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading">Merchants</h2>
            <hr class="my-4">
            <h3><em>Sell on KloudTransact</em></h3>
            <p>Easily import your products and sell on the <strong class="text-primary">KloudTransact</strong> platform.</p>
            <br>
            <div class="row">
            	<div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card text-center" style="">
         <div class="card-body">         
            <div class="text-primary">
            <h5 class="card-title"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></h5>
            <p class="card-text">Top Deals</p>
            <a href="{{url('top-deals')}}" class="btn btn-primary">See top deals</a>
            </div>
         </div>
       </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card text-center" style="">
         <div class="card-body">         
            <div class="text-warning">
            <h5 class="card-title"><i class="fa fa-money fa-2x" aria-hidden="true"></i></h5>
            <p class="card-text">Become a Merchant</p>
            <a href="{{url('mregister')}}" class="btn btn-primary">Go</a>
            </div>
         </div>
       </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card text-center" style="">
         <div class="card-body">         
            <div class="text-primary">
            <h5 class="card-title"><i class="fa fa-hourglass fa-2x" aria-hidden="true"></i></h5>
            <p class="card-text">Login</p>
            <a href="{{url('mlogin')}}" class="btn btn-primary">Login</a>
            </div>
         </div>
       </div>
            </div>
            </div>
            <br>
          </div>
        </div>
		@include('ad-space')
@stop