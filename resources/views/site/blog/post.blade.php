@extends('site.layout.main')

@section('content')


<div class="container">
	<div class="row">

		{{-- @include('site.includes.breadcrumb') --}}

		<div id="column-left" class="col-sm-4 col-lg-3 hidden-xs">
			@include('site.includes.categoriesMenu')
			@include('site.includes.sideBanner')
			@include('site.includes.topProducts')
		</div>

		<div class="col-sm-8 col-lg-9 mtb_20">
			<div class="row">
				<div class="blog-item listing-effect col-md-12 mb_50">
					<div class="post-format">
						<div class="thumb post-img">
							<a href="{{ Storage::url($post->cover->path) }}" title="Beautiful Lady">
								<img src="{{ Storage::url($post->cover->path) }}" alt="themini">
							</a>
						</div>
						<div class="post-type"> <i class="fa fa-picture-o" aria-hidden="true"></i> </div>
					</div>
					<div class="post-info mtb_20 ">
						<h2 class="mb_10">
							<a href="single_blog.html">Fashions fade, style is eternal</a>
						</h2>
					</div>
					<div>
						{!! $post->content !!}
					</div>
					<div class="details mtb_20">
						<div class="date"><i class="fa fa-calendar" aria-hidden="true"></i>{{ date('d M Y', strtotime($post->created_at)) }}</div>
					</div>
					{{-- <div class="author-about mt_50">
						<h3 class="author-about-title">About the Author</h3>
						<div class="author mtb_30">
							<div class="author-avatar"> <img alt="" src="images/user1.jpg"></div>
							<div class="author-body">
								<h5 class="author-name"><a href="#">Radley Lobortis</a></h5>
								<div class="author-content mt_10">Vivamus imperdiet ex sed lobortis luctus. Aenean
									posuere nulla in turluctus. Aenean posuere nulla in tur pis porttitor laoreet.
									Quisque finibus aliquet purus. Ut et mi eu ante interdum .</div>
							</div>
						</div>
					</div> --}}
					<div id="comments" class="comments-area mt_50">
						<h3 class="comment-title">3 comments</h3>
						<ul class="comment-list mt_30">
							<li class="comment">
								<hr>
								<article class="comment-body mtb_20">
									<div class="comment-avatar"> <img alt="" src="images/user2.jpg"> </div>
									<div class="comment-main">
										<h5 class="author-name"> <a href="#" class="comment-name">Radley Lobortis</a>
											<small class="comment-date">8 months ago</small> </h5>
										<div class="comment-reply pull-right"> <a href="#"><i class="fa fa-reply"
													aria-hidden="true"></i> Reply</a> </div>
										<div class="comment-content mt_10">Sed lobortis rpi luctus. Aenean posuere nulla
											in turluctus. Aenean posuere nulla in turs porttitor larpis porttitor larpis
											porttitor lauctus. Aenean posuere nulla in turpis porttitor laoreet.</div>
									</div>
								</article>
								<hr>
								<ol class="children">
									<li class="comment">
										<article class="comment-body mtb_20">
											<div class="comment-avatar"> <img alt="" src="images/user3.jpg"> </div>
											<div class="comment-main">
												<h5 class="author-name"> <a href="#" class="comment-name">Lobortis
														Radley</a> <small class="comment-date">1 months ago</small>
												</h5>
												<div class="comment-reply pull-right"> <a href="#"><i
															class="fa fa-reply" aria-hidden="true"></i> Reply</a> </div>
												<div class="comment-content mt_10">Dcenas euismod faucibus dolor a
													finibus.Maecenas euismod faucibus dolor a finibus.Maecenas euismod
													faucibus dolor a finibus.Maecenas euismod faucibus.</div>
											</div>
										</article>
									</li>
								</ol>
							</li>
							<li class="comment">
								<hr>
								<article class="comment-body mtb_20">
									<div class="comment-avatar"> <img alt="" src="images/user1.jpg"> </div>
									<div class="comment-main">
										<h5 class="author-name"> <a href="#" class="comment-name">Sradle Vivamus </a>
											<small class="comment-date">8 days ago</small> </h5>
										<div class="comment-reply pull-right"> <a href="#"><i class="fa fa-reply"
													aria-hidden="true"></i> Reply</a> </div>
										<div class="comment-content mt_10">Vivamus imperdiet ex sed lobortis luctus.
											Aenean posuere nulla in turpis porttitor laoreet. Quisque finibus aliquet
											purus. Ut et mi eu ante interdum dignissim pellentesque a mi.</div>
									</div>
								</article>
							</li>
						</ul>
						<div class="leave-form">
							<h3 class="comment-title mt_50 mb_30" id="reply-title">Leave A Comment</h3>
							<!-- Comment Form -->
							<div class="form-style" id="contact_form">
								<div id="contact_results"></div>
								<div class="row">
									<form id="contact_body" method="post">
										<div class="col-sm-6">
											<input class="full-with-form" type="text" name="name" placeholder="Name"
												data-required="true">
										</div>
										<div class="col-sm-6">
											<input class="full-with-form" type="email" name="email"
												placeholder="Email Address" data-required="true">
										</div>
										<div class="col-sm-12 mt_30">
											<textarea class="full-with-form" name="message" placeholder="Message"
												data-required="true"></textarea>
										</div>
										<div class="col-sm-6">
											<button class="btn mt_30" type="submit">Leave Comment</button>
										</div>
									</form>
								</div>
							</div>
							<!-- End Comment Form -->
						</div>
					</div>

				</div>
			</div>
		</div>

	</div>
</div>

@include('site.includes.footer')
@endsection

@section('styles')
@endsection

@section('scripts')

@endsection