@extends('layout.admin')
@section('page-title', 'Team - Add team member')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/admin/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/admin/team"><i class="fa fa-users"></i> Team</a></li>
        <li class="active"><i class="fa fa-user"></i> Add member</li>
    </ol>
@endsection

@section('add-btn-page')
    <a href="/admin/team">
        <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-users"></i>View Team</button>
    </a>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">Add a new member
                            <small>Add any member of the nkeksi team</small>
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
                        <form id="createPost" action="{{ url('admin/team ') }}" enctype="multipart/form-data" method="POST" data-parsley-validate>
                            {{ csrf_field() }}
                            <h3 class="text-maroon">Personal Information</h3>

                            <div class="form-group">
                                <label for="fullname">Fullname</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter fullname" required maxlength="255">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"  required>
                            </div>

                            <div class="form-group">
                                <label for="profile_pic">Profile picture</label>
                                <input class="form-control" name="profile_pic" id="profile_pic" placeholder="" type="file" required>
                            </div>
                            <div class="form-group">
                                <label for="site">Site</label>
                                <input type="url" class="form-control" id="site" name="site">
                            </div>

                            <div class="form-group">
                                <label for="profession">Profession</label>
                                <input type="text" class="form-control" id="profession" name="profession"  required>
                            </div>

                            <h3 class="text-maroon">Social Profiles</h3>
                            <div class="form-group">
                                <label for="linkedin">Linkedin</label>
                                <input type="text" class="form-control" id="linkedin" name="linkedin">
                            </div>
                            <div class="form-group">
                                <label for="google">Google</label>
                                <input type="text" class="form-control" id="google" name="google">
                            </div>
                            <div class="form-group">
                                <label for="facebook">Facebook</label>
                                <input type="text" class="form-control" id="facebook" name="facebook">
                            </div>
                            <div class="form-group">
                                <label for="twitter">Twitter</label>
                                <input type="text" class="form-control" id="twitter" name="twitter">
                            </div>

                            <p style="font-weight:bolder;">About / Biography</p>
                            <textarea id="editor1" name="editor1" rows="10" cols="80"></textarea>
                            <br>
                            <br>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-info">Create Member</button>
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