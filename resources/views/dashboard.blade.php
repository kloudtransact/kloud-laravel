@extends("layout")

@section('title',"Dashboard")

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading">Dashboard</h2>
            <hr class="my-4">
          </div>
</div>   

<div class="row mb-5">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card text-center" style="">
         <div class="card-body">         
            <div class="">
            <h5 class="card-title"><i class="fa fa-briefcase fa-2x" aria-hidden="true"></i></h5>
            <p class="card-text">&#8358;25,000.00</p>
            <a href="{{url('wallet')}}" class="btn btn-primary">Go to wallet</a>
            </div>
         </div>
       </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card text-center" style="">
         <div class="card-body">         
            <div class="">
            <h5 class="card-title"><i class="fa fa-check-square-o fa-2x" aria-hidden="true"></i></h5>
            <p class="card-text text-success">Account Verified</p>
            <a href="{{url('profile')}}" class="btn btn-primary">View profile</a>
            </div>
         </div>
       </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card text-center" style="">
         <div class="card-body">         
            <div class="">
            <h5 class="card-title"><i class="fa fa-shopping-bag fa-2x" aria-hidden="true"></i></h5>
            <p class="card-text text-success">0 unpaid orders</p>
            <a href="{{url('orders')}}" class="btn btn-primary">View orders</a>
            </div>
         </div>
       </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card text-center" style="">
         <div class="card-body">         
            <div class="">
            <h5 class="card-title"><i class="fa fa-hourglass-half fa-2x" aria-hidden="true"></i></h5>
            <p class="card-text">No ongoing auctions</p>
            <a href="{{url('my-auctions')}}" class="btn btn-primary">Go to auctions</a>
            </div>
         </div>
       </div>
            </div>
          </div>

<div class="row mb-5">
          <div class="col-lg-12 mx-auto text-center">
            <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Notifications</h4>
                  <p class="card-category">as at <?=date("jS F, Y")?> <a class="btn btn-success pull-right" href="{{url('transactions')}}">View more</a></p>                 
                </div>
                <div class="card-body table-responsive">
                  <table class="table table-hover">
                    <thead class="text-warning">
                                                <th>Type</th>
                                                <th>Description</th>
                                                <th>Amount (&#8358;)</th>
                    </thead>
                    <tbody>
                      <tr>
                        <td><span class="badge badge-info">DEPOSIT</span></td>
                        <td>Deposited to KloudPay Wallet</td>
                        <td>10,000</td>
                      </tr>
                      <tr>
                        <td><span class="badge badge-primary">TRANSFER</span></td>
                        <td>Transferred to <a href="#">topewer</a>'s KloudPay Wallet</td>
                        <td>5,000</td>
                      </tr>
                      <tr>
                        <td><span class="badge badge-success">PAID</span></td>
                        <td>Paid for order <a href="#">KLO456884528</a> via KloudPay Wallet</td>
                        <td>5,000</td>
                      </tr>
                      <tr>
                        <td><span class="badge badge-danger">REFUND</span></td>
                        <td>Refund for order <a href="#">KLO456884528</a> to KloudPay Wallet</td>
                        <td>5,000</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
          </div>
</div>       

@include('ad-space')
     
@stop