@extends('layout.admin')

@section('page-title', 'Events - Single Event')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/admin/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/admin/events"><i class="fa fa-map-signs"></i> Events</a></li>
        <li class="active"><i class="fa fa-map-signs"></i>  {!! substr($event->title, 0,25) !!}
            {!! strlen($event->title) > 25 ? "..." : "" !!}</li>
    </ol>
@endsection

@section('add-btn-page')
    <a href="/admin/events/create">
        <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-map-signs"></i> Add Event</button>
    </a>
    <a href="#" class="pull-right" onclick="event.preventDefault();document.getElementById('destroy-tag').submit();">
        <button type="button" class="btn bg-maroon btn-flat margin"><i class="fa fa-trash"></i> Delete Event</button>
    </a>
    <form id="destroy-tag" action="{{ route('events.destroy', $event->id) }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="img-responsive center-block" src="{{ asset('img/events/'.$event->event_pic) }}" alt="User profile picture">
                        <br>
                        <h3 class="profile-username text-center">{{ $event->title }}</h3>

                        <p class="text-muted text-center">{{ $event->location }}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Intrested <i class="fa fa-users"></i></b> <a class="pull-right">{{ $event->interested->where('interested', 1)->count() }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Comment (s) <i class="fa fa-comments-o"></i></b> <a class="pull-right">3454</a>
                            </li>
                            <li class="list-group-item">
                                <b>Views</b> <a class="pull-right">13,287</a>
                            </li>
                        </ul>
                        <a href="#" onclick="event.preventDefault();document.getElementById('editTab').click();" class="btn btn-primary btn-block"><b>Edit Event</b></a>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Event</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-location-arrow margin-r-5"></i> Location</strong>
                        <p class="text-muted"><a href="#">{{ $event->location }}</a></p>
                        <hr>
                        <strong><i class="fa fa-clock-o margin-r-5"></i> Time</strong>
                        <p class="text-muted">{{ $event->event_time }}</p>
                        <hr>
                        <strong><i class="fa fa-globe margin-r-5"></i>Alternate site</strong>
                        <p class="text-muted"><a href="{{ $event->url }}" target="_blank">{{ $event->url }}</a></p>
                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> About</strong>
                        <p>{!! substr($event->info, 0,100) !!}{!! strlen($event->info) > 100 ? "..." : "" !!}</p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab"> {!! substr($event->title, 0,35) !!}{!! strlen($event->title) > 35 ? "..." : "" !!}</a></li>
                        <li><a href="#timeline" data-toggle="tab">Event Timeline</a></li>
                        <li><a href="#settings" data-toggle="tab" id="editTab">Edit Event</a></li>
                        <li><a href="#interested" data-toggle="tab">Interested Users</a></li>
                        <li><a href="#map" data-toggle="tab">View Map</a></li>
                    </ul>
                    <!-- /.tab-content -->
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">
                            <!-- Post -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="{{ asset('img/events/'.$event->event_pic) }}" alt="user image">
                                    <span class="username">
                          <a href="#">{{ $event->title }}</a>
                                    </span>
                                    <span class="description">Shared publicly - 7:30 PM today</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    {!! $event->info !!}
                                </p>
                                <ul class="list-inline">
                                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                                    </li>
                                    <li class="pull-right">
                                        <a href="#" class="link-black text-sm"><i class="fa fa-users margin-r-5"></i> Interested
                                            ({{ $event->interested->where('interested', 1)->count() }})</a></li>
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

                        <div class="tab-pane" id="settings">
                            <form id="updateEvent" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data" method="POST" data-parsley-validate>
                                {{ csrf_field() }}
                                {{ method_field('PATCH') }}
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" value="{{ $event->title }}" id="title" name="title" placeholder="Enter event title" required maxlength="255">
                                </div>

                                <div class="form-group">
                                    <label for="title">Location</label>
                                    <input type="text" class="form-control" value="{{ $event->location }}" id="location" name="location" placeholder="Enter event location" required maxlength="255">
                                </div>
                                <!-- Date -->
                                <div class="form-group col-md-6">
                                    <label>Event Date:</label>

                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" value="{{ date('m/d/Y',(strtotime($event->event_date))) }}" class="form-control" id="datepicker" name="datepicker">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                                <!-- time Picker -->
                                <div class="form-group col-md-6">
                                    <div class="bootstrap-timepicker">

                                        <label>Event Time:</label>

                                        <div class="input-group">
                                            <input type="text" value="{{ $event->event_time }}" class="form-control timepicker" id="timepicker" name="timepicker">

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
                                    <input type="url" class="form-control" id="url" value="{{ $event->url }}" name="url" placeholder="Enter event location"  maxlength="255">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="title">Latitude</label>
                                    <input type="text" class="form-control" id="lat" value="{{ $event->lat }}" name="lat" placeholder="Enter event coordinates(latitude)"  maxlength="255">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="title">Longitude</label>
                                    <input type="text" class="form-control" id="long" value="{{ $event->long }}" name="long" placeholder="Enter event coordinates(longitude)"  maxlength="255">
                                </div>



                                <div class="form-group">
                                    <label for="featured_file">Upload Featured image, video or audio</label>
                                    <input type="file" id="featured_file" name="featured_file">
                                </div>
                                <p style="font-weight:bolder;">Enter event info</p>
                                <textarea id="editor1" name="editor1" rows="10" cols="80">{{ $event->info }}</textarea>
                                <br>
                                <br>
                                <div class="pull-right">
                                    <button type="submit" class="btn btn-info">Update Event</button>
                                </div>
                            </form>
                            <p class="clearfix"></p>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="interested">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="box">
                                        <div class="box-header">
                                            <h3>Interested Users -<small> {{ $event->interested->where('interested', 1)->count() }} Total</small></h3>
                                        </div>
                                        <!-- /.box-header -->
                                        <div class="box-body  no-padding">
                                            <table class="table table-hover">
                                                <tr>
                                                    <th>Profile pic</th>
                                                    <th>User</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Location</th>
                                                    <th>Actions</th>
                                                </tr>
                                                @foreach($event->interested as $interested)
                                                    <tr>
                                                        <td><img class="img-responsive" src="{{ asset('img/users/'.$interested->user->avatar) }}" width="50px" height="50px" style="border-radius:100%;"></td>
                                                        <td>{{ $interested->user->name }}</td>
                                                        <td>{{ $interested->user->email }}</td>
                                                        <td>{{ $interested->user->phone }}</td>
                                                        <td>{{ $interested->user->location }}</td>
                                                        <td>
                                                            <a href="{{ route('users.show', $interested->user->id) }}">
                                                                <button type="button" class="btn bg-blue btn-sm btn-flat margin">View user</button>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            </table>
                                        </div>
                                        <!-- /.box-body -->
                                    </div>
                                    <!-- /.box -->
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->

                        <div class="tab-pane" id="map">
                            <div class="row">
                                <div class="col-xs-12">
                                  map goes here
                                </div>
                            </div>
                        </div>
                        <!-- /.tab-pane -->
                    </div>
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


