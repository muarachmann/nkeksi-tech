 @extends('layout.admin')
 @section('page-title')
     {{ $post->title }}
 @endsection
@section('breadcrumbs')
            <ol class="breadcrumb">
                <li><a href="/admin/dashboard/"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="/admin/posts"><i class="fa fa-tag"></i> Posts</a></li>
                <li class="active"><i class="fa fa-post"></i> {{$post->title}}</li>
            </ol>
@endsection

@section('add-btn-page')
   <a href="/admin/posts/create">
    <button type="button" class="btn bg-blue btn-flat margin"><i class="fa fa-bookmark"></i> Add new post</button>
    </a>
    <a href="#" class="pull-right" onclick="event.preventDefault();document.getElementById('destroy-tag').submit();">
        <button type="button" class="btn bg-maroon btn-flat margin"><i class="fa fa-trash"></i> Delete Post</button>
    </a>
    <form id="destroy-tag" action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: none;">
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
              <img class="img-responsive" src="{{ asset('img/blogPosts/'.$post->featured_file) }}" alt="User profile picture">
                <br>
              <h3 class="profile-username text-center">{{ $post->title }}</h3>

              <p class="text-muted text-center">{{ $post->category->name }}</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Likes <i class="fa fa-thumbs-o-up"></i></b> <a class="pull-right">{{ $post->likes->where('like', 1)->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Comment (s) <i class="fa fa-comments-o"></i></b> <a class="pull-right">{{ $post->comments()->count() }}</a>
                </li>
                <li class="list-group-item">
                  <b>Views</b> <a class="pull-right">13,287</a>
                </li>
              </ul>
              <a href="#" onclick="event.preventDefault();document.getElementById('editTab').click();" class="btn btn-primary btn-block"><b>Edit Post</b></a>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Post</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-user margin-r-5"></i> Author</strong>

              <p class="text-muted">
                  <a href="{{ route('team.show', $post->team->id) }}">{{ $post->team->fullname  }}</a>
              </p>

              <hr>

              <strong><i class="fa fa-th margin-r-5"></i> Category</strong>

              <p class="text-muted">{{ $post->category->name }}</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Tags</strong>

              <p>
                 @foreach ($post->tags as $tag)
                 <a href="{{ route('tags.show', $tag->id)}}" class="tag"><span class="label label-success">{{ $tag->name }}</a> </span>                   
                  @endforeach
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">{{ $post->title }}</a></li>
              <li><a href="#timeline" data-toggle="tab">Post Timeline</a></li>
              <li><a href="#settings" data-toggle="tab" id="editTab">Edit Post</a></li>
              <li><a href="#comments" data-toggle="tab">Comments</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <a href="{{ route('team.show', $post->team->id) }}"><img class="img-bordered-sm img-circle" src="{{ asset('img/team/'.$post->team->profile_pic) }}" alt="user image"></a>
                    <span class="username">
                          <a href="#">{{ $post->title }}</a>
                        </span>
                    <span class="description">{{ date('M j, Y  h:ia',(strtotime($post->created_at))) }}</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                   {!! $post->body !!}
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Likes({{ $post->likes->where('like', 1)->count() }})</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        ({{ $post->comments()->count() }})</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
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

              <div class="tab-pane" id="comments">
                  <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
          <h3>Comments -<small> {{ $post->comments()->count() }} Total</small></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body  no-padding">
              <table class="table table-hover">
                <tr>
                  <th>Profile pic</th>
                  <th>User</th>
                  <th>Date</th>
                  <th>Comment</th>
                  <th>Actions</th>
                </tr>
                @foreach($post->comments as $comment)
                <tr>
                  <td><img class="img-responsive" src="{{ asset('img/users/'.$comment->user->avatar) }}" width="50px" height="50px" style="border-radius:100%;"></td>
                  <td>{{ date('F nS, Y - g:i',(strtotime($comment->created_at))) }}</td>
                  <td>{{ $comment->name }}</td>
                  <td>
                    {!! substr($comment->comment, 0,20) !!}
                    {!! strlen($comment->comment) > 20 ? "<a href='#' class='text-info'> view more</a>..." : "" !!}
                  </td>
                  <td>
                     <a href="{{ route('comments.edit', $comment->id) }}">
                   <button type="button" class="btn bg-blue btn-sm btn-flat margin">View/Edit</button>
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

              <div class="tab-pane" id="settings">
               <form id="createPost" action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data" data-parsley-validate>
                   {{ csrf_field() }}
                   {{ method_field('PATCH') }}
                <div class="form-group">
                  <label for="title">Title</label>
                  <input type="text" class="form-control" id="title" value="{{ $post->title }}" name="title" placeholder="Enter post title" required maxlength="255">
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
                        <option value="{{ $category->id }}" @if($post->category_id == $category->id) selected  @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                <label>Tag</label>
                <select class="form-control select2" name="tags[]" multiple="multiple" data-placeholder="Select tag(s)" style="width: 100%;">

                    @foreach ($tags as $tag)
                        <option @if ($post->tags->contains($tag->id)) selected="selected" @endif  value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
              </div>

                   <div class="form-group">
                       <label for="myFile">Profile picture</label>
                       <input class="form-control" name="myFile" id="myFile" placeholder="" type="file" required>
                   </div>

                <p style="font-weight:bolder;">Enter post body</p>
                    <textarea id="editor1" name="editor1" rows="10" cols="80">
                        {{ $post->body }}
                    </textarea>
                   <br>
                   <br>
                   <div class="pull-right">
                       <button type="submit" class="btn btn-info">Update Post</button>
                   </div>
              </form>
                  <p class="clearfix"></p>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
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
 
 
