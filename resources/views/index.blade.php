@extends("layout")

@section('title',"Home")

@section('content')
     <form>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <button class="btn btn-outline-secondary form-control" type="button" id="button-addon1"><i class="fa fa-search fa-2x" aria-hidden="true"></i></button>
          </div>
          <input type="text" class="form-control" placeholder="Search KloudTransact.." aria-label="Search KloudTransact.. " aria-describedby="button-addon1">
        </div>
     </form>
     
     <!--Start Inner CATEGORIES menu -->
       <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <a class="navbar-brand" href="#"> </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#categoriesCollapse" aria-controls="categoriesCollapseContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="pull-right navbar-toggler-icon"></span>
          </button>
             <div class="collapse navbar-collapse" id="categoriesCollapse">
               <ul class="navbar-nav mr-auto">           
                 <li class="nav-item active">
                   <a class="nav-link" href="#">All Categories <span class="sr-only">(current)</span></a>
                  </li>
                  @foreach($c as $key => $value)
                   <li class="nav-item">
				    <?php $u = url('deals').'?q='.$key;?>
                    <a class="nav-link" href="{{$u}}">{{$value}}</a>
                  </li>
                  @endforeach
                              
               </ul>
             </div>
           </nav>
          </div>
     <!--End Inner CATEGORIES menu -->
       <!-- Start WOWSlider.com BODY section -->
<div id="wowslider-container1">
<div class="ws_images"><ul>
		<li><a href="http://wowslider.net"><img src="data1/images/3.jpg" alt="responsive slider" title="PRODUCT TITLE HERE" id="wows1_0"/></a>STARTING AT &#8358;50000
</li>
		<li><img src="data1/images/4.jpg" alt="PRODUCT TITLE HERE" title="PRODUCT TITLE HERE" id="wows1_1"/>STARTING AT &#8358;5000</li>
	</ul></div>
	<div class="ws_bullets"><div>
		<a href="#" title="PRODUCT TITLE HERE"><span><img src="data1/tooltips/3.jpg" alt="PRODUCT TITLE HERE"/>1</span></a>
		<a href="#" title="PRODUCT TITLE HERE"><span><img src="data1/tooltips/4.jpg" alt="PRODUCT TITLE HERE"/>2</span></a>
	</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://wowslider.net">javascript carousel</a> by WOWSlider.com v8.8</div>
<div class="ws_shadow"></div>
</div>	
<script type="text/javascript" src="engine1/wowslider.js"></script>
<script type="text/javascript" src="engine1/script.js"></script>
<!-- End WOWSlider.com BODY section -->

<br>
<!-- Start Up sells section -->
<div class="container">
   <div class="row wow fadeInUp">
     <div class="col-4 col-xs-12">
         <a href="{{url('airtime')}}">
           <img class="img img-fluid img-upsell" src="img/bills.png" alt="Pay Your Bills">
         </a>
      </div>
     <div class="col-4 col-xs-12">
         <a href="{{url('hotels')}}">
           <img class="img img-fluid img-upsell" src="img/hotel.jpg" alt="Book Your Room Online">
         </a>
      </div>
     <div class="col-4 col-xs-12">
         <a href="{{url('travelstart')}}">
           <img class="img img-fluid img-upsell" src="img/travel.jpg" alt="Book Your Vacations">
         </a>
     </div>
   </div>
</div>
<!-- End Upsells section -->
<br>
        <h2 class="category-header wow fadeInUp">Hottest Deals</h2>
        <!-- Product Catagories Area 1 Start -->
            <div class="row wow fadeInUp">
            @if(isset($hd) && count($hd) > 0)
            <?php
              shuffle($hd);
              $cc = count($hd);
              if($cc > 6) $cc = 6;
            ?>
            @for($i = 0; $i < $cc; $i++)
            <?php
              $d = $hd[$i];
              $images = $d['images'];
                         shuffle($images);
                         $data = $d['data'];
                         $dealURL = url("deal")."?sku=".$d['sku'];
                         $cartURL = url("add-to-cart")."?sku=".$d['sku']."&qty=1";
            ?>
                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper">
                            <!-- Product Image -->
                            <div class="product-img">
                            	<center>
                                <img src="{{$images[0]['url']}}" alt="">
                                <!-- Hover Thumb 
                                <img src="{{$images[1]['url']}}" alt=""> -->
                                </center>
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">&#8358;{{$data['amount']}}</p>
                                    <a href="{{$dealURL}}">
                                        <h6>{{$d['name']}}</h6>
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
                                        <a href="{{$cartURL}}" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>              
                    @endfor
                    @endif
            </div>
        <!-- Product Catagories Area 1 End -->
       <br>
       <div class="row wow tada">
           <div class="col-12"><marquee><img src="img/8.jpg" class="img img-fluid"></marquee></div>
       </div>
       <br>
	   <h2 class="category-header wow fadeInUp">New Arrivals</h2>
		<!-- Product Catagories Area 2 Start -->
            <div class="row">
            @if(isset($na) && count($na) > 0)
            <?php
              shuffle($na);
              $cc = count($na);
              if($cc > 6) $cc = 6;
            ?>
            @for($i = 0; $i < $cc; $i++)
            <?php
              $d = $na[$i];
              $images = $d['images'];
                         shuffle($images);
                         $data = $d['data'];
                         $dealURL = url("deal")."?sku=".$d['sku'];
                         $cartURL = url("add-to-cart")."?sku=".$d['sku']."&qty=1";
            ?>
                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper wow fadeInUp">
                            <!-- Product Image -->
                            <div class="product-img">
                            	<center>
                                <img src="{{$images[0]['url']}}" alt="">
                                <!-- Hover Thumb --
                                <img src="{{$images[1]['url']}}" alt=""> -->
                                </center>
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">&#8358;{{$data['amount']}}</p>
                                    <a href="{{$dealURL}}">
                                        <h6>{{$d['name']}}</h6>
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
                                        <a href="{{$cartURL}}" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>              
                    @endfor
                    @endif
            </div>
        <!-- Product Catagories Area 2 End -->
		<br>
       <div class="row wow tada">
           <div class="col-12"><marquee><img src="img/9.jpg" class="img img-fluid"></marquee></div>
       </div>
	   <h2 class="category-header wow fadeInUp">Best Sellers</h2>
		<!-- Product Catagories Area 5 Start -->
            <div class="row">
            @if(isset($bs) && count($bs) > 0)
            <?php
              shuffle($bs);
              $cc = count($bs);
              if($cc > 6) $cc = 6;
            ?>
            @for($i = 0; $i < $cc; $i++)
            <?php
              $d = $bs[$i];
              $images = $d['images'];
                         shuffle($images);
                         $data = $d['data'];
                         $dealURL = url("deal")."?sku=".$d['sku'];
                         $cartURL = url("add-to-cart")."?sku=".$d['sku']."&qty=1";
            ?>
                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper wow fadeInUp">
                            <!-- Product Image -->
                            <div class="product-img">
                            	<center>
                                <img src="{{$images[0]['url']}}" alt="">
                                <!-- Hover Thumb --
                                <img src="{{$images[1]['url']}}" alt=""> -->
                                </center>
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">&#8358;{{$data['amount']}}</p>
                                    <a href="{{$dealURL}}">
                                        <h6>{{$d['name']}}</h6>
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
                                        <a href="{{$cartURL}}" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>              
                    @endfor
                    @endif
            </div>
        <!-- Product Catagories Area 5 End -->
		<br>
		
		<!-- Start Blogs section -->
<div class="container">
   <div class="row wow fadeInUp">
     <div class="col-12 col-xs-12 m-l-5 m-t-50">
	 <?php
	   $blogs = [['img' => "img/8.jpg",'title' => "First Post",'brief' => "This is the first post on our blog!<a href='#'> Read more</a>"],
	             ['img' => "img/9.jpg",'title' => "Second Post",'brief' => "This is the second post on our blog!<a href='#'> Read more</a>"],
	             ['img' => "img/10.jpg",'title' => "Third Post",'brief' => "This is the third post on our blog!<a href='#'> Read more</a>"],
	            ];
	 ?>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
   <?php
    for($i = 0; $i < count($blogs); $i++)
	{
		$class = ""; if($i == 0) $class = "active";
	?>
    <li data-target="#carouselExampleIndicators" data-slide-to="<?=$i?>" class="<?=$class?>"></li>
    <?php
	}
	?>
  </ol>
  <div class="carousel-inner">
     <?php
    for($i = 0; $i < count($blogs); $i++)
	{
		$class = ""; if($i == 0) $class = "active";
		$b = $blogs[$i];
	?>
    <div class="carousel-item <?=$class?>">
      <img class="d-block w-100 blog-img" src="<?=$b['img']?>" alt="<?=$b['title']?>">
	  <div class="carousel-caption d-none d-md-block">
      <h5><?=$b['title']?></h5>
      <p><?=$b['brief']?></p>
	  </div>
    </div>
	<?php
	}
	?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>
</div>
<!-- End Blogs section -->
		
		<br>
       <div class="row wow tada">
           <div class="col-12"><marquee><img src="img/10.jpg" class="img img-fluid"></marquee></div>
       </div>
	   <h2 class="category-header wow fadeInUp">Hot Categories</h2>
		<!-- Product Catagories Area 6 Start -->
            <div class="row">
            @if(isset($hc) && count($hc) > 0)
            <?php
              shuffle($hc);
              $cc = count($hc);
              if($cc > 6) $cc = 6;
            ?>
            @for($i = 0; $i < $cc; $i++)
            <?php
              $d = $hc[$i];
              $images = $d['images'];
                         shuffle($images);
                         $data = $d['data'];
                         $dealURL = url("deal")."?sku=".$d['sku'];
                         $cartURL = url("add-to-cart")."?sku=".$d['sku']."&qty=1";
            ?>
                    <!-- Single Product Area -->
                    <div class="col-12 col-sm-6 col-md-12 col-xl-6">
                        <div class="single-product-wrapper wow fadeInUp">
                            <!-- Product Image -->
                            <div class="product-img">
                            	<center>
                                <img src="{{$images[0]['url']}}" alt="">
                                <!-- Hover Thumb --
                                <img src="{{$images[1]['url']}}" alt=""> -->
                                </center>
                            </div>

                            <!-- Product Description -->
                            <div class="product-description d-flex align-items-center justify-content-between">
                                <!-- Product Meta Data -->
                                <div class="product-meta-data">
                                    <div class="line"></div>
                                    <p class="product-price">&#8358;{{$data['amount']}}</p>
                                    <a href="{{$dealURL}}">
                                        <h6>{{$d['name']}}</h6>
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
                                        <a href="{{$cartURL}}" data-toggle="tooltip" data-placement="left" title="Add to Cart"><img src="img/core-img/cart.png" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>              
                    @endfor
                    @endif
            </div>
        <!-- Product Catagories Area 6 End -->
        <br>
        <!-- Start Guarantee section -->
<div class="container">
   <div class="row wow fadeInUp">
     <div class="col-12 col-xs-12">
       <div class="card text-center" style="">
         <div class="card-body">         
            <div class="">
            <h5 class="card-title"><i class="fa fa-star fa-2x" aria-hidden="true"></i></h5>
            <p class="card-text">100% Guarantee On All Deals!</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
         </div>
       </div>
     </div>
   </div>
</div>
<!-- End Guarantee section -->
<br>
@stop