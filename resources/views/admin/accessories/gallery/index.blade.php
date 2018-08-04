@extends('layout.admin')
@section('page-title', 'Gallery')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-bookmark"></i> Gallery</li>
    </ol>
@endsection

@section('add-btn-page')
    <a href="{{ route('posts.create') }}">
        <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-plus-circle"></i> Add Post</button>
    </a>
    <a href="{{ route('courses.create') }}">
        <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-book"></i> Add Course</button>
    </a>
    <a href="{{ route('gallery.create') }}">
        <button type="button" class="btn bg-yellow btn-flat margin"><i class="fa fa-picture-o"></i> Add Images</button>
    </a>
@endsection
@section('content')
    <!-- Main content -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">View Gallery</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

            @foreach($images as $image)
                <div class="col-sm-3">
                    <img class="img-responsive img-thumbnail" src="/gallery/images/{{$image->name}}" width="98%" style="height: 200px !important;" alt="Photo"><br><br>
                </div>
                @endforeach
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="text-center">
                {!! $images->links() !!}
            </div>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection