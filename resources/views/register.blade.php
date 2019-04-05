@extends("layout")

@section('title',"Sign up")

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">
                        	   <div class="card bg-dark text-white">
                        	     <img class="card-img" src="img/login.jpg" alt="KloudTransact - Create an account.">
                        	     <div class="card-img-overlay" style="color: #fbb710; padding: 5px;">
                        	       <h5 class="card-title">Create an account</h5>
                        	       <p class="card-text">Create an account and start BIDDING</p>
                        	     </div>
                        	   </div>                           

                            <form action="#" method="get">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="username" value="" placeholder="Desired username" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="email" class="form-control" name="email" value="" placeholder="Valid email address" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="password" class="form-control" name="pass" value="" placeholder="Password" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="password" class="form-control" name="pass_confirmation" value="" placeholder="Confirm password" required>
                                    </div>
                                    
                                    <div class="col-12 mb-3">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Send me useful bidding tips and other promotional offers</label>
                                        </div>                                   
                                    </div>
                                    
                                    <div class="col-12">
                                        <button type="submit" class="amado-btn">Submit</button>                                                                           
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
</div>
@stop