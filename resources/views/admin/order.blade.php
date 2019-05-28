@extends("admin.layout")

@section('title',"Order")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Order</h4>
                  <p class="card-category">Update information about this order</p>
                </div>
                <div class="card-body">
                  <form>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Order #</label>
                          <input type="text" class="form-control" disabled value="KLO48643655885">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Username</label>
                          <input type="text" class="form-control" value="topewer">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <input type="text" class="form-control" value="Pending" disabled>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Type</label>
                          <input type="text" class="form-control" value="Sale">
                        </div>
                      </div>
                    </div>                          
                    
                    <button type="submit" class="btn btn-primary pull-right">Update Order</button>
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
                  <h4 class="card-title">Invoices</h4>
                  <p class="card-description">
                    There are no invoices for this order. 
                  </p>
                  <a href="{{url('cobra-invoice')}}" target="_blank" class="btn btn-primary btn-round">Generate Invoice</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop