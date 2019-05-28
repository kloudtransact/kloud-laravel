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
                          <input type="text" class="form-control" value="Samsung Galaxy S9 Edge">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">SKU</label>
                          <input type="text" class="form-control" value="KLO9647808513">
                        </div>
                      </div>
                    </div>
                    <div class="row mt-5">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>                         
                          <select class="form-control">
                          	<option value="none">Select category</option>
                              <option value="home-office" selected="selected">Home & Office</option>
                              <option value="fashion">Fashion</option>
                              <option value="Groceries">Groceries</option>
                          </select>
                        </div><br>
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea class="form-control">Amazing product, I've been using it for 3 years now without problems</textarea>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price(&#8358;)</label>
                          <input type="number" class="form-control" value="45000">
                        </div><br>
                        <div class="form-group">
                          <label class="bmd-label-floating">Images</label>
                          <div class="row">
                          	<div class="col-md-6"><img class="img img-fluid mx-auto d-block" src="assets/img/kloud/deal.jpg"></div>
                              <div class="col-md-6"><img class="img img-fluid mx-auto d-block" src="assets/img/kloud/deal.jpg"></div>
                          </div>
                        </div>
                      </div>
                    </div>   
                    <div class="row mt-5">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Rating</label>
                          <span class="form-control">
                          	<?php for($u = 0; $u < 4; $u++){ ?>
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