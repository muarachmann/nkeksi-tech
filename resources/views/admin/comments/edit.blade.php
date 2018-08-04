 @extends('layout.admin')
@section('page-title', 'Tags- Nkeksi Dashboard')
@section('breadcrumbs')
            <ol class="breadcrumb">
                <li><a href="/admin/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="/admin/posts"><i class="fa fa-bookmark"></i> Posts</a></li>
                <li><a href="{{ route('posts.show', $comment->post->id) }}"><i class="fa fa-pencil"></i>{{ $comment->post->title}}</a></li>
                <li class="active"><i class="fa fa-comments-o"></i> comments</li>
            </ol>
@endsection

@section('add-btn-page')
    <a href="{{ route('posts.show', $comment->post->id) }}" onclick="event.preventDefault();document.getElementById('destroy-comment').submit();">
    <button type="button" class="btn bg-maroon btn-flat margin"><i class="fa fa-trash"></i> Delete Comment</button>
    </a>
     <form id="destroy-comment" action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
      </form>
@endsection
@section('content')
 <!-- Main content -->
    <section class="content">
     <div class="row">
         <div class="col-md-1">
              
        </div>
          <div class="col-md-10">
          <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">{{ $comment->name }}<small> - commented on <a class="text-info" href="{{ route('posts.show', $comment->post->id) }}"> {{ $comment->post->title}}</a></small>
                </h3>
                <a href="{{ route('users.show', $comment->user->id) }}"><img class="img-responsive pull-right" width="90" height="90" style="border-radius: 100%" src="{{  asset('img/users/'.$comment->user->avatar) }}"></a>
                <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                       <!-- form start -->
                    <form role="form" id="createTag" action="{{ route('comments.update', $comment->id) }}" method="POST" data-parsley-validate>
                    {{ csrf_field() }}
                     {{ method_field('PATCH') }}
                        <div class="box-body">
                            <div class="form-group">
                            <label for="comment">Comment</label>
                            <textarea class="form-control" rows="10" id="comment" name="comment" placeholder="Enter ...">{{ $comment->comment}}
                            </textarea>
                            </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <div class="text-center">
                        <button type="submit" class="btn btn-success btn-lg">Save Changes</button>
                        </div>
                    </div>
                    </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
        </div>
        <!-- /.col -->
        <div class="col-md-1">
              
        </div>
        <!-- /.col -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  @endsection
 
 
