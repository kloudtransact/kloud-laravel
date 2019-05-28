@extends("admin.layout")

@section('title',"Coupons")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Coupons</h4>
                  <p class="card-category"> View, edit or remove coupons</p>
                </div>
                <div class="card-body">
                	<a href="{{url('cobra-add-coupon')}}" class="btn btn-primary btn-lg">Add New Coupon</a>
                  <div class="table-responsive">
                    <table class="table" id="couponsTable">
                      <thead class=" text-primary">
                        <th>
                          Coupon
                        </th>
                        <th>
                          Discount
                        </th>  
                        <th>
                          Status
                        </th>  
                        <th>
                          Actions
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            WELCOME
                          </td>
                          <td>
                            50%
                          </td>
                          <td class="text-success">
                           ACTIVE
                          </td>
                          <td>
                           <a class="btn btn-success" href="{{url('cobra-coupon')}}"> View</a>
                           <a class="btn btn-warning" href="#"> Delete</a>
                          </td>
                        </tr>
                        <tr>
                           <td>
                            BLACKFRIDAY
                          </td>
                          <td>
                            70%
                          </td>
                          <td class="text-warning">
                           DISABLED
                          </td>
                          <td>
                           <a class="btn btn-success" href="{{url('cobra-coupon')}}"> View</a>
                           <a class="btn btn-warning" href="#"> Delete</a>
                          </td>
                        </tr>
                        <tr>
                           <td>
                            EASTERFIESTA
                          </td>
                          <td>
                            20%
                          </td>
                          <td class="text-warning">
                           DISABLED
                          </td>
                          <td>
                           <a class="btn btn-success" href="{{url('cobra-coupon')}}"> View</a>
                           <a class="btn btn-warning" href="#"> Delete</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div><br>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop