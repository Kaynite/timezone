<div class="row">
    <div class="col-sm-12 mtb_10">
        <div id="Blog" class="mt_50">
            <div class="heading-part mb_10 ">
                <h2 class="main_title">Latest News</h2>
            </div>

            <div class="blog-contain box">
                <div class="blog owl-carousel ">
                    @foreach ($posts as $post)
                    <div class="item">
                        <div class="box-holder">
                            <div class="thumb post-img">
                                <a href="{{ route('post.show', [$post->id, $post->slug]) }}" style="display:block; width: 100%; height: 300px;">
                                    <img src="{{ Storage::url($post->cover->path ?? '') }}" alt="Post Cover" style="height: 100%; object-fit:cover">
                                </a>
                                <div class="date-time text-center">
                                    <div class="day">{{ date('d', strtotime($post->created_at)) }}</div>
                                    <div class="month">{{ date('M', strtotime($post->created_at)) }}</div>
                                </div>
                                <div class="post-image-hover"></div>

                                <div class="post-info" style="display:block; width: 100%">
                                    <h6 class="mb_10 text-uppercase">
                                        <a href="{{ route('post.show', [$post->id, $post->slug]) }}">{{ $post->title }}</a>
                                    </h6>

                                    <p>{{ strlen(strip_tags($post->content)) > 100 ? substr(strip_tags($post->content), 0, 100) . ' ...' : strip_tags($post->content) }}</p>

                                    <div class="view-blog">
                                        <div class="write-comment pull-left">
                                            <a href="{{ route('post.show', [$post->id, $post->slug]) }}">0 Comments</a>
                                        </div>
                                        <div class="read-more pull-right"> <a href="{{ route('post.show', [$post->id, $post->slug]) }}">
                                            <i class="fa fa-link"></i> Read More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
