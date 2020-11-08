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
			<div class="three-col-blog text-left">
				@foreach ($posts as $post)
				<div class="blog-item col-md-6 mb_30">
					<div class="post-format">
						<div class="thumb post-img" style="height: 250px;">
							<a href="{{ route('post.show', [$post->id, $post->slug]) }}">
								<img src="{{ Storage::url($post->cover->path ?? null) }}" alt="themini" style="width:100%; height: 100%; object-fit:cover">
							</a>
						</div>
						{{-- <div class="post-type"><i class="fa fa-music" aria-hidden="true"></i></div> --}}
					</div>
					<div class="post-info mtb_20 ">
						<h3 class="mb_10">
							<a href="{{ route('post.show', [$post->id, $post->slug]) }}">{{ $post->title }}</a>
						</h3>
						<p>{{ strlen(strip_tags($post->content)) > 100 ? substr(strip_tags($post->content), 0, 100) . ' ...' : strip_tags($post->content) }}</p>
						<div class="details mtb_20">
							<div class="date pull-left">
								<i class="fa fa-calendar" aria-hidden="true"></i>{{ date('d M Y', strtotime($post->created_at)) }}
							</div>
							<div class="more pull-right">
								<a href="{{ route('post.show', [$post->id, $post->slug]) }}">Read more <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<div class="pagination-nav text-center mtb_20">
			{{ $posts->links('vendor.pagination.custom') }}
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