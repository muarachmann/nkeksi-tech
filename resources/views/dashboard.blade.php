@extends('layout.main')

@section('title')
    {{ Auth::user()->name }} | Nkeksi-tech
    @endsection

@section('page-class' , 'page-sub-page page-register-sign-in')


@section('breadcrumb')
    <!-- Breadcrumb -->
    <div class="container">
        <ol class="breadcrumb">
            <li><a href="/">Home</a></li>
            <li class="active">My Profile</li>
        </ol>
    </div>
    <!-- end Breadcrumb -->
@endsection


@section('header')
    @include('includes.header2')
@endsection

@section('content')
    <!-- Page Content -->
<div id="page-content">
    <div class="panel-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    </div>
    <div class="container">
        <header><h1>My Account</h1></header>
        <div class="row">
            <div class="col-md-8">
                <section id="my-account">
                    <ul class="nav nav-tabs" id="tabs">
                        <li class="active"><a href="#tab-profile" data-toggle="tab">Profile</a></li>
                        <li><a href="#tab-my-courses" data-toggle="tab">My Courses</a></li>
                        <li><a href="#tab-change-password" data-toggle="tab">Change Password</a></li>
                    </ul><!-- /#my-profile-tabs -->
                    <div class="tab-content my-account-tab-content">
                        <div class="tab-pane active" id="tab-profile">
                            <section id="my-profile">
                                <header><h3>My Profile</h3></header>
                                <div class="my-profile">
                                    <figure class="profile-avatar">
                                        <div class="image-wrapper"><img style="width: 80px;height: 80px;border-radius: 100%;" src="@if(Auth::user()->avatar != NULL ) {{asset('img/users')}}/{{ Auth::user()->avatar }} @else {{ asset('img/profile.png') }} @endif"></div>
                                    </figure>
                                    <article>
                                        <form id="updateProfile" action="{{ route('dashboard.updateprofile') }}" enctype="multipart/form-data" method="POST" data-parsley-validate>
                                            {{ csrf_field() }}
                                        <div class="table-responsive">
                                            <table class="my-profile-table">
                                                <tbody>
                                                <tr>
                                                    <td class="title">Name</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}">
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="title">Phone Number</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="phone" name="phone" value="{{ Auth::user()->phone }}">
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="title">Location</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="location" name="location" value="{{ Auth::user()->location }}">
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="title bio">About</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <textarea id="about" name="about" rows="5">{{ Auth::user()->about }}</textarea>
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="title">Email</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" id="email" disabled value="{{ Auth::user()->email }}">
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="title">Change Photo</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="file" id="avatar" name="avatar">
                                                        </div><!-- /input-group -->
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <button type="submit" class="btn pull-right">Save Changes</button>
                                        </form>
                                    </article>
                                </div><!-- /.my-profile -->
                            </section><!-- /#my-profile -->
                        </div><!-- /tab-pane -->
                        <div class="tab-pane" id="tab-my-courses">
                            <section id="course-list">
                                <header><h3>My Courses</h3></header>
                                <table class="table table-hover table-responsive course-list-table tablesorter">
                                    <thead>
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Course Type</th>
                                        <th class="starts">Starts</th>
                                        <th class="status">Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="status-not-started">
                                        <th class="course-title"><a href="course-detail-v1.html">Introduction to modo 701</a></th>
                                        <th class="course-category"><a href="#">Graphic Design and 3D</a></th>
                                        <th>01-03-2014</th>
                                        <th class="status"><i class="fa fa-calendar-o"></i>Not started yet</th>
                                    </tr>
                                    <tr class="status-not-started">
                                        <th class="course-title"><a href="course-detail-v1.html">Become self marketer</a></th>
                                        <th class="course-category"><a href="#">Marketing</a></th>
                                        <th>03-03-2014</th>
                                        <th class="status"><i class="fa fa-calendar-o"></i>Not started yet</th>
                                    </tr>
                                    <tr class="status-in-progress">
                                        <th class="course-title"><a href="course-detail-v2.html">How to find long term customers</a></th>
                                        <th class="course-category"><a href="#">Marketing</a></th>
                                        <th>06-03-2014</th>
                                        <th class="status"><i class="fa fa-clock-o"></i>In progress</th>
                                    </tr>
                                    <tr class="status-in-progress">
                                        <th class="course-title"><a href="course-detail-v2.html">Neuroscience and the future</a></th>
                                        <th class="course-category"><a href="#">Science</a></th>
                                        <th>21-03-2014</th>
                                        <th class="status"><i class="fa fa-clock-o"></i>In progress</th>
                                    </tr>
                                    <tr class="status-completed">
                                        <th class="course-title"><a href="course-detail-v1.html">History in complex view</a></th>
                                        <th class="course-category"><a href="#">History and Psychology</a></th>
                                        <th>06-04-2014</th>
                                        <th class="status"><i class="fa fa-check"></i>Completed</th>
                                    </tr>
                                    <tr class="status-completed">
                                        <th class="course-title"><a href="course-detail-v1.html">Become self marketer</a></th>
                                        <th class="course-category"><a href="#">Marketing</a></th>
                                        <th>03-03-2014</th>
                                        <th class="status"><i class="fa fa-check"></i>Completed</th>
                                    </tr>
                                    <tr class="status-completed">
                                        <th class="course-title"><a href="course-detail-v1.html">How to find long term customers</a></th>
                                        <th class="course-category"><a href="#">Marketing</a></th>
                                        <th>06-03-2014</th>
                                        <th class="status"><i class="fa fa-check"></i>Completed</th>
                                    </tr>
                                    <tr class="status-completed">
                                        <th class="course-title"><a href="course-detail-v1.html">Neuroscience and the future</a></th>
                                        <th class="course-category"><a href="#">Science</a></th>
                                        <th>21-03-2014</th>
                                        <th class="status"><i class="fa fa-check"></i>Completed</th>
                                    </tr>
                                    <tr class="status-completed">
                                        <th class="course-title"><a href="course-detail-v1.html">History in complex view</a></th>
                                        <th class="course-category"><a href="#">History and Psychology</a></th>
                                        <th>06-04-2014</th>
                                        <th class="status"><i class="fa fa-check"></i>Completed</th>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="center">
                                    <ul class="pagination">
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                    </ul>
                                </div>
                            </section><!-- /#course-list -->
                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="tab-change-password">
                            <section id="password">
                                <header><h3>Change Password</h3></header>
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-4">
                                        <p>
                                            Change your password settings rapidly below
                                        </p>
                                        <form role="form" class="clearfix" method="POST" action="{{ route('dashboard.updatepassword') }}">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="current-password">Current Password</label>
                                                <input type="password" class="form-control" id="current-password" name="current-password" >
                                            </div>
                                            <div class="form-group">
                                                <label for="password">New Password</label>
                                                <input type="password" class="form-control" id="password" name="password">
                                            </div>
                                            <div class="form-group">
                                                <label for="password-confirm">Repeat New Password</label>
                                                <input type="password" class="form-control" id="password-confirm" name="password-confirm">
                                            </div>
                                            <button type="submit" class="btn pull-right">Change Password</button>
                                        </form>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div><!-- /.tab-content -->
                </section>
            </div>

            <!--SIDEBAR Content-->
            <div class="col-md-4">
                @include('includes.sidebar')
            </div>
            <!-- /.col-md-4 -->
            <!-- end SIDEBAR Content-->


        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
<!-- end Page Content -->
    @endsection
