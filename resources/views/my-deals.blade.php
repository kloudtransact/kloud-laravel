@extends("layout")

@section('title',"My Deals")

@section('styles')
  <!-- DataTables CSS -->
  <link href="lib/datatables/css/buttons.bootstrap.min.css" rel="stylesheet" /> 
  <link href="lib/datatables/css/buttons.dataTables.min.css" rel="stylesheet" /> 
  <link href="lib/datatables/css/dataTables.bootstrap.min.css" rel="stylesheet" /> 
@stop

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading" style="color: #fbb710 !important; padding: 5px;">My Deals</h2>
            <hr class="my-4">
          </div>
</div>      

<!-- Start Deals  section -->  
<div class="row">
          <div class="col-lg-12 mx-auto p-b-10">
            <div class="card border-0">
                <div class="card-title">
                   <h4>My Deals <a href="{{url('deal-new')}}">Add New Deal</a></h4>                  
                </div>
                <div class="card-body">
                	<div class="table-responsive m-t-40">
                	   <table class="table kloud-data-table" id="dealsTable">
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
                        @foreach($deals as $d)
                        <tr>
                          <td>
                            {{$d['sku']}}
                          </td>
                          <td>
                            {{$d['name']}}
                          </td>
                          <td>
                            @for($u = 0; $u < $d['rating']; $u++)
                            	<i class="material-icons text-primary">star</i>
                            @endfor
                          </td>
                          <td class="text-info">
                           {{$d['data']['in_stock']}}
                          </td>
                          <td>
                           <a class="btn btn-success" href="{{url('deal').'?sku='.$d['sku']}}"> View</a>
                           <a class="btn btn-warning" href="#"> Delete</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    </div>
                </div>
          </div><br>
          
</div>     
<!-- End Deals  section -->  
@include('ad-space')      
       
@stop

@section('scripts')
    <!-- DataTables js -->
       <script src="lib/datatables/js/datatables.min.js"></script>
    <script src="lib/datatables/js/cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="lib/datatables/js/cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="lib/datatables/js/cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="lib/datatables/js/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="lib/datatables/js/cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="lib/datatables/js/cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="lib/datatables/js/cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
    <script src="lib/datatables/js/datatables-init.js"></script>
@stop