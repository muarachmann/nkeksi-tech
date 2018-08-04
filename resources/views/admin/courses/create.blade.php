@extends('layout.admin')
@section('page-title', 'Courses - Add course')
@section('breadcrumbs')
            <ol class="breadcrumb">
                <li class=""><a href="/admin/dashboard"><i class="fa fa-home"></i> Dashboard</a></li>
                <li class=""><a href="/admin/courses"><i class="fa fa-book"></i> Courses</a></li>
                <li class="active"><i class="fa fa-book"></i> Add Courses</li>
            </ol>
@endsection

@section('add-btn-page')
 <a href="/admin/tags">
    <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-tag"></i> Add Tag</button>
    </a>
   <a href="/admin/categories">
    <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-bookmark"></i> Add Category</button>
    </a>
@endsection
@section('content')
      <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Add a new course 
                <small>Advanced and full of features</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-warning btn-xs" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-danger btn-xs" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form id="createPost" action="{{ route('courses.store') }}" enctype="multipart/form-data" method="POST" data-parsley-validate>
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="title">Course Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter course title" required maxlength="255">
                </div>

                  <div class="form-group">
                      <label>Instructor</label>
                      <select class="form-control select2" name="instructor" data-placeholder="Select author"
                              style="width: 100%;">
                          @foreach ($team as $member)
                              <option value="{{ $member->id }}">{{ $member->fullname }}</option>
                          @endforeach
                      </select>
                  </div>

              <div class="form-group">
                <label>Category</label>
                <select class="form-control select2" data-placeholder="Select category" style="width: 100%;" >
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
              </div>

                  <div class="form-group">
                      <label for="weekly">Weekly Hour</label>
                      <input type="text" class="form-control" id="weekly" name="weekly" placeholder="Enter weekly hours e.g 4-6 hours
" required maxlength="255">
                  </div>

                  <!-- Date -->
                  <div class="form-group col-md-6">
                      <label>Date:</label>

                      <div class="input-group date">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control" id="datepicker">
                      </div>
                      <!-- /.input group -->
                  </div>

                  <!-- time Picker -->
                  <div class="form-group col-md-6">
                      <label>Time picker:</label>

                      <div class="input-group">
                          <input type="text" class="form-control timepicker">

                          <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                          </div>
                      </div>
                      <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                  <!-- /.form group -->

                  <!-- Date range -->
                  <div class="form-group col-md-6">
                      <label>Date range:</label>

                      <div class="input-group">
                          <div class="input-group-addon">
                              <i class="fa fa-calendar"></i>
                          </div>
                          <input type="text" class="form-control" id="reservation">
                      </div>
                      <!-- /.input group -->
                  </div>
                  <!-- /.form group -->

                  <!-- Date and time range -->
                  <div class="form-group">
                      <label>Date and time range:</label>

                      <div class="input-group">
                          <div class="input-group-addon">
                              <i class="fa fa-clock-o"></i>
                          </div>
                          <input type="text" class="form-control pull-right" id="reservationtime">
                      </div>
                      <!-- /.input group -->
                  </div>
                  <!-- /.form group -->



                <div class="form-group">
                  <label for="gallery">Upload Gallery</label>
                  <input type="file" id="gallery" name="gallery[]" multiple="multiple">
                </div>
                <p style="font-weight:bolder;">Enter post body</p>
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                        Enter your course description here
                    </textarea>
                    <br>
                    <br>
                    <div class="pull-right">
                      <button type="submit" class="btn btn-info">Create Course</button>
                    </div>
              </form>
            </div>
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
          
    @endsection