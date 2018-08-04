@extends('layout.admin')
@section('page-title', 'Videos')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-bookmark"></i> Videos</li>
    </ol>
@endsection

@section('add-btn-page')
    <a href="{{ route('posts.create') }}">
        <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-plus-circle"></i> Add Post</button>
    </a>
    <a href="{{ route('courses.create') }}">
        <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-book"></i> Add Course</button>
    </a>
    <a href="{{ route('video.create') }}">
        <button type="button" class="btn bg-yellow btn-flat margin"><i class="fa fa-video-camera"></i> Add Video</button>
    </a>
@endsection
@section('content')
    <!-- Main content -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">View Videos</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            @foreach($videos as $video)
                <div class="col-sm-3">
                    <video controls width="100%" height="200">
                        <source src="/gallery/images/{{$video->name}}" type="video/mp4">
                        <div style="border: 1px solid black ; padding: 8px ;">
                            Sorry, your browser does not support the &lt;video&gt; tag used in this demo.
                        </div>
                    </video>
                   <br><br>
                </div>
            @endforeach
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="text-center">
{{--                {!! $images->links() !!}--}}
            </div>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection