@extends('layouts.ourpurpose')
@section('title', 'Coffee Supreme - Journal')
@section('content')

    <div class="wrapper">

        <div class="breadcrumbs">
            <h6>
                <a href="{{ route('front') }}">Home</a>
                <i class="fas fa-caret-right"></i>
                <span>Journal</span>
            </h6>
        </div>

        <h2>Journal</h2>

        <div class="news">
            <div class="categories">
                <h5>Categories</h5>
                <a href="{{ route('front.journal') }}" class="category
@php if((int)$id === 0) echo 'category-active'; @endphp">
                    All categories
                </a>
                @foreach($rubrics as $rubric)
                    <a href="{{ route('filter', $rubric->id) }}" class="category
@php if((int)$id === $rubric->id) echo 'category-active'; @endphp">
                        {{ $rubric->rubric_title }}
                    </a>
                @endforeach
            </div>

            <div class="posts">
                <div class="latest">
                    <h3>Latest Journal Posts</h3>
                    <p>Here’s a taste of the freshest posts from our Journal</p>

                    {{-- Search filter --}}
                    <form action="{{route('front.journal')}}" method="get" class="mr-4">
                        @csrf
                        <input type="text" name="search_field" class="mb-4 mr-2" placeholder="What will look for..." style="width: 10rem;">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                    {{-- end search filter --}}

                </div>

                @foreach($posts as $post)
                    <div class="post" data-rubric="{{ $post->rubric_id }}">
                        <div class="post-img">
                            <img src="../../../../{{ $post->post_image }}" alt="">
                        </div>
                        <div class="post-content">
                            <a href="{{ route('front.post', $post->id) }}">
                                <h4 class="post-title">{{ $post->post_title }}</h4>
                            </a>
                            <div class="post-text_header">
                                <div class="post-text_header_left">{{ $post->created_at }}</div>
                                <div class="post-text_header_right">{{ $post->rubric->rubric_title }}</div>
                            </div>
                            <div class="post-text">
                                @php $txt = mb_substr($post->post_content, 0, 450) @endphp
                                <div>{!! $txt !!}...</div>
                                <a href="{{ route('front.post', $post->id) }}">Read more</a>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div>
                    {{ $posts->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>

        </div>

    </div>

@endsection
