@extends("admin.layout")

@section('title',"Orders")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Orders</h4>
                  <p class="card-category"> View orders, edit order details or remove orders</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="ordersTable">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          User
                        </th>
                        <th>
                          Deal #
                        </th>
                        <th>
                          Type
                        </th>
                        <th>
                          Amount
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
                            1
                          </td>
                          <td>
                            topewer
                          </td>
                          <td>
                            KLO48643655885
                          </td>
                          <td>
                            Sale 
                          </td>
                          <td class="text-primary">
                           &#8358;25,000
                          </td>
                          <td class="text-warning">
                           PENDING 
                          </td>
                          <td>
                           <a class="btn btn-primary" href=" {{url('cobra-order')}}">Edit</a>
                           <a class="btn btn-success" href="#">Approve</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            topewer
                          </td>
                          <td>
                            KLO48643655885
                          </td>
                          <td>
                            Sale 
                          </td>
                          <td class="text-primary">
                           &#8358;25,000
                          </td>
                          <td class="text-warning">
                           PENDING 
                          </td>
                          <td>
                           <a class="btn btn-primary" href=" {{url('cobra-order')}}">Edit</a>
                           <a class="btn btn-success" href="#">Approve</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            topewer
                          </td>
                          <td>
                            KLO48643655885
                          </td>
                          <td>
                            Sale 
                          </td>
                          <td class="text-primary">
                           &#8358;25,000
                          </td>
                          <td class="text-warning">
                           PENDING 
                          </td>
                          <td>
                           <a class="btn btn-primary" href=" {{url('cobra-order')}}">Edit</a>
                           <a class="btn btn-success" href="#">Approve</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            topewer
                          </td>
                          <td>
                            KLO48643655885
                          </td>
                          <td>
                            Sale 
                          </td>
                          <td class="text-primary">
                           &#8358;25,000
                          </td>
                          <td class="text-warning">
                           PENDING 
                          </td>
                          <td>
                           <a class="btn btn-primary" href=" {{url('cobra-order')}}">Edit</a>
                           <a class="btn btn-success" href="#">Approve</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            topewer
                          </td>
                          <td>
                            KLO48643655885
                          </td>
                          <td>
                            Sale 
                          </td>
                          <td class="text-primary">
                           &#8358;25,000
                          </td>
                          <td class="text-warning">
                           PENDING 
                          </td>
                          <td>
                           <a class="btn btn-primary" href=" {{url('cobra-order')}}">Edit</a>
                           <a class="btn btn-success" href="#">Approve</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            topewer
                          </td>
                          <td>
                            KLO48643655885
                          </td>
                          <td>
                            Sale 
                          </td>
                          <td class="text-primary">
                           &#8358;25,000
                          </td>
                          <td class="text-warning">
                           PENDING 
                          </td>
                          <td>
                           <a class="btn btn-primary" href=" {{url('cobra-order')}}">Edit</a>
                           <a class="btn btn-success" href="#">Approve</a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@stop