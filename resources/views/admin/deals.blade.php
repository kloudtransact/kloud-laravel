@extends("admin.layout")

@section('title',"Deals")

@section('content')
            <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Deals</h4>
                  <p class="card-category"> View, Edit or remove deals</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table" id="dealsTable">
                      <thead class=" text-primary">
                        <th>
                          SKU
                        </th>
                        <th>
                          Name
                        </th>  
                        <th>
                          Rating
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
                            KLO9873480233
                          </td>
                          <td>
                            Toshiba 30-inch LED TV
                          </td>
                          <td>
                            @for($u = 0; $u < 4; $u++)
                            	<i class="material-icons text-primary">star</i>
                            @endfor
                          </td>
                          <td class="text-info">
                           IN STOCK
                          </td>
                          <td>
                           <a class="btn btn-success" href="{{url('cobra-deal')}}"> View</a>
                           <a class="btn btn-warning" href="#"> Delete</a>
                          </td>
                        </tr>
                        <tr>
                                                    <td>
                            KLO0219858885
                          </td>
                          <td>
                            HP Deskjet 2684
                          </td>
                          <td>
                            @for($u = 0; $u < 3; $u++)
                            	<i class="material-icons text-primary">star</i>
                            @endfor
                          </td>
                          <td class="text-success">
                           NEW
                          </td>
                          <td>
                           <a class="btn btn-success" href=" {{url('cobra-deal')}}"> View</a>
                           <a class="btn btn-warning" href="#"> Delete</a>
                          </td>
                        </tr>
                        <tr>
                                                    <td>
                            KLO4887955854
                          </td>
                          <td>
                            Samsung Galaxy S6
                          </td>
                          <td>
                            <?php for($u = 0; $u < 2; $u++){ ?>
                            	<i class="material-icons text-primary">star</i>
                            <?php } ?>
                          </td>
                          <td class="text-info">
                           IN STOCK
                          </td>
                          <td>
                           <a class="btn btn-success" href=" {{url('cobra-deal')}}"> View</a>
                           <a class="btn btn-warning" href="#"> Delete</a>
                          </td>
                        </tr>
                        <tr>
                                                    <td>
                            KLO9647808513
                          </td>
                          <td>
                            Samsung Galaxy S9 Edge
                          </td>
                          <td>
                            <?php for($u = 0; $u < 4; $u++){ ?>
                            	<i class="material-icons text-primary">star</i>
                            <?php } ?>
                          </td>
                          <td class="text-info">
                           IN STOCK
                          </td>
                          <td>
                           <a class="btn btn-success" href=" {{url('cobra-deal')}}"> View</a>
                           <a class="btn btn-warning" href="#"> Delete</a>
                          </td>
                        </tr>
                        <tr>
                                                    <td>
                            KLO9764215779
                          </td>
                          <td>
                            Apple iPhone 8 64GB
                          </td>
                          <td>
                            <?php for($u = 0; $u < 5; $u++){ ?>
                            	<i class="material-icons text-primary">star</i>
                            <?php } ?>
                          </td>
                          <td class="text-success">
                           NEW
                          </td>
                          <td>
                           <a class="btn btn-success" href=" {{url('cobra-deal')}}"> View</a>
                           <a class="btn btn-warning" href="#"> Delete</a>
                          </td>
                        </tr>
                        <tr>
                                                    <td>
                            KLO56418948522
                          </td>
                          <td>
                            HP Pavilion dv8
                          </td>
                          <td>
                            @for($u = 0; $u < 3; $u++)
                            	<i class="material-icons text-primary">star</i>
                            @endfor
                          </td>
                          <td class="text-warning">
                           OUT OF STOCK
                          </td>
                          <td>
                           <a class="btn btn-success" href=" {{url('cobra-deal')}}"> View</a>
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