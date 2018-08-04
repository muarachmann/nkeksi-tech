@extends('layout.admin')
@section('page-title', 'Categories- Nkeksi Dashboard')
@section('breadcrumbs')
    <ol class="breadcrumb">
        <li><a href="/admin/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="/admin/posts"><i class="fa fa-bookmark"></i> Posts</a></li>
        <li><a href="/admin/categories"><i class="fa fa-th"></i> Categories</a></li>
        <li class="active"><i class="fa fa-th"></i> {{ $category->name }}</li>
    </ol>
@endsection

@section('add-btn-page')

@endsection
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-1">

            </div>
            <div class="col-md-10">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">{{ $category->name }}<small>-Category</small>
                                    @if($category->posts()->count() == 1)
                                        <span class="text-info">{{ $category->posts()->count()}} post</span>
                                    @else
                                        {{ $category->posts()->count()}} posts
                                    @endif
                                </h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <!-- form start -->
                                <form role="form" id="createCategory" action="{{ route('categories.update', $category->id) }}" method="POST" data-parsley-validate>
                                    {{ csrf_field() }}
                                    {{ method_field('PATCH') }}
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="category">Category Name</label>
                                            <input type="text" class="form-control" id="category" value="{{ $category->name }}" name="category" placeholder="Enter category name" required maxlength="200">
                                        </div>
                                    </div>
                                    <!-- /.box-body -->

                                    <div class="box-footer">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success btn-lg">Save Changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                </div>
            </div>
            <!-- /.col -->
            <div class="col-md-1">

            </div>
            <!-- /.col -->

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection


