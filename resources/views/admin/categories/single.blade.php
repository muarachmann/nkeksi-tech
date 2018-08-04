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
    <a href="{{ route('categories.index') }}" onclick="event.preventDefault();document.getElementById('destroy-category').submit();">
        <button type="button" class="btn bg-maroon btn-flat margin"><i class="fa fa-trash-o"></i> Delete Category</button>
    </a>
    <form id="destroy-category" action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display: none;">
        {{ csrf_field() }}
        {{ method_field('DELETE') }}
    </form>
    <a href="{{ route('categories.edit', $category->id) }}">
        <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-"></i> Edit Category</button>
    </a>
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
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <th>ID(#)</th>
                                        <th>Post Title</th>
                                        <th>Category</th>
                                        <th>Action</th>
                                    </tr>

                                    @foreach ($category->posts as $post )
                                        <tr>
                                            <td>{{ $post->id }}</td>
                                            <td><a href="{{ route('posts.show', $post->id)}}">{{ $post->title }}</a></td>
                                            <td>
                                                    <a href="{{ route('categories.show', $category->id)}}"><small class="label bg-maroon-active">{{ $category->name }}</small></a>
                                            </td>
                                            <td><a href="{{ route('posts.show', $post->id)}}"><button class="btn btn-sm btn-success">View post</button></a></td>
                                        </tr>
                                    @endforeach

                                    </tbody></table>
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


