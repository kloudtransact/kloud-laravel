@extends("admin.layout")

@section('title',"View Deal")

@section('content')
    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">View Deal</h4>
                  <p class="card-category">View, edit or remove this deal</p>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" value="{{$deal['name']}}" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">SKU</label>
                          <input type="text" class="form-control" value="{{$deal['sku']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row mt-5">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>                         
                          <select class="form-control" name='category' required>
                          	<option value="none">Select category</option>
                              @foreach($categories as $key => $value)
                              <?php $ss = ($deal['category'] == $key) ? 'selected="selected"' : ''; ?>
                              <option value="{{$key}}" {{$ss}}>{{$value}}</option>
                              @endforeach
                          </select>
                        </div><br>
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea class="form-control">{{$deal['data']['description']}}</textarea>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price</label>
                          <input type="number" class="form-control" value="&#8358;{{number_format($deal['data']['amount'],2)}}">
                        </div><br>
                        <div class="form-group">
                          <label class="bmd-label-floating">Images</label>
                          <div class="row">
                          	@foreach($images as $img)
                          	<div class="col-md-6"><img class="img img-fluid mx-auto d-block" src="{{$img['url']}}"></div>
                              @endforeach                              
                          </div>
                        </div>
                      </div>
                    </div>   
                    <div class="row mt-5">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Rating</label>
                          <span class="form-control">
                          	<?php for($u = 0; $u < $d['rating']; ; $u++){ ?>
                            	<i class="material-icons text-primary">star</i>
                              <?php } ?>
                          </span>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Inventory status</label>
                          <select class="form-control">
                          	<option value="none">Select inventory status</option>
                              <option value="in-stock" selected="selected">In Stock</option>
                              <option value="new">New! </option>
                              <option value="out-of-stock">Out of Stock</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select class="form-control">
                          	<option value="none">Select status</option>
                              <option value="active" selected="selected">Active</option>
                              <option value="expired">Expired</option>
                          </select>
                        </div>
                      </div>
                    </div>                       
                    
                    <button type="submit" class="btn btn-primary pull-right">Update Deal</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">Tasks</h6>
                  <h4 class="card-title">Deal Management</h4>
                  <p class="card-description">
                    Removes this deal from the system. 
                  </p>
                  <a href="#" class="btn btn-primary btn-round">Delete Deal</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop