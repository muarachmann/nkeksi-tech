       <section id="discussion">
                        <header><h2>Discussion ({{ $post->comments()->count() }}) </h2></header>
                        <ul class="discussion-list">
                            @foreach($post->comments as $comment)
                                  <li class="author-block">
                                <figure class="author-picture"><img src="{{  asset('img/users/'.$comment->user->avatar) }}"></figure>
                                <article class="paragraph-wrapper">
                                    <div class="inner">
                                        <header><h5>{{ $comment->name }}</h5></header>
                                        <p>
                                            {{ $comment->comment }}
                                        </p>
                                    </div>
                                    <div class="comment-controls">
                                        <span>{{ date('F nS, Y - G:i A',(strtotime($comment->created_at))) }}</span>
                                        <a href="#">Reply</a>
                                    </div>
                                </article>
                            </li>
                            <!-- /parent item --> 
                            @endforeach
                        </ul><!-- /.discussion-list -->
                    </section><!-- /.discussion -->

                    
