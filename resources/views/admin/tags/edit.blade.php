 @extends('layout.admin')
@section('page-title', 'Tags- Nkeksi Dashboard')
@section('breadcrumbs')
            <ol class="breadcrumb">
                <li><a href="/admin/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="/admin/posts"><i class="fa fa-bookmark"></i> Posts</a></li>
                <li><a href="/admin/tags"><i class="fa fa-tags"></i> Tags</a></li>
                <li class="active"><i class="fa fa-tag"></i> {{ $tag->name }}</li>
            </ol>
@endsection

@section('add-btn-page')
  
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
              <h3 class="box-title">{{ $tag->name }}<small>-Tag</small>
                 @if($tag->posts()->count() == 1)
                 <span class="text-info">{{ $tag->posts()->count()}} post</span>
                 @else
                 {{ $tag->posts()->count()}} posts
                 @endif
                </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
                       <!-- form start -->
                    <form role="form" id="createTag" action="{{ route('tags.update', $tag->id) }}" method="POST" data-parsley-validate>
                    {{ csrf_field() }}
                     {{ method_field('PATCH') }}
                        <div class="box-body">
                        <div class="form-group">
                        <label for="tag">Tag Name</label>
                        <input type="text" class="form-control" id="tag" value="{{ $tag->name }}" name="tag" placeholder="Enter tag name" required maxlength="30">
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
 
 
