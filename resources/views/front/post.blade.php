@extends('layouts.post')
@section('title', 'Coffee Supreme - Post')
@section('content')

    <div class="wrapper">

        <div class="breadcrumbs">
            <h6>
                <a href="{{ route('front') }}">Home</a>
                <i class="fas fa-caret-right"></i>
                <a href="{{ route('front.journal') }}">Journal</a>
                <i class="fas fa-caret-right"></i>
                <span>Post</span>

            </h6>
        </div>

        <h2>Post</h2>

        <div class="post">
            <div class="post-title">
                <h4>{{ $post->post_title }}</h4>
                <div class="post-text_header">
                    <div class="post-text_header_left">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</div>
                    <div class="post-text_header_right">{{ $post->rubric->rubric_title }}</div>
                </div>
                <div class="post-img">
                    <img src="../../../../{{ $post->post_image }}" alt="">
                </div>
            </div>
            <div class="post-text1">
                {!! $post->post_content !!}
            </div>
        </div>

    </div>

@endsection
