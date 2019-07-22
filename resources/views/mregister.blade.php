@extends("layout")

@section('title',"Sign up")

@section('content')
<script> let cdb = "store";</script>
<div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-12">
                        <div class="checkout_details_area mt-50 clearfix">
                        	   <div class="card text-white">
                        	     <!--<img class="card-img" src="img/login.jpg" alt="KloudTransact - Create an account." style="height: 25% !important;">-->
                        	     <div class="card-img-overlayy ml-5">
                        	       <h2 class="card-title" style="color: #fbb710 !important; padding: 5px;">Become a Merchant</h2>
                        	       <h4 class="card-text" style="padding: 5px;">Creating your own store is super easy! Just fill in the details below and we are good to go.</h4>
                        
                                   <form action="{{url('mregister')}}" method="post" class="text-white mb-50">
                                   	{!!csrf_field()!!}
									<input type="hidden" name="dcd" value="jax" required>
									<input type="hidden" name="ird" id="ird" value="" required>
                                <div class="row">
								<?php
								 $fname = ""; $lname = ""; $email = "";
								 $phone = "";
								 
								 if(isset($user) && $user !== null){
									 $fname = $user->fname; $lname = $user->lname; $email = $user->email;
								     $phone = $user->phone;
								 }
								?>
                                    <div class="col-md-6 mb-3">                                       
                                        <input type="text" class="form-control" name="fname" value="{{$fname}}" placeholder="First name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="lname" value="{{$lname}}" placeholder="Last name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="email" class="form-control" name="email" value="{{$email}}" placeholder="Valid email address" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" name="phone" value="{{$phone}}" placeholder="Phone number" required>
                                    </div>
									<div class="col-md-12 mb-3">
										<input type="text" class="form-control" name="sname" value="" placeholder="Your store name" required><br>
                                        <textarea class="form-control" name="description" value="" placeholder="Enter store description" required></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <p class="form-control-plaintext mb-1">Friendly store URL. e.g for Tasha's Wears: tasha-wears</p><br>
                                        <input type="text" class="form-control" name="flink" value="" placeholder="Friendly URL" required>
                                    </div>
									<div class="col-md-6 mb-3">
                                        <p class="form-control-plaintext mb-1">Choose your store image/logo</p><br>
                                       <button id="store-upload" class="cloudinary-button">Upload</button>
                                    </div>
                                    @if($user != null && $user->verified !== "vendor")									
                                    <div class="col-md-6 mb-3">
                                        <input type="password" class="form-control" name="pass" value="" placeholder="Password" required>
                                    </div>
									<div class="col-md-6 mb-3">
                                        <input type="password" class="form-control" name="pass" value="" placeholder="Password" required>
                                    </div>
									@endif									
                                    
                                    <div class="col-12">
                                        <button type="submit" class="amado-btn">Submit</button>                                                                           
                                    </div>
                                </div>
                            </form>
                        	     </div>
                        	   </div>                           

                            
                        </div>
                    </div>
                </div>
</div>
@stop