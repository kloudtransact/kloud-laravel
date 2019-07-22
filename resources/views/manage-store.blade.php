@extends("layout")

@section('title',"Manage Store")

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading">Manage Store</h2>
            <hr class="my-4">
            <h3><em>Store Management Portal!</em></h3>
            <p>Manage your store information, import your products and track your sales history</p>
            <br>
            <div class="row">
            	<div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card text-center" style="">
         <div class="card-body">         
            <div class="text-primary">
            <h5 class="card-title"><i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i></h5>
            <p class="card-text">Manage Store</p>
            <a href="{{url('manage-my-store')}}" class="btn btn-primary">Manage store</a>
            </div>
         </div>
       </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card text-center" style="">
         <div class="card-body">         
            <div class="text-warning">
            <h5 class="card-title"><i class="fa fa-money fa-2x" aria-hidden="true"></i></h5>
            <p class="card-text">Import Products</p>
            <a href="{{url('deal-new')}}" class="btn btn-primary">Import products</a>
            </div>
         </div>
       </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6">
              <div class="card text-center" style="">
         <div class="card-body">         
            <div class="text-primary">
            <h5 class="card-title"><i class="fa fa-hourglass fa-2x" aria-hidden="true"></i></h5>
            <p class="card-text">Track your sales history</p>
            <a href="{{url('sales-history')}}" class="btn btn-primary">Track sales</a>
            </div>
         </div>
       </div>
            </div>
            </div>
            <br>
            	<center><a href="{{url('wallet')}}" class="amado-btn">Go to your KloudPay Wallet</a></center>
          </div>
        </div>
@stop