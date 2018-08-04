<?php
/**
 * Created by PhpStorm.
 * User: rachmann
 * Date: 5/25/18
 * Time: 1:05 PM
 */
?>
@extends('layout.admin')
@section('page-title', 'Users - Single user')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/admin/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/admin/users"><i class="fa fa-users"></i> Users</a></li>
        <li class="active"><i class="fa fa-user"></i> {{$user->name}}</li>
    </ol>
@endsection

@section('add-btn-page')
    <a href="/admin/posts/create">
        <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-user-plus"></i> Add new user</button>
    </a>
@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="img-responsive center-block" src="{{ asset('img/users/'.$user->avatar) }}" alt="User profile picture">
                        <br>
                        <h3 class="profile-username text-center">{{ $user->name }}</h3>

                        <p class="text-muted text-center">sadasd</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Likes <i class="fa fa-thumbs-o-up"></i></b> <a class="pull-right">{{ $user->likes->where('like', 1)->count() }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Comment (s) <i class="fa fa-comments-o"></i></b> <a class="pull-right">{{ $user->comments->count() }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Events Interested</b> <a class="pull-right">{{ $user->interested->where('interested', 1)->count() }}</a>
                            </li>
                        </ul>
                        <a href="#" onclick="event.preventDefault();document.getElementById('editTab').click();" class="btn btn-primary btn-block"><b>Edit User</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About User</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-user margin-r-5"></i> Name</strong>

                        <p class="text-muted">
                            <a href="#">{{ $user->name  }}</a>
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                        <p class="text-muted">{{ $user->location }}</p>

                        <hr>

                        <strong><i class="fa fa-phone margin-r-5"></i> Phone Number</strong>

                        <p>
                            {{ $user->phone }}
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                        <p>
                            {!! $user->about !!}
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">{{ $user->name }}</a></li>
                        <li><a href="#timeline" data-toggle="tab">User Timeline</a></li>
                        <li><a href="#settings" data-toggle="tab" id="editTab">Edit User</a></li>
                        <li><a href="#comments" data-toggle="tab">Courses</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <a href="{{ route('users.show', $user->id) }}"><img class="img-bordered-sm img-circle" src="/img/users/{{ $user->avatar }}" alt="user image"></a>
                                    <span class="username">
                          <a href="#">{{ $user->name }}</a>
                        </span>
                                    <span class="description">{{ date('M j, Y  h:ia',(strtotime($user->created_at))) }}</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    {!! $user->about !!}
                                </p>
                                <ul class="list-inline">
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Likes({{ $user->likes->where('like', 1)->count() }})</a>
                                    </li>
                                    <li class="pull-right">
                                        <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments({{ $user->comments->count() }})
                                            &nbsp; <i class="fa fa-book margin-r-5"></i> courses enrolled(5)</a></li>
                                </ul>

                            </div>
                            <!-- /.post -->
                        </div>
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <!-- The timeline -->
                            <ul class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-envelope bg-blue"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                        <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                        <div class="timeline-body">
                                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                            quora plaxo ideeli hulu weebly balihoo...
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs">Read more</a>
                                            <a class="btn btn-danger btn-xs">Delete</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-user bg-aqua"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                        <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                                        </h3>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-comments bg-yellow"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                        <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                        <div class="timeline-body">
                                            Take me to your leader!
                                            Switzerland is small and neutral!
                                            We are more like Germany, ambitious and misunderstood!
                                        </div>
                                        <div class="timeline-footer">
                                            <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <!-- timeline time label -->
                                <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                                </li>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <li>
                                    <i class="fa fa-camera bg-purple"></i>

                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                        <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                        <div class="timeline-body">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            <img src="http://placehold.it/150x100" alt="..." class="margin">
                                        </div>
                                    </div>
                                </li>
                                <!-- END timeline item -->
                                <li>
                                    <i class="fa fa-clock-o bg-gray"></i>
                                </li>
                            </ul>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="comments">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3>Courses -<small> 25 Total</small></h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body  no-padding">
                                            <table class="table table-hover">
                                                <tr>
                                                    <th>id</th>
                                                    <th>Course Name</th>
                                                    <th>Course Category</th>
                                                    <th>Start date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </table>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                            <form id="createPost" action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="form-group">
                                    <label for="title">Name</label>
                                    <input type="text" class="form-control" id="title" value="{{ $user->name }}" name="title" placeholder="Enter post title" required maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label>Location</label>
                                    <select class="form-control select2" name="author" data-placeholder="Select author" style="width: 100%;" >
                                            <option value="Buea">Buea</option>
                                            <option value="Buea">Limbe</option>
                                            <option value="Buea">Douala</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" id="title" value="{{ $user->phone }}" name="title" placeholder="Enter post title" required maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label>xzcxcz</label>
                                </div>

                                <div class="form-group">
                                    <label for="myFile">Profile picture</label>
                                    <input class="form-control" name="myFile" id="myFile" placeholder="" type="file" required>
                                </div>

                                <p style="font-weight:bolder;">About User</p>
                                <textarea id="editor1" name="editor1" rows="10" cols="80">
                        {{ $user->about }}
                    </textarea>
                                <br>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-info">Save Post</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- ./row -->
    </section>
    <!-- /.content -->
@endsection


