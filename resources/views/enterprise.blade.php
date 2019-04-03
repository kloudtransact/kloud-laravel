@extends("layout")

@section('title',"Enterprise Log in")

@section('content')
<div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-lg-8">
                        <div class="checkout_details_area mt-50 clearfix">

                            <div class="cart-title">
                                <h2>Enterprise Log in</h2>
                            </div>

                            <form action="#" method="get">
                                <div class="row">
                                	<div class="col-12 mb-3">
                                        <select class="w-100" id="enterprise">
                                        <option value="ng">Select enterprise</option>
                                    </select>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="text" class="form-control" id="staff_id" value="" placeholder="Staff ID" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <input type="password" class="form-control" id="pass" value="" placeholder="Password" required>
                                    </div>
                                    
                                    <div class="col-12">
                                        <div class="custom-control custom-checkbox d-block mb-2">
                                            <input type="checkbox" class="custom-control-input" id="customCheck2">
                                            <label class="custom-control-label" for="customCheck2">Remember me</label>
                                        </div>                                   
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
</div>
@stop