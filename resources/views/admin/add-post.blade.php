@extends("admin.layout")

@section('title',"Add Post")

@section('content')
  <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Add Post</h4>
                  <p class="card-category">Creates a new blog post</p>
                </div>
                <div class="card-body">
                  <form method="post" action="{{url('cobra-add-post')}}">
                  	{!! csrf_field() !!}
					
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Post title</label>
                          <input type="text" class="form-control" name="title" placeholder="" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Friendly URL e.g my-post-title</label>
                          <input type="text" class="form-control" name="flink" placeholder="" required>
                        </div>
                      </div>
                    </div>  
					<div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Status</label>
                          <select class="form-control" name="status">
                          	<option value="none">Select status</option>
                              <?php 
                              $iss = ['active' => 'Active','disabled' => 'Disabled'];                           
                              foreach($iss as $key => $value){ 
                              	
                              ?>
                               <option value="<?=$key?>"><?=$value?></option>
                              <?php } ?>                             
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>
                          <select class="form-control" name="category">
                          	<option value="none">Select role</option>
                              <?php 
                              $iss = ['all' => 'All','news' => 'Latest news'];                           
                              foreach($iss as $key => $value){ 
                              	
                              ?>
                               <option value="<?=$key?>"><?=$value?></option>
                              <?php } ?>                             
                          </select>
                        </div>
                      </div>
                    </div>  
					<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Upload Image</label>
                          <button id="blog-upload" class="cloudinary-button">Upload</button>
                        </div>
                      </div>
                    </div> 
					<div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Post content</label>
                          <textarea class="form-control" name="content" placeholder=""></textarea>
                        </div>
                      </div>
                    </div>                       
                    <button type="submit" class="btn btn-primary pull-right">Submit</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>            
          </div>
        </div>
      </div>
@stop