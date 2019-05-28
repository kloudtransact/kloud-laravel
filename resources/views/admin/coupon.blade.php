@extends("admin.layout")

@section('title',"View Coupon")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row mt-5">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">View Coupon</h4>
                  <p class="card-category">View, edit or remove this coupon</p>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" class="form-control" value="BLACKFRIDAY">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Discount</label>
                          <input type="text" class="form-control" value="70%">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>                         
                          <select class="form-control">
                          	<option value="none">Select statud</option>
                              <option value="enable">Active</option>
                              <option value="disable" selected="selected">Disabled</option>
                          </select>
                        </div>
                      </div>
                    </div>                                 
                    
                    <button type="submit" class="btn btn-primary pull-right">Update Coupon</button>
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
                  <h4 class="card-title">Coupon Management</h4>
                  <p class="card-description">
                    Delete this coupon. 
                  </p>
                  <a href="#" class="btn btn-primary btn-round">Delete Coupon</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop