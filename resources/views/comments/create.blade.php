         <section id="leave-reply">
                        <header><h2>Leave a Reply</h2></header>
                          @if( auth()->check() )
                         <form class="reply-form" action="{{ route('usercomments.store', $post->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="name">Your Name</label>
                                            <input type="hidden" name="user" value="{{ auth()->user()->id }}">
                                            <input type="text" id="name" value="{{ auth()->user()->name }}" name="name" required="required">
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.col-md-4 -->
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="email">Your Email</label>
                                            <input type="email"id="email" value="{{ auth()->user()->email }}" name="email" required="required">
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.col-md-4 -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <div class="controls">
                                            <label for="comment">Your Message</label>
                                            <textarea name="comment" id="comment" required="required"></textarea>
                                        </div><!-- /.controls -->
                                    </div><!-- /.control-group -->
                                </div><!-- /.col-md-4 -->
                            </div>
                            <!-- /.row -->
                            <div class="form-actions pull-right">
                                <input type="submit" class="btn btn-color-primary" value="Reply">
                            </div><!-- /.form-actions -->
                        </form><!-- /.reply-form -->
                    @else
                       <p>Please <a href="/login" class="text-info">sign in</a> to leave a comment</p>
                       @endif
                    </section>
