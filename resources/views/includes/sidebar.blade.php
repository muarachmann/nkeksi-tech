
                <div id="page-sidebar" class="sidebar">
                    <aside class="news-small" id="news-small">
                        <header>
                            <h2>Latest News</h2>
                        </header>
                        <div class="section-content">

                               @foreach($recentposts as $post)
                            <article>
                                <figure class="date"><i class="fa fa-calendar-o"></i>{{ date('d-m-Y',(strtotime($post->created_at))) }}</figure>
                                <header><a href="{{ route('blog.show',$post->id) }}">{{ $post->title }}</a></header>
                            </article><!-- /article -->
                                 @endforeach
                        </div><!-- /.section-content -->
                        <a href="/blog" class="read-more">All News</a>
                    </aside><!-- /.news-small -->
                    <aside id="our-professors">
                        <header>
                            <h2>Our Team</h2>
                        </header>
                        <div class="section-content">
                            <div class="professors">
                                @foreach($team as $member)
                                <article class="professor-thumbnail">
                                    <figure class="professor-image"><a href="/team/{{ $member->id }}"><img class="img-responsive img-circle" width="60" height="40" src="{{ asset('img/team/'.$member->profile_pic) }}" alt=""></a></figure>
                                    <aside>
                                        <header>
                                            <a href="/team/{{ $member->id }}">{{ $member->fullname }}</a>
                                            <div class="divider"></div>
                                            <figure class="professor-description">{{ $member->profession }}</figure>
                                        </header>
                                        <a href="/team/{{ $member->id }}" class="show-profile">Show Profile</a>
                                    </aside>
                                </article><!-- /.professor-thumbnail -->
                                @endforeach
                                <a href="/team" class="read-more">View Team</a>
                            </div><!-- /.professors -->
                        </div><!-- /.section-content -->
                    </aside><!-- /.our-professors -->
                     <aside id="archive">
                        <header>
                            <h2>Archive</h2>
                            <ul class="list-links">
                                <li><a href="#">February 2014</a></li>
                                <li><a href="#">January 2014</a></li>
                                <li><a href="#">November 2013</a></li>
                                <li><a href="#">October 2013</a></li>
                                <li><a href="#">August 2013</a></li>
                                <li><a href="#">July 2013</a></li>
                                <li><a href="#">June 2013</a></li>
                                <li><a href="#">May 2013</a></li>
                            </ul>
                        </header>
                    </aside><!-- /archive -->

                </div>
                
                <!-- /#sidebar -->
