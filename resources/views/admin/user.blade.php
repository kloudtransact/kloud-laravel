@extends("admin.layout")

@section('title',"User")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">View User</h4>
                  <p class="card-category">View information about this user</p>
                </div>
                <div class="card-body">
                  <form method="post" action="{{url('cobra-user')}}">
                    {!! csrf_field() !!}
                    
                    <?php
                      $fund_url = url('cobra-fund-wallet').'?email='.$account['email'];
                      $balance = $account['wallet']['balance'];
                    ?>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">First Name</label>
                          <input type="text" class="form-control" value="{{$account['fname']}}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Last Name</label>
                          <input type="text" class="form-control" value="{{$account['lname']}}">
                        </div>
                      </div>
                    </div>
                    <div class="row mt-5">                  
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="email" class="form-control" value="{{$account['email']}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Phone Number</label>
                          <input type="text" class="form-control" value="{{$account['phone']}}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Account Balance</label>
                          <input type="text" class="form-control" value="{{number_format($balance,2)}}" disabled>
                        </div>
                      </div>
                    </div>   
                    <div class="row mt-5">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Role</label>
                          <select class="form-control">
                          	<option value="none">Select role</option>
                              <option value="user" selected="selected">User</option>
                              <option value="admin">Admin</option>
                              <option value="su">Super Admin</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select class="form-control">
                          	<option value="none">Select status</option>
                              <option value="enabled" selected="selected">Active</option>
                              <option value="disabled">Suspended</option>
                          </select>
                        </div>
                      </div>
                    </div>   
                    
                    <button type="submit" class="btn btn-primary pull-right">Update User</button>
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
                  <h4 class="card-title">User Management</h4>
                  <p class="card-description">
                    Fund this user's wallet. 
                  </p>
                  
                  <a href="{{$fund_url}}" class="btn btn-primary btn-round">Fund Wallet</a><br>
                  <p class="card-description">
                    Suspend this user. 
                  </p>
                  <a href="{{$suspend_url}}" class="btn btn-primary btn-round">Suspend User</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop