@extends("layout")

@section('title',"Checkout")

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Checkout</h2>
                            </div>

                            <form action="#" method="post">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="first_name" value="" placeholder="First Name" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="last_name" value="" placeholder="Last Name" required>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="company" placeholder="Company Name" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="email" class="form-control" id="email" placeholder="Email" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <select class="w-100" id="country">
                                        <option value="ng">Nigeria</option>
                                    </select>
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control mb-3" id="street_address" placeholder="Address" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="text" class="form-control" id="city" placeholder="Town" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="zipCode" placeholder="Zip Code" value="">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="number" class="form-control" id="phone_number" min="0" placeholder="Phone No" value="">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <textarea name="comment" class="form-control w-100" id="comment" cols="30" rows="10" placeholder="Leave a comment about your order"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Create an accout</label>
                                        </div>
                                        <div class="custom-control custom-checkbox d-block">
                                            <input type="checkbox" class="custom-control-input" id="customCheck3">
                                            <label class="custom-control-label" for="customCheck3">Ship to a different address</label>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="cart-summary">
                            <h5>Cart Total</h5>
                            <ul class="summary-table">
                                <li><span>subtotal:</span> <span class="mr-5 checkout-price">&#8358;80,000</span></li>
                                <li><span>delivery:</span> <span class="mr-5 checkout-price">&#8358;2,000</span></li>
                                <li><span>total:</span> <span class="mr-5 checkout-price">&#8358;82,000</span></li>
                            </ul>

                            <div class="payment-method">
                                <!-- KloudPay -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="radio" class="custom-control-input" id="cod" checked>
                                    <label class="custom-control-label" for="cod">Pay with KloudPay</label>
                                </div>
                                <!-- Cash -->
                                <div class="custom-control custom-checkbox mr-sm-2">
                                    <input type="radio" class="custom-control-input" id="paypal" disabled>
                                    <label class="custom-control-label" for="paypal">Cash on Delivery</label>
                                </div>
                            </div>

                            <div class="cart-btn mt-50">
                                <a href="{{url('invoice')}}" class="btn amado-btn w-100">Pay Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@stop