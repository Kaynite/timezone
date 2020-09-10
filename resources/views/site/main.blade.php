@extends('site.layout.main')

@section('content')
@include('site.includes.banner')

<div class="container">
    @include('site.includes.services')
    @include('site.includes.products')
    @include('site.includes.ad')
    @include('site.includes.blog')
    @include('site.includes.brands')
</div>

@include('site.includes.footer')
@endsection

@section('styles')
    
@endsection

@section('scripts')
    
@endsection