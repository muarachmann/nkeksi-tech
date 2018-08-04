<?php
/**
 * Created by PhpStorm.
 * User: rachmann
 * Date: 5/25/18
 * Time: 1:05 PM
 */
?>

@extends('layout.admin')
@section('page-title', 'Users')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active"><i class="fa fa-users"></i> Users</li>
    </ol>
@endsection

@section('add-btn-page')
    <a href="/admin/users/create">
        <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-user-plus"></i> Add User</button>
    </a>
@endsection
@section('content')
    <!-- Main content -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">View Recent Posts</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            @foreach ($userList as $user)
                <div class="col-md-4" style="height: 300px !important;width: 33.33%">
                    <!-- Widget: user widget style 1 -->
                    <div class="box box-widget widget-user-2" style="border: 1px solid whitesmoke">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-blue">
                            <a href="{{ route('users.show',$user->id) }}">
                                <div class="widget-user-image">
                                    <img style="width:60px !important;height:60px !important;border-radius:100%;" src="{{ asset('img/users') }}/{{ $user->avatar }}" alt="Post Image">
                                </div>
                            </a>
                            <!-- /.widget-user-image -->
                            <h2 class="widget-user-username"><a href="{{ route('users.show',$user->id) }}" style="color: white !important;">{{$user->name}}</a></h2>
                            <h5 class="widget-user-desc"><i class="fa fa-phone"></i>&nbsp; {{ $user->phone }} &nbsp;&nbsp; <i class="fa fa-map-marker"></i> {{ $user->location }}</h5>
                        </div>

                        <div class="box-body">
                            <p>
                                {!! substr($user->about, 0,200) !!}
                                {!! strlen($user->about) > 200 ? "..." : "" !!}
                            </p>
                        </div>
                        <div class="box-footer no-padding">
                            <ul class="nav nav-stacked">
                                <li><a href="#">Post Liked <i class="fa fa-thumbs-up text-blue"></i> <span class="pull-right badge bg-aqua">{{ $user->likes->where('like', 1)->count() }}</span></a></li>
                                <li><a href="#">Events Going <i class="fa fa-map-signs text-green"></i> <span class="pull-right badge bg-green">{{ $user->interested->where('interested', 1)->count() }}</span></a></li>
                                <li><a href="#">Courses <i class="fa fa-book text-red"></i> <span class="pull-right badge bg-red">842</span></a></li>
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
                {!! $userList->links() !!}
            </div>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection