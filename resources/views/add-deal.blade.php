@extends("layout")

@section('title',"Add Deal")

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading mt-1">Add New Deal</h2>
            <hr class="my-4">
             <div class="checkout_details_area mt-50 clearfix">
                            <div class="card">                        	     
                        	     <div class="card-body">
                        	       <h3 class="card-title" style="color: #fbb710 !important; padding: 5px;">Add a new deal to the system</h3>                     
                                   <h5 class="card-title" style="color: #fbb710 !important; padding: 5px;">Only deals that are approved will be displayed on our platform</h5>                     
                                   <form action="{{url('add-deal')}}" method="post">
                                   	{!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-6 mb-3">
                                    	<p class="form-control-plaintext"><i class="fa fa-suitcase"></i> Name</p><br>
                                        <input type="text" class="form-control" placeholder="e. g Samsung Galaxy S9 Edge" name="name" required><br>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <p class="form-control-plaintext"><i class="fa fa-tag"></i> SKU</p><br>
                                        <input type="text" class="form-control" value="Will be generated automatically" disabled>
                                    </div>
                                    <div class="col-7 mb-3">
                                        <p class="form-control-plaintext"><i class="fa fa-tags"></i> Category</p><br>
                                        <select class="form-control" name="category" required>
                                        	<option value="none">Select deal category</option>
                                            @foreach($c as $key => $value)
                                            <option value="{{$key}}">{{$value}}</option>
                                            @endforeach
                                       </select><br><br>
                                       <p class="form-control-plaintext"><i class="fa fa-pencil"></i> Description</p><br>
                                       <textarea class="form-control" placeholder="Enter description" name="description" required></textarea>
                                    </div>
                                    <div class="col-5 mb-3">
                                        <p class="form-control-plaintext"><i class="fa fa-briefcase"></i> Price (max. &#8358;100,000.00)</p><br>
                                        <input type="number" class="form-control" name="amount" id="amount" value="" placeholder="Enter amount" max="100000" required><br><br>
                                        <p class="form-control-plaintext"><i class="fa fa-picture-o"></i> Image URIs</p><br>
                                        <textarea name="images"  class="form-control" placeholder="Image URIs (http://website.com/my-image.png or images/my_image.png) separated by commas" required></textarea>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <p class="form-control-plaintext"><i class="fa fa-briefcase"></i> Inventory Status</p><br>
                                        <select class="form-control" name="in_stock">
                                     	  <option value="none">Select inventory status</option>
                                           <option value="in-stock">In Stock</option>
                                           <option value="new">New! </option>
                                           <option value="out-of-stock">Out of Stock</option>
                                        </select>
                                    </div>
                                    <div class="col-6 mb-3">
                                        <p class="form-control-plaintext"><i class="fa fa-briefcase"></i> Status</p><br>
                                        <select class="form-control">
                          	            <option value="none">Select status</option>
                                          <option value="active">Active</option>
                                          <option value="expired">Expired</option>
                                        </select>
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