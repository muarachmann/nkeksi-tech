@extends('layout.admin')
@section('page-title', 'Documents')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-file-pdf-o"></i> Documents</li>
    </ol>
@endsection

@section('add-btn-page')
    <a href="{{ route('posts.create') }}">
        <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-plus-circle"></i> Add Post</button>
    </a>
    <a href="{{ route('courses.create') }}">
        <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-book"></i> Add Course</button>
    </a>
    <a href="{{ route('docs.create') }}">
        <button type="button" class="btn bg-yellow btn-flat margin"><i class="fa fa-file-pdf-o"></i> Add Documents</button>
    </a>
@endsection
@section('content')
    <!-- Main content -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">View Documents</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
docs
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