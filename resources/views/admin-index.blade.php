@extends("layout")

@section('title',"Admin Dashboard")

@section('content')
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading">Dashboard</h2>
            <hr class="my-4">
          </div>
</div>         
 <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><span class="f-s-40 text-primary">&#8358;</span></span>
                                </div>
                                <div class="media-body media-text-right m-l-7">
                                    <h2>568120</h2>
                                    <p class="m-b-0">Total Revenue</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-shopping-cart f-s-40 text-success"></i></span>
                                </div>
                                <div class="media-body media-text-right m-l-7">
                                    <h2>1178</h2>
                                    <p class="m-b-0">Sales</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-archive f-s-40 text-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right m-l-7">
                                    <h2>25</h2>
                                    <p class="m-b-0">Deals</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 text-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right m-l-7">
                                    <h2>87</h2>
                                    <p class="m-b-0">Users</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
@stop