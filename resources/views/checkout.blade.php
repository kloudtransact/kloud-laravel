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
                                    ?>
                                <li><span>subtotal:</span> <span class="mr-5 checkout-price">&#8358;{{number_format($subtotal,2)}}</span></li>
                                <li><span>delivery:</span> <span class="mr-5 checkout-price">&#8358;{{number_format($delivery,2)}}</span></li>
                                <li><span>total:</span> <span class="mr-5 checkout-price">&#8358;{{number_format($total,2)}}</span></li>
                            </ul>
                            
                            <!-- payment form -->
                            	<input type="hidden" name="email" value="{{$user->email}}"> {{-- required --}}
                            	<input type="hidden" name="orderID" value="{{$orderNumber}}">
                            	<input type="hidden" name="amount" value="{{$total * 100}}"> {{-- required in kobo --}}
                            	<input type="hidden" name="metadata" value="{{ json_encode($md) }}" > {{-- For other necessary things you want to add to your payload. it is optional though --}}
                            	<input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                           	 <input type="hidden" name="key" value="{{ config('paystack.secretKey') }}"> {{-- required --}}
                            <!-- End payment form -->

                            <div class="payment-method">
                                <!-- KloudPay -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="radio" name="type" class="custom-control-input" id="cod" value="cod">
                                    <label class="custom-control-label" for="cod">Pay with KloudPay</label>
                                </div>
                                <!-- Debit/credit card -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="radio" name="type" data-url="{{url('checkout')}}" class="custom-control-input" id="card" value="card">
                                    <label class="custom-control-label" for="cod">Pay with debit/credit card</label>
                                </div>
                                <!-- Cash -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="radio" data-url="{{url('pay')}}" class="custom-control-input" id="paypal" disabled>
                                    <label class="custom-control-label" for="paypal">Cash on Delivery</label>
                                </div>
                            </div>

                            <div class="cart-btn mt-50">
                                <button type="submit" class="btn amado-btn w-100">Pay Now</button>
                            </div>
                        </div>
                    </div>
                </div>
               </form>
            </div>
@stop