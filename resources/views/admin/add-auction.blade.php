@extends("admin.layout")

@section('title',"Add Auction")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Coupon</h4>
                  <p class="card-category">Add a new coupon to the system</p>
                </div>
                <div class="card-body">
                  <form method="post" action="{{url('cobra-add-auction')}}">
                  	{!! csrf_field() !!}
                  <input type="hidden" name="xf" value="{{$deal['id']}}">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Days</label>
                          <input type="text" class="form-control" name="days">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Hours</label>
                          <input type="text" class="form-control" name="hours">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Minutes</label>
                          <input type="text" class="form-control" name="minutes">
                        </div>
                      </div>
                    </div>    

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <h3 class="form-control text-primary text-center">The auction will last for <span id="a-d">0</span> days, <span id="a-h">0</span> hours and <span id="a-m">0</span> minutes from now</h3>
                        </div>
                      </div>
                    </div>        
                    
                    <button type="submit" class="btn btn-primary pull-right">Add Coupon</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>
@stop