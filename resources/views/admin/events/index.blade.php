@extends('layout.admin')
@section('page-title', 'Events')
@section('breadcrumbs')
            <ol class="breadcrumb">
                <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active"><i class="fa fa-post"></i> Posts</li>
            </ol>
@endsection

@section('add-btn-page')
   <a href="/admin/events/create">
    <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-calendar-check-o"></i> Add Event</button>
    </a>
@endsection
@section('content')
       
    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">View Recent Events</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
          <div class="box-body">
              @foreach ($events as $event)
                  <div class="col-md-4" style="height: 300px !important;width: 33.33%">
                      <!-- Widget: user widget style 1 -->
                      <div class="box box-widget widget-user-2">
                          <!-- Add the bg color to the header using any of the bg-* classes -->
                          <div class="widget-user-header bg-black">
                              <a href="{{ route('events.show', $event->id) }}">
                                  <div class="widget-user-image">
                                      <img style="width:60px !important;height:60px !important;border-radius:100%;" src="{{ asset('img/events/'.$event->event_pic) }}" alt="Post Image">
                                  </div>
                              </a>
                              <!-- /.widget-user-image -->
                              <h2 class="widget-user-username"><a href="{{ route('events.show', $event->id) }}" style="color: white !important;">{{$event->title}}</a></h2>
                              <p class="clearfix"></p>
                          </div>
                          <div class="box-footer no-padding">
                              <ul class="nav nav-stacked">
                                  <li><a href="#"> {{ $event->location }}<span class="pull-left fa fa-map-marker"></span></a></li>
                                  <li><a href="#"> {{ $event->event_time }} <span class="pull-left fa fa-clock-o"></span></a></li>
                                  <li><a href="{{ $event->url }}" class="text-aqua"> {!! substr($event->url, 0,36) !!}{!! strlen($event->url) > 36 ? "..." : "" !!} <span class="pull-left fa fa-globe"></span></a></li>
                                  <li><a href="#">Interested candidates <span class="pull-right badge bg-red">{{ $event->interested->where('interested', 1)->count() }}</span></a></li>
                              </ul>
                          </div>
                      </div>
                      <!-- /.widget-user -->
                  </div>
              @endforeach
          </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="text-center">
                {!! $events->links() !!}
            </div>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
    @endsection