@extends("layout")

@section('title',"Checkout")

@section('content')
<div class="container-fluid">
	<form action="{{url('checkout')}}" method="post">
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
                                        <input type="text" class="form-control" id="zipCode" name="zipcode" placeholder="Zip Code" value="{{$sd['zipcode']}}" data-default="{{$sd['zipcode']}}">
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
                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3">Ship to a different address</label>
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
                                    ?>
                                <li><span>subtotal:</span> <span class="mr-5 checkout-price">&#8358;{{number_format($subtotal,2)}}</span></li>
                                <li><span>delivery:</span> <span class="mr-5 checkout-price">&#8358;{{number_format($delivery,2)}}</span></li>
                                <li><span>total:</span> <span class="mr-5 checkout-price">&#8358;{{number_format($total,2)}}</span></li>
                            </ul>

                            <div class="payment-method">
                                <!-- KloudPay -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="radio" name="type" class="custom-control-input" id="cod" value="cod" checked>
                                    <label class="custom-control-label" for="cod">Pay with KloudPay</label>
                                </div>
                                <!-- Debit/credit card -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="radio" name="type" class="custom-control-input" id="card" value ="card" checked>
                                    <label class="custom-control-label" for="cod">Pay with debit/credit card</label>
                                </div>
                                <!-- Cash -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="radio" class="custom-control-input" id="paypal" disabled>
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