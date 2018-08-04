<?php
/**
 * Created by PhpStorm.
 * User: rachmann mua <muarachmann@gmail.com>
 * Date: 6/2/18
 * Time: 7:18 PM
 */

?>


@extends('layout.admin')
@section('page-title', 'Team Member')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/admin/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/admin/team"><i class="fa fa-users"></i> Team</a></li>
        <li class="active"><i class="fa fa-user"></i> {{$member->fullname}}</li>
    </ol>
@endsection

@section('add-btn-page')
    <a href="/admin/team/create">
        <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-user-circle"></i> Add new Member</button>
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
                        <img class="img-responsive center-block" src="{{ asset('img/team/'.$member->profile_pic) }}">
                        <br>
                        <h3 class="profile-username text-center">{{ $member->fullname }}</h3>

                        <p class="text-muted text-center">{{ $member->profession }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Likes <i class="fa fa-thumbs-o-up"></i></b> <a class="pull-right">1,322</a>
                            </li>
                            <li class="list-group-item">
                                <b>Post(s) <i class="fa fa-bookmark-o"></i></b> <a class="pull-right">{{ $member->posts()->count() }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Course(s) <i class="fa fa-book"></i></b> <a class="pull-right">13</a>
                            </li>
                        </ul>

                        <a href="#" onclick="event.preventDefault();document.getElementById('editTab').click();" class="btn btn-primary btn-block"><b>Edit Team</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">{{ $member->fullname }}</a></li>
                        <li><a href="#timeline" data-toggle="tab">Member Timeline</a></li>
                        <li><a href="#settings" data-toggle="tab" id="editTab">Edit Member</a></li>
                        <li><a href="#courses" data-toggle="tab">Courses</a></li>
                        <li><a href="#posts" data-toggle="tab">Posts</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="{{ asset('img/team/'.$member->profile_pic) }}" alt="user image">
                                    <span class="username">
                          <a href="#">{{ $member->fullname }}</a>
                                    </span>
                                    <span class="description">Member since - {{ date('M j, Y  h:ia',(strtotime($member->created_at))) }}</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    {!! $member->about !!}
                                </p>
                                <ul class="list-inline">
                                    @if($member->linkedin != NULL)
                                        <li><a href="{{ $member->linkedin }}" class="link-black text-sm"><i class="fa fa-linkedin margin-r-5"></i> linkedin</a></li>
                                    @endif
                                    @if($member->facebook != NULL)
                                            <li><a href="{{ $member->facebook }}" class="link-black text-sm"><i class="fa fa-facebook margin-r-5"></i> facebook</a></li>
                                        @endif

                                    @if($member->twitter != NULL)
                                            <li><a href="{{ $member->twitter }}" class="link-black text-sm"><i class="fa fa-twitter margin-r-5"></i> twiiter</a></li>
                                        @endif
                                    @if($member->google != NULL)
                                            <li><a href="{{ $member->google }}" class="link-black text-sm"><i class="fa fa-google-plus-circle margin-r-5"></i> google</a></li>
                                        @endif

                                    <li class="pull-right">
                                        <a href="#" class="link-black text-sm"><i class="fa fa-book margin-r-5"></i> Courses (4)</a>
                                            &nbsp;
                                        <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Post ({{ $member->posts()->count() }})
                                        </a>
                                    </li>
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

                        <div class="tab-pane" id="posts">
                            <div class="row">
                                <div class="col-xs-12">
                                    <table class="table table-hover">
                                        <tbody>
                                        <tr>
                                            <th>Post pic</th>
                                            <th>Post Title</th>
                                            <th>Tags</th>
                                            <th>Action</th>
                                        </tr>

                                        @foreach ($member->posts as $post )
                                            <tr>
                                                <td><img class="img-responsive img-circle" src="{{  asset('img/blogPosts/'.$post->featured_file) }}" width="50px" height="50px" style="border-radius:100%;"></td>
                                                <td><a href="{{ route('posts.show', $post->id)}}">{{ $post->title }}</a></td>
                                                <td>
                                                    @foreach ($post->tags as $tag)
                                                        <a href="{{ route('tags.show', $tag->id)}}"><small class="label bg-maroon-active">{{ $tag->name }}</small></a>
                                                    @endforeach
                                                </td>
                                                <td><a href="{{ route('posts.show', $post->id)}}"><button class="btn btn-sm btn-success">View post</button></a></td>
                                            </tr>
                                        @endforeach

                                        </tbody></table>

                                </div>
                            </div>


                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="courses">
                            <div class="row">
                                <div class="col-xs-12">
                                    courses
                                </div>
                            </div>


                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                            <form id="updateMember" action="{{ route('team.update', $member->id) }}" enctype="multipart/form-data" method="POST" data-parsley-validate>
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <h3 class="text-maroon">Personal Information</h3>

                                <div class="form-group">
                                    <label for="fullname">Fullname</label>
                                    <input type="text" class="form-control" value="{{ $member->fullname }}" id="fullname" name="fullname" placeholder="Enter fullname" required maxlength="255">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" value="{{ $member->email }}" id="email" name="email" placeholder="Enter email"  required>
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
                                    <input type="text" class="form-control" id="profession" value="{{ $member->profession }}" name="profession"  required>
                                </div>

                                <h3 class="text-maroon">Social Profiles</h3>
                                <div class="form-group">
                                    <label for="linkedin">Linkedin</label>
                                    <input type="text" class="form-control" value="{{ $member->linkedin }}" id="linkedin" name="linkedin">
                                </div>
                                <div class="form-group">
                                    <label for="google">Google</label>
                                    <input type="text" class="form-control" value="{{ $member->google }}" id="google" name="google">
                                </div>
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" class="form-control" value="{{ $member->facebook }}" id="facebook" name="facebook">
                                </div>
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" class="form-control" value="{{ $member->twitter }}" id="twitter" name="twitter">
                                </div>

                                <p style="font-weight:bolder;">About / Biography</p>
                                <textarea id="editor1" name="editor1" rows="10" cols="80">{{ $member->about }}</textarea>
                                <br>
                                <br>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-info">Update Member</button>
                                </div>
                            </form>
                            <p class="clearfix"></p>
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


