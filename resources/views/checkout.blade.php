@extends("layout")

@section('title',"Checkout")

@section('content')
<div class="container-fluid">
	<form action="" id="checkout-form" method="post">
		{!! csrf_field() !!}
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Checkout - Confirm Your Shipping Address</h2>
                            </div>

                            
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="first_name" name="fname" value="{{$user->fname}}" data-default="{{$user->fname}}" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="last_name" name="lname" value="{{$user->lname}}" data-default="{{$user->lname}}" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="company" name="company" placeholder="Company Name" value="{{$sd['company']}}" data-default="{{$sd['company']}}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{$user->email}}" data-default="{{$user->email}}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <select class="w-100" id="country">
                                        <option value="ng">Nigeria</option>
                                    </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <select class="w-100" name="state">
                                        <option value="none">Select state</option>
                                        <option value="abia">Abia</option>
                                        <option value="adamawa">Adamawa</option>
                                        <option value="akwa-ibom">Akwa Ibom</option>
                                        <option value="anambra">Anambra</option>
                                        <option value="bauchi">Bauchi</option>
                                        <option value="bayelsa">Bayelsa</option>
                                        <option value="benue">Benue</option>
                                        <option value="borno">Borno</option>
                                        <option value="cross-river">Cross River</option>
                                        <option value="delta">Delta</option>
                                        <option value="ebonyi">Ebonyi</option>
                                        <option value="enugu">Enugu</option>
                                        <option value="edo">Edo</option>
                                        <option value="ekiti">Ekiti</option>
                                        <option value="gombe">Gombe</option>
                                        <option value="imo">Imo</option>
                                        <option value="jigawa">Jigawa</option>
                                        <option value="kaduna">Kaduna</option>
                                        <option value="kano">Kano</option>
                                        <option value="katsina">Katsina</option>
                                        <option value="kebbi">Kebbi</option>
                                        <option value="kogi">Kogi</option>
                                        <option value="kwara">Kwara</option>
                                        <option value="lagos">Lagos</option>
                                        <option value="nasarawa">Nasarawa</option>
                                        <option value="niger">Niger</option>
                                        <option value="ogun">Ogun</option>
                                        <option value="ondo">Ondo</option>
                                        <option value="osun">Osun</option>
                                        <option value="oyo">Oyo</option>
                                        <option value="plateau">Plateau</option>
                                        <option value="rivers">Rivers</option>
                                        <option value="sokoto">Sokoto</option>
                                        <option value="taraba">Taraba</option>
                                        <option value="yobe">Yobe</option>
                                        <option value="zamfara">Zamfara</option>
                                        <option value="fct">FCT</option>
                                    </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" id="street_address" name="address" placeholder="Address" value="{{$sd['address']}}" data-default="{{$sd['address']}}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="city" name="city" placeholder="City" value="{{$sd['city']}}" data-default="{{$sd['city']}}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="zipCode" name="zip" placeholder="Zip Code" value="{{$sd['zipcode']}}" data-default="{{$sd['zipcode']}}">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="number" class="form-control" id="phone_number" name="phone" min="0" placeholder="Phone No" value="{{$user->phone}}" data-default="{{$user->phone}}">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" id="comment" name="comment" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2" name="terms">
                                            <label class="custom-control-label" for="customCheck2">I <a href="#">accept terms and conditions</a></label>
                                        </div>
                                        <div class="custom-control custom-checkbox d-block">
                                            <input type="checkbox" class="custom-control-input" name="ssa" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3">Save this address</label>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                            	<?php
                                     $subtotal = $cartTotals['subtotal'];
                                     $delivery = $cartTotals['delivery'];
                                     $total = $cartTotals['total'];
                                     $md = $cartTotals['md'];
                                     $md['type'] = 'checkout';
                                    ?>
                                <li><span>subtotal:</span> <span class="mr-5 checkout-price">&#8358;{{number_format($subtotal,2)}}</span></li>
                                <li><span>delivery:</span> <span class="mr-5 checkout-price">&#8358;{{number_format($delivery,2)}}</span></li>
                                <li><span>total:</span> <span class="mr-5 checkout-price">&#8358;{{number_format($total,2)}}</span></li>
                            </ul>
                            
                            	<input type="hidden" id="cod-action" value="{{url('checkout')}}">
                            	<input type="hidden" id="card-action" value="{{url('pay')}}">
                            	
                            <!-- payment form -->
                            	<input type="hidden" name="email" value="{{$user->email}}"> {{-- required --}}
                            	<input type="hidden" name="order_id" value="{{$orderNumber}}">
                            	<input type="hidden" name="amount" value="{{$total * 100}}"> {{-- required in kobo --}}
                            	<input type="hidden" name="metadata" value="{{ json_encode($md) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                            	<input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                           	 <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                            <!-- End payment form -->

                            <div class="cart-btn mt-50">
                                <button id="pay-cod" class="btn amado-btn w-100">Pay with KloudPay</button>
                            </div>
                            <div class="cart-btn mt-50">
                                <button id="pay-card" class="btn amado-btn w-100">Pay with Credit card</button>
                            </div>
                        </div>
                    </div>
                </div>
               </form>
            </div>
@stop