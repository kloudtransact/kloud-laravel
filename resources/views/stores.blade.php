@extends("layout")

@section('title',"Stores")

@section('content')
<?php $ct = (isset($category) && $category != null) ? " - ".$category : ""; ?>
<div class="container-fluid">
            <h2 class="category-header">Stores</h2>
                

                <div class="row">
                  @if(count($stores) > 0)
                   @foreach($stores as $s)
                      <?php
                         $img = "https://res.cloudinary.com/kloudtransact/image/upload/v1563645033/uploads/".$s['img'];
                         $flink = $s['flink'];
                         $dn = $s['name'];
                         $deals = $s['deals'];
                         $status = $s['status'];
                         $uu = url("stores")."/".$flink;
                      ?>
                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                            	<center>
                                <img src="{{$img}}" alt="">
                                <!-- Hover Thumb --
                                <img src="{{$images[1]['url']}}" alt=""> -->
                                </center>
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">{{$dn}}</p>
                                    <a href="{{$uu}}">
                                        <h6>Go to store</h6>
                                    </a>
                                </div>
                                <!-- Ratings & Cart -->
                                <div class="ratings-cart text-right">
                                    <div class="ratings">
                                    	@for($s = 0; $s < $d['rating']; $s++)
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                        @endfor
                                    </div>
                                    <div class="cart">
                                    	<?php
                                          $uv = "Unverified";
                                          $uvfa = "fa-user-times text-danger";
                                          
                                          if($status == "verified"){
                                          	$uv = "Verified";
                                             $uvfa = "fa-user-plus text-success";
                                          }
                                        ?>
                                        <a href="#" data-toggle="tooltip" data-placement="left" title="{{$uv}}"><i class="fa {{$uvfa}}" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>              
                    @endforeach
                  @else
                  <p class="text-primary">No stores at the moment. Check back later? </p>
                  @endif
                </div>

                @if(count($stores) > 0)
                <div class="row">
                    <div class="col-12">
                        <!-- Pagination -->
                        <nav aria-label="navigation">
                            <ul class="pagination justify-content-end mt-50">
                                <li class="page-item active"><a class="page-link" href="#">1.</a></li>
                                <li class="page-item"><a class="page-link" href="#">2.</a></li>
                                <li class="page-item"><a class="page-link" href="#">3.</a></li>
                                <li class="page-item"><a class="page-link" href="#">4.</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                @endif
            </div>

@stop