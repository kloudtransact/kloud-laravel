@extends("admin.layout")

@section('title',"Posts")

@section('content')
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Posts <a href="{{url('cobra-add-post')}}">Add New Post</a></h4>
                  <p class="card-category"> View all blog posts </p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table kloud-data-table">
                      <thead class=" text-primary">
                                                <th>Image</th>
                                                <th>Title</th>
                                                <th>Friendly URL</th>
                                                <th>Stats</th>
                                                <th>Posted by</th>
                                                <td>Actions</td>
                      </thead>
                      <tbody>
                        @if($posts != null && count($posts) > 0)
                                              @foreach($posts as $p)
                                              <?php
                                                $uu = url('cobra-post')."?id=".$p['flink'];
                                              ?>
                                                 <tr>
                                                  <td><img src="{{$p['img']}}" class="img img-fluid"></td>
                                                  <td>{{$p['title']}}</td>
                                                  <td>{{$p['flink']}}</td>
                                                  <td class="text-primary">{{$p['likes']}} likes</td>
                                                  <td>{{$p['user']}}</td>
                                                  <td>
                                                    <a class="btn btn-success" href="{{$uu}}">View</a>
                                                  </td>
                                                 </tr>
                                              @endforeach
                                            @endif
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