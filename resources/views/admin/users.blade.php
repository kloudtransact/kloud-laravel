@extends("admin.layout")

@section('title',"Users")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Users</h4>
                  <p class="card-category"> View users, user details or enable/disable users</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="usersTable">
                      <thead class=" text-primary">
                        <th>
                          ID
                        </th>
                        <th>
                          Name
                        </th>
                        <th>
                          Username
                        </th>
                        <th>
                          Phone
                        </th>
                        <th>
                          Email
                        </th>
                        <th>
                          Role
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
                            King Perry
                          </td>
                          <td>
                            <a href="#">topewer</a>
                          </td>
                          <td>
                            07053216684 
                          </td>
                          <td class="text-primary">
                           kingperry@yahoo.com
                          </td>
                          <td class="text-primary">
                           User
                          </td>
                          <td class="text-warning">
                           ACTIVE
                          </td>
                          <td>
                           <a class="btn btn-primary" href="{{url('cobra-user')}}">View</a>
                           <a class="btn btn-warning" href="#">Disable</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            King Perry
                          </td>
                          <td>
                            <a href="#">topewer</a>
                          </td>
                          <td>
                            07053216684 
                          </td>
                          <td class="text-primary">
                           kingperry@yahoo.com
                          </td>
                          <td class="text-primary">
                           User
                          </td>
                          <td class="text-warning">
                           ACTIVE
                          </td>
                          <td>
                           <a class="btn btn-primary" href="{{url('cobra-user')}}">View</a>
                           <a class="btn btn-warning" href="#">Disable</a>
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