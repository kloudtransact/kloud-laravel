@extends("layout")

@section('title',"My KloudPay Wallet")

@section('content')
div class="row">
          <div class="col-lg-12 mt-2 mx-auto text-center">
            <h2 class="section-heading mt-1">KloudPay Wallet</h2>
            <hr class="my-4">
             <div class="checkout_details_area mt-50 clearfix">
                            <div class="card">                        	     
                        	     <div class="card-body">
                        	       <h3 class="card-title" style="color: #fbb710 !important; padding: 5px;"><i class="fa fa-briefcase"></i> Balance: &#8358;2,500.00</h3>                     
                                   <form action="#" method="get">
                                <div class="row">
                                	<div class="col-12">
                                        <a href="{{url('deposit')}}" class="amado-btn">Make a Deposit</a>                                                                           
                                    </div>
                                    <div class="col-12 mt-5 mb-3">
                                        <div class="card border-0">
                <div class="card-title">
                   <h4>Latest Activity</h4>                  
                </div>
                <div class="card-body">
                	<div class="table-responsive m-t-5">
                	   <table id="transactions-table" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                	     <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Name</th>
                                                <th>SKU</th>
                                                <th>Amount (&#8358;)</th>
                                                <th>Type</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	
                                        </tbody>
                       </table>
                    </div>
                </div>
                                    </div>

                                    <div class="col-12 mt-2">
                                        <a href="{{url('transactions')}}" class="amado-btn">See more</a>                                                                             
                                    </div>
                                </div>
                            </form>
                        	     </div>
                        	   </div>                           
                       
                        </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-12 mx-auto text-center">
          	<img src="img/ad-1.png" class="img-fluid">
          </div>
        </div>      	
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