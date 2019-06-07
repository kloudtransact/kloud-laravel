@extends("layout")

@section('title',"Transfer Funds to Other KloudPay Wallets")

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading mt-1">Transfer Funds to Other KloudPay Wallets</h2>
            <hr class="my-4">
             <div class="checkout_details_area mt-50 clearfix">
                            <div class="card">                        	     
                        	     <div class="card-body">
                        	
                        	       <h3 class="card-title" style="color: #fbb710 !important; padding: 5px;"><i class="fa fa-briefcase"></i> Balance: &#8358;{{number_format($wallet['balance'],2)}}</h3>                     
                                   <form action="{{url('kloudpay-transfer')}}" method="post">
                                   	{!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <p class="form-control-plaintext"><i class="fa fa-at"></i> Recipient email address:</p><br>
                                        <input type="email" class="form-control" name="email" value="" placeholder="Enter recipirnt email" required><br>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <p class="form-control-plaintext"><i class="fa fa-briefcase"></i> Enter amount to transfer:</p><br>
                                        <input type="number" class="form-control" name="amount" value="" placeholder="Enter amount" required><br>                                     
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="amado-btn">Make transfer</button>                                                                           
                                    </div>
                                </div>
                            </form>
                        	     </div>
                        	   </div>                           
                       
                        </div>
          </div>
  @include('ad-space')      
@stop