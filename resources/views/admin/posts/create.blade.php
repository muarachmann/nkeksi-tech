@extends('layout.admin')
@section('page-title', 'Posts - Add post')
@section('breadcrumbs')
            <ol class="breadcrumb">
                <li><a href="/admin/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="/admin/posts"><i class="fa fa-tag"></i> Posts</a></li>
                <li class="active"><i class="fa fa-post"></i> Add new Post</li>
            </ol>
@endsection

@section('add-btn-page')
 <a href="/admin/tags">
    <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-tag"></i> Add Tag</button>
    </a>
   <a href="/admin/categories">
    <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-bookmark"></i> Add Category</button>
    </a>
@endsection
@section('content')
 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">
              <h3 class="box-title">Add a new blog 
                <small>Advanced and full of features</small>
              </h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-warning btn-xs" data-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                  <i class="fa fa-minus"></i></button>
                <button type="button" class="btn btn-danger btn-xs" data-widget="remove" data-toggle="tooltip"
                        title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <form id="createPost" action="{{ url('admin/posts ') }}" enctype="multipart/form-data" method="POST" data-parsley-validate>
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title" required maxlength="255">
                </div>

                  <div class="form-group">
                      <label>Author</label>
                      <select class="form-control select2" name="author" data-placeholder="Select author" style="width: 100%;" >
                          @foreach ($team as $member)
                              <option value="{{ $member->id }}">{{ $member->fullname }}</option>
                          @endforeach
                      </select>
                  </div>

              <div class="form-group">
                <label>Category</label>
                <select class="form-control select2" name="category" data-placeholder="Select category" style="width: 100%;" >
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Tag</label>
                <select class="form-control select2" name="tags[]" multiple="multiple" data-placeholder="Select tag(s)"
                        style="width: 100%;">
                  @foreach ($tags as $tag)
                     <option value="{{ $tag->id }}">{{ $tag->name }}</option> 
                  @endforeach
                </select>
              </div>

                <div class="form-group">
                  <label for="featured_file">Upload Featured image, video or audio</label>
                  <input type="file" id="featured_file" name="featured_file">
                </div>
                
                   <div class="form-group">
                  <label for="featured_file">Additional files</label>
                  <input type="file" id="additional_file" name="additional_file">
                </div>
                <p style="font-weight:bolder;">Enter post body</p>
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                        Enter your blog post here
                    </textarea>
                    <br>
                    <br>
                    <div class="pull-right">
                      <button type="submit" class="btn btn-info">Create Post</button>
                    </div>
              </form>
            </div>
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  @endsection