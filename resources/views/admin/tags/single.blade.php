 @extends('layout.admin')
@section('page-title', 'Tags- Nkeksi Dashboard')
@section('breadcrumbs')
            <ol class="breadcrumb">
                <li><a href="/admin/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="/admin/posts"><i class="fa fa-bookmark"></i> Posts</a></li>
                <li><a href="/admin/tags"><i class="fa fa-tags"></i> Tags</a></li>
                <li class="active"><i class="fa fa-tag"></i> {{ $tag->name }}</li>
            </ol>
@endsection

@section('add-btn-page')
    <a href="#" class="pull-right" onclick="event.preventDefault();document.getElementById('destroy-tag').submit();">
    <button type="button" class="btn bg-maroon btn-flat margin"><i class="fa fa-tag"></i> Delete Tag</button>
    </a>
     <form id="destroy-tag" action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
      </form>
   <a href="{{ route('tags.edit', $tag->id) }}">
    <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-tag"></i> Edit Tag</button>
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
              <h3 class="box-title">{{ $tag->name }}<small>-Tag</small>
                 @if($tag->posts()->count() == 1)
                 <span class="text-info">{{ $tag->posts()->count()}} post</span>
                 @else
                 {{ $tag->posts()->count()}} posts
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
                  <th>Tags</th>
                  <th>Action</th>
                    </tr>

                      @foreach ($tag->posts as $post )
                    <tr>
                        <td>{{ $post->id }}</td>
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
 
 
