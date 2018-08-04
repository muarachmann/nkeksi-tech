@extends('layout.admin')
@section('page-title', 'Event - Add Event')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/admin/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/admin/events"><i class="fa fa-map-signs"></i> Events</a></li>
        <li class="active"><i class="fa fa-map-signs"></i> Add new Event</li>
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
                        <h3 class="box-title">Add a new event
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
                        <form id="createEvent" action="{{ url('admin/events ') }}" enctype="multipart/form-data" method="POST" data-parsley-validate>
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter event title" required maxlength="255">
                            </div>

                            <div class="form-group">
                                <label for="title">Location</label>
                                <input type="text" class="form-control" id="location" name="location" placeholder="Enter event location" required maxlength="255">
                            </div>
                            <!-- Date -->
                            <div class="form-group col-md-6">
                                <label>Event Date:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control" id="datepicker" name="datepicker">
                                </div>
                                <!-- /.input group -->
                            </div>
                            <!-- /.form group -->
                            <!-- time Picker -->
                            <div class="form-group col-md-6">
                            <div class="bootstrap-timepicker">

                                <label>Event Time:</label>

                                <div class="input-group">
                                    <input type="text" class="form-control timepicker" id="timepicker" name="timepicker">

                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                                <!-- /.input group -->
                            </div>
                            </div>
                            <!-- /.form group -->
                            <!-- /.form group -->

                            <div class="form-group">
                                <label for="title">Url</label>
                                <input type="url" class="form-control" id="url" name="url" placeholder="Enter event location"  maxlength="255">
                            </div>

                            <div class="form-group col-md-6">
                                <label for="title">Latitude</label>
                                <input type="text" class="form-control" id="lat" name="lat" placeholder="Enter event coordinates(latitude)"  maxlength="255">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="title">Longitude</label>
                                <input type="text" class="form-control" id="long" name="long" placeholder="Enter event coordinates(longitude)"  maxlength="255">
                            </div>



                            <div class="form-group">
                                <label for="featured_file">Upload Featured image, video or audio</label>
                                <input type="file" id="featured_file" name="featured_file">
                            </div>
                            <p style="font-weight:bolder;">Enter event info</p>
                            <textarea id="editor1" name="editor1" rows="10" cols="80">
                    </textarea>
                            <br>
                            <br>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-info">Create Event</button>
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