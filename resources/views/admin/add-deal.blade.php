@extends("admin.layout")

@section('title',"Add Deal")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Deal</h4>
                  <p class="card-category">Add a new deal to the system</p>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" placeholder="e. g Samsung Galaxy S9 Edge">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">SKU</label>
                          <input type="text" class="form-control" value="Will be generated automatically" disabled>
                        </div>
                      </div>
                    </div>
                    <div class="row mt-5">
                      <div class="col-md-7">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>                         
                          <select class="form-control">
                          	<option value="none">Select category</option>
                              <option value="home-office">Home & Office</option>
                              <option value="fashion">Fashion</option>
                              <option value="Groceries">Groceries</option>
                          </select>
                        </div><br>
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea class="form-control" placeholder="Enter description"></textarea>
                        </div>
                      </div>
                      <div class="col-md-5">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price(&#8358;)</label>
                          <input type="number" class="form-control" placeholder="e. g 45000">
                        </div><br>
                        <div class="form-group">
                          <label class="bmd-label-floating">Images</label>
                          <input type="text" class="form-control" value="image 1 URL, image 2 URL, etc">
                        </div>
                      </div>
                    </div>   
                    <div class="row mt-5">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Inventory status</label>
                          <select class="form-control">
                          	<option value="none">Select inventory status</option>
                              <option value="in-stock">In Stock</option>
                              <option value="new">New! </option>
                              <option value="out-of-stock">Out of Stock</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select class="form-control">
                          	<option value="none">Select status</option>
                              <option value="active">Active</option>
                              <option value="expired">Expired</option>
                          </select>
                        </div>
                      </div>
                    </div>                       
                    
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>           
          </div>
        </div>
      </div>
@stop