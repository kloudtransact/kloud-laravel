@extends("layout")

@section('title',"Deal Details")

@section('content')
<div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mt-50">
                                <li class="breadcrumb-item"><a href="{{url('deals')}}">Deals</a></li>
                                <li class="breadcrumb-item"><a href="{{url('deals').'?q='.$deal['category']}}">{{$category}}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{$deal['name']}}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                                     <?php
                                      $images = $deal['images'];
                                      shuffle($images);
                                     $data = $deal['data'];
                                    ?>
                <div class="row">
                    <div class="col-12 col-lg-7">
                        <div class="single_product_thumb">
                            <div id="product_details_slider" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                	@if(count($images) > 0)
                                      @for($a = 0; $a < count($images); $a++)
                                       <?php
                                         $image = $images[$a];
                                         $active = ($a == 0) ? "class='active'" : "";
                                       ?>
                                       <li {{$active}} data-target="#product_details_slider" data-slide-to="{{$a}}" style="background-image: url({{$image['url']}});">
                                       </li>                                    
                                      @endfor
                                    @else
                                    <li data-target="#product_details_slider" data-slide-to="0" style="background-image: url(img/product-img/no-img.jpg);">
                                    </li>
                                    @endif
                                </ol>
                                <div class="carousel-inner">
                                	@if(count($images) > 0)
                                      @for($a = 0; $a < count($images); $a++)
                                       <?php
                                         $image = $images[$a];
                                         $active = ($a == 0) ? "class='active'" : "";
                                       ?>
                                    <div class="carousel-item active">
                                        <a class="gallery_img" href="{{$image['url']}}">
                                            <img class="d-block w-100" src="{{$image['url']}}" alt="Slide {{$a + 1}}">
                                        </a>
                                    </div>
                                    @endfor
                                    @else
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="img/product-img/pro-big-2.jpg">
                                            <img class="d-block w-100" src="img/product-img/pro-big-2.jpg" alt="Second slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="img/product-img/pro-big-3.jpg">
                                            <img class="d-block w-100" src="img/product-img/pro-big-3.jpg" alt="Third slide">
                                        </a>
                                    </div>
                                    <div class="carousel-item">
                                        <a class="gallery_img" href="img/product-img/pro-big-4.jpg">
                                            <img class="d-block w-100" src="img/product-img/pro-big-4.jpg" alt="Fourth slide">
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5">
                        <div class="single_product_desc">
                            <!-- Product Meta Data -->
                            <div class="product-meta-data">
                                <div class="line"></div>
                                <p class="product-price">&#8358;{{$data['amount']}}</p>
                                <a href="{{url('deal').'?sku='.$d['sku']}}">
                                    <h6>{{$deal['name']}}</h6>
                                </a>
                                <!-- Ratings & Review -->
                                <div class="ratings-review mb-15 d-flex align-items-center justify-content-between">
                                    <div class="ratings">
                                    	@for($s = 0; $s < $deal['rating']; $s++)
                                          <i class="fa fa-star" aria-hidden="true"></i>
                                        @endfor
                                    </div>
                                    <div class="review">
                                        <a href="#">Write A Review</a>
                                    </div>
                                </div>
                                <!-- Avaiable -->
                                <?php
                                  $cl = "In Stock"; $ico = "fa-circle";
                                  if($data['in_stock'] == "almost") $cl = "Almost Gone"; $ico = "fa-hourglass-half";
                                  else if($data['in_stock'] == "no") $cl = "Out of Stock"; $ico = "fa-times-circle";
                                 ?>
                                <p class="avaibility"><i class="fa {{$ico}}"></i> {{$cl}}</p>
                            </div>

                            <div class="short_overview my-5">
                                {!! $data['description']!!}
                            </div>

                            <!-- Add to Cart Form -->
                            <form class="cart clearfix" method="get">
                                <div class="cart-btn d-flex mb-50">
                                    <p>Qty</p>
                                    <div class="quantity">
                                        <span class="qty-minus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i class="fa fa-caret-down" aria-hidden="true"></i></span>
                                        <input type="number" class="qty-text" id="qty" step="1" min="1" max="300" name="quantity" value="1">
                                        <span class="qty-plus" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                                    </div>
                                </div>
                                <?php
                                  $bidURL = url("bid")."?sku=".$deal['sku'];
                                  $watchURL = url("watch")."?sku=".$deal['sku'];
                                  $buyURL = url("buy")."?sku=".$deal['sku']."&qty=";
                                 ?>
                                <button id="" name="addtocart" value="5" onclick="window.location = '{{$bidURL}}';return false;" class="btn amado-btn">Place bid</button>
                                <button id="" name="addtocart" value="5" onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) window.location = '{{$buyURL}}' + qty;return false;" class="btn amado-btn active">Buy it now</button>
                                <button id="" name="addtocart" value="5" onclick="window.location = '{{$watchURL}}';return false;" class="btn amado-btn">Watch</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
@stop