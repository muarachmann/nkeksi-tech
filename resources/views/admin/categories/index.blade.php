 @extends('layout.admin')
@section('page-title', 'Categories- Nkeksi Dashboard')
@section('breadcrumbs')
            <ol class="breadcrumb">
                <li><a href="/admin/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="/admin/posts"><i class="fa fa-bookmark"></i> Posts</a></li>
                <li class="active"><i class="fa fa-th"></i> Categories</li>
            </ol>
@endsection

@section('add-btn-page')
   <a href="/admin/posts/create">
    <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-bookmark"></i> Add new post</button>
    </a>
@endsection
@section('content')
 <!-- Main content -->
    <section class="content">
     <div class="row">
          <div class="col-md-9">
          <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">View all Categories</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                    <tr>
                  <th>ID</th>
                  <th>Category Name</th>
                   <th>View Category</th>
                    </tr>
                 @foreach ($categories as $category )
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td><small class="label bg-black-active">{{ $category->name }}</small></td>
                        <td><a href="{{ route('categories.show',$category->id) }}"><button class="btn btn-flat btn-info"><span class="fa fa-eye    "></span> view category</button></a></td>
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
        <div class="col-md-3">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                    <h3 class="box-title">Quick Add Category</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" id="createTag" action="{{ url('admin/categories ') }}" method="POST" data-parsley-validate>
                    {{ csrf_field() }}
                        <div class="box-body">
                        <div class="form-group">
                        <label for="category">Category Name</label>
                        <input type="text" class="form-control" id="category" name="category" placeholder="Enter category name" required maxlength="30">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary btn-block">Add Category</button>
                    </div>
                    </form>
                </div>        
                </div>
        </div>
        <!-- /.col -->
       
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  @endsection
 
 
