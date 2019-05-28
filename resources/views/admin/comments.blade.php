@extends("admin.layout")

@section('title',"Comments")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Comments</h4>
                  <p class="card-category"> View, edit or remove comments</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="couponsTable">
                      <thead class=" text-primary">
                        <th>
                          User
                        </th>
                        <th>
                          Deal
                        </th> 
                        <th>
                          Comment
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
                            topewer
                          </td>
                          <td>
                            <a href="#">A Sample Deal</a>
                          </td>
                          <td>
                            I enjoyed buying thid deal
                          </td>
                          <td class="text-warning">
                           PENDING
                          </td>
                          <td>
                           <a class="btn btn-success" href="{{url('cobra-comment')}}"> View</a>
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