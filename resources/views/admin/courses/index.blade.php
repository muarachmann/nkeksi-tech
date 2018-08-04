@extends('layout.admin')
@section('page-title', 'Courses')
@section('breadcrumbs')
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-post"></i> Courses</li>
            </ol>
@endsection

@section('add-btn-page')
   <a href="/admin/courses/create">
    <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-book"></i> Add Course</button>
    </a>
@endsection
@section('content')
    
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">View Recent Courses</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          View all courses here and paginate!
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          sdafsdfsd
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    @endsection