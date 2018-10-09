@extends('layout.admin')
@section('page-title', 'Posts')
@section('breadcrumbs')
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-bookmark"></i> Posts</li>
            </ol>
@endsection

@section('add-btn-page')
   <a href="/admin/posts/create">
    <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-plus-circle"></i> Add Post</button>
    </a>
@endsection
@section('content')
        <!-- Main content -->
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">View Recent Posts</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          @foreach ($posts as $post)
          <div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user-2">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-blue">
                <a href="{{ route('posts.show',$post->id) }}">
                <div class="widget-user-image">
                  <img style="width:60px !important;height:60px !important;border-radius:100%;" src="{{ asset('img/blogPosts/'.$post->featured_file) }}" alt="Post Image">
              </div>
              </a>
              <!-- /.widget-user-image -->
                <h3 class="widget-user-username"><a href="{{ route('posts.show',$post->id) }}" class="text-yellow">{{$post->title}}</a></h3>
                <h5 class="widget-user-desc"><i class="fa fa-user"></i><a class="text-teal" href="{{ route('team.show',$post->team->id) }}"> {{ $post->team->fullname }}</a></h5>
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#">Likes <span class="pull-right badge bg-blue">{{ $post->likes->where('like', 1)->count() }}</span></a></li>
                <li><a href="#">Comments <span class="pull-right badge bg-aqua">{{ $post->comments()->count() }}</span></a></li>
                <li> 
                   @foreach ($post->tags as $tag)
                 <a href="{{ route('tags.show', $tag->id)}}" class="tag"><span class="label label-success">{{ $tag->name }}</span></a>                    
                  @endforeach
                </li>
                <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>
              </ul>
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
                            @endforeach
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <div class="text-center">
            {!! $posts->links() !!}
          </div>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    @endsection