<?php
/**
 * Created by PhpStorm.
 * User: rachmann mua
 * Date: 6/9/18
 * Time: 9:41 AM
 */
?>

@extends('layout.admin')
@section('page-title', 'Documents')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="dashboard"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{ route('docs.index') }}"><i class="fa fa-file-pdf-o"></i> Documents</a></li>
        <li class="active"><i class="fa fa-file-pdf-o"></i> Upload Documents</li>
    </ol>
@endsection

@section('add-btn-page')
    <a href="{{ route('posts.create') }}">
        <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-plus-circle"></i> Add Post</button>
    </a>
    <a href="{{ route('courses.create') }}">
        <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-book"></i> Add Course</button>
    </a>
@endsection
@section('content')
    <!-- Main content -->
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">View Documents</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                    <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">

            <div id="image_preview"></div>

            <form class="form-inline" id="galleryForm" method="POST" action="{{ route('docs.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="text-center">
                <p class="clearfix"></p>
                <p class="clearfix"></p>
                <p class="clearfix"></p>
            <div class="file-upload">
                <label for="docs" class="file-upload__label">Select Documents</label>
                <input id="docs" class="file-upload__input" type="file" name="docs[]" multiple="multiple">
            </div>
            </div>

            <br>
            <br>
            <div class="text-center">
                <button id="uploadDocs" type="submit" class="btn btn-large btn-info">Upload Documents</button>
            </div>
            </form>



        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="text-center">
                {{--{!! $posts->links() !!}--}}
            </div>
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
@endsection


