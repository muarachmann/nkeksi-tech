<?php
/**
 * Created by PhpStorm.
 * User: rachmann mua <muarachmann@gmail.com>
 * Date: 6/2/18
 * Time: 7:18 PM
 */

?>

@extends('layout.admin')
@section('page-title', 'Team')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-users"></i> Team</li>
    </ol>
@endsection

@section('add-btn-page')
    <a href="/admin/team/create">
        <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-plus-circle"></i> Add Team Member</button>
    </a>
@endsection
@section('content')
    <!-- Main content -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">View Team Members</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            @foreach ($team as $member)
                <div class="col-md-4">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2" style="border: 1px solid whitesmoke">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-blue">
                            <a href="{{ route('team.show',$member->id) }}">
                            <div class="widget-user-image">
                                <img style="width:60px !important;height:60px !important;border-radius:100%;" src="{{ asset('img/team/'.$member->profile_pic) }}" alt="{{ $member->fullname }}">
                            </div>
                            </a>
                            <!-- /.widget-user-image -->
                            <h3 class="widget-user-username"><a class="text-aqua" href="{{ route('team.show',$member->id) }}"> {{$member->fullname}}</a></h3>
                            <h5 class="widget-user-desc">{{ $member->profession }}</h5>
                        </div>
                        <div class="box-body">
                        <p>
                            {!! substr($member->about, 0,200) !!}
                            {!! strlen($member->about) > 200 ? "..." : "" !!}
                        </p>
                        </div>
                        <div class="box-footer no-padding">
                            <p class="clear">
                            <ul class="list-unstyled list-inline">
                                @if($member->linkedin != NULL)
                                        <li><a href="{{ $member->linkedin }}" target="_blank" class="btn btn-social-icon btn-linkedin"><i class="fa fa-linkedin"></i></a><li>
                                @endif
                                @if($member->facebook != NULL)
                                        <li><a href="{{ $member->facebook }}" target="_blank" class="btn btn-social-icon btn-facebook"><i class="fa fa-facebook"></i></a><li>
                                @endif

                                @if($member->twitter != NULL)
                                        <li><a href="{{ $member->twitter }}" target="_blank" class="btn btn-social-icon btn-twitter"><i class="fa fa-twitter"></i></a><li>
                                @endif
                                @if($member->google != NULL)
                                        <li><a href="{{ $member->google }}" target="_blank" class="btn btn-social-icon btn-google"><i class="fa fa-google"></i></a><li>
                                @endif
                            </ul>
                            <p class="clear">
                            <p class="clear">
                        </div>
                    </div>
                    <!-- /.widget-user -->
                </div>
            @endforeach
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="text-center">
                {{--{!! $team->links() !!}--}}
            </div>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection
