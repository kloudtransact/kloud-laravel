@extends("layout")

@section('title',"Add Money to KloudPay")

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading mt-1">Add Money to KloudPay</h2>
            <hr class="my-4">
             <div class="checkout_details_area mt-50 clearfix">
                            <div class="card bg-dark text-white">                        	     
                        	     <div class="card-body">
                        	       <h1 class="card-title" style="color: #fbb710 !important; padding: 5px;">Log in</h1>
                        	       <h3 class="card-text" style="color: #fbb710 !important; padding: 5px;">Log in to your account.</h3>
                        
                                   <form action="#" method="get">
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <p class="form-control-plaintext"><i class="fa fa-briefcase"></i> KloudPay: &#8358;0.00</p><br>
                                        <input type="number" class="form-control" name="amount" value="" placeholder="Enter amount" required>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" class="amado-btn">Add to KloudPay</button>                                                                           
                                    </div>
                                </div>
                            </form>
                        	     </div>
                        	   </div>                           
                       
                        </div>
          </div>
        </div>
@stop