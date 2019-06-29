@extends("admin.layout")

@section('title',"Ratings/Comments")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Ratings</h4>
                  <p class="card-category"> View, edit or remove deal ratings</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table kloud-data-table" id="ratingsTable">
                      <thead class=" text-primary">
                        <th>
                          User
                        </th>
                        <th>
                          Rating
                        </th>  
                        <th>
                          Status
                        </th> 
						<th>
                          Date
                        </th>  
                        <th>
                          Actions
                        </th>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            soma56
                          </td>
                          <td>
                            @for($u = 0; $u < 3; $u++)
                            	<i class="material-icons text-primary">star</i>
                            @endfor
                          </td>
                          <td class="text-warning">
                           PENDING
                          </td>
                          <td>
                           <a class="btn btn-warning" href="#">Reject</a>
                           <a class="btn btn-success" href="#">Approve</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            gabbydoll
                          </td>
                          <td>
                            @for($u = 0; $u < 3; $u++)
                            	<i class="material-icons text-primary">star</i>
                            @endfor
                          </td>
                          <td class="text-info">
                           APPROVED
                          </td>
                          <td>
                           
                          </td>
                        </tr>
                        <tr>
                          <td>
                            topewer
                          </td>
                          <td>
                            @for($u = 0; $u < 5; $u++)
                            	<i class="material-icons text-primary">star</i>
                            @endfor
                          </td>
                          <td class="text-warning">
                           PENDING
                          </td>
                          <td>
                           <a class="btn btn-warning" href="#">Reject</a>
                           <a class="btn btn-success" href="#">Approve</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            kingdani
                          </td>
                          <td>
                            @for($u = 0; $u < 3; $u++){ ?>
                            	<i class="material-icons text-primary">star</i>
                            @endfor
                          </td>
                          <td class="text-info">
                           APPROVED
                          </td>
                          <td>
                           
                          </td>
                        </tr>
                        <tr>
                          <td>
                            wuraola98
                          </td>
                          <td>
                            @for($u = 0; $u < 3; $u++)
                            	<i class="material-icons text-primary">star</i>
                            @endfor
                          </td>
                          <td class="text-warning">
                           PENDING
                          </td>
                          <td>
                           <a class="btn btn-warning" href="#">Reject</a>
                           <a class="btn btn-success" href="#">Approve</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            fedbed
                          </td>
                          <td>
                            @for($u = 0; $u < 5; $u++)
                            	<i class="material-icons text-primary">star</i>
                            @endfor
                          </td>
                          <td class="text-info">
                           APPROVED
                          </td>
                          <td>
                           
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div><br>
                  
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Comments</h4>
                  <p class="card-category"> View, edit or remove deal comments</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table kloud-data-table" id="commentsTable">
                      <thead class=" text-primary">
                        <th>
                          Deal
                        </th>
                        <th>
                          Comment
                        </th>
                        <th>
                          User
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
                            <a href="#">KLO48643655885</a>
                          </td>
                          <td>
                            Amazing product, I've been using) it for 3 years now without problems
                          </td>
                          <td>
                            <a href="#">topewer</a>
                          </td>
                          <td class="text-warning">
                           PENDING 
                          </td>
                          <td>
                           <a class="btn btn-warning" href=" {{url('cobra-comment')}}">Edit</a>
                           <a class="btn btn-success" href="#">Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="#">KLO48643655885</a>
                          </td>
                          <td>
                            Amazing product, I've been using) it for 3 years now without problems
                          </td>
                          <td>
                            <a href="#">topewer</a>
                          </td>
                          <td class="text-warning">
                           PENDING 
                          </td>
                          <td>
                           <a class="btn btn-warning" href=" {{url('cobra-comment')}}">Edit</a>
                           <a class="btn btn-success" href="#">Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="#">KLO48643655885</a>
                          </td>
                          <td>
                            Amazing product, I've been using) it for 3 years now without problems
                          </td>
                          <td>
                            <a href="#">topewer</a>
                          </td>
                          <td class="text-warning">
                           PENDING 
                          </td>
                          <td>
                           <a class="btn btn-warning" href=" {{url('cobra-comment')}}">Edit</a>
                           <a class="btn btn-success" href="#">Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="#">KLO48643655885</a>
                          </td>
                          <td>
                            Amazing product, I've been using) it for 3 years now without problems
                          </td>
                          <td>
                            <a href="#">topewer</a>
                          </td>
                          <td class="text-warning">
                           PENDING 
                          </td>
                          <td>
                           <a class="btn btn-warning" href=" {{url('cobra-comment')}}">Edit</a>
                           <a class="btn btn-success" href="#">Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="#">KLO48643655885</a>
                          </td>
                          <td>
                            Amazing product, I've been using) it for 3 years now without problems
                          </td>
                          <td>
                            <a href="#">topewer</a>
                          </td>
                          <td class="text-warning">
                           PENDING 
                          </td>
                          <td>
                           <a class="btn btn-warning" href=" {{url('cobra-comment')}}">Edit</a>
                           <a class="btn btn-success" href="#">Delete</a>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <a href="#">KLO48643655885</a>
                          </td>
                          <td>
                            Amazing product, I've been using) it for 3 years now without problems
                          </td>
                          <td>
                            <a href="#">topewer</a>
                          </td>
                          <td class="text-warning">
                           PENDING 
                          </td>
                          <td>
                           <a class="btn btn-warning" href=" {{url('cobra-comment')}}">Edit</a>
                           <a class="btn btn-success" href="#">Delete</a>
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