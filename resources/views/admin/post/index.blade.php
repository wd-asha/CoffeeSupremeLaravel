@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Journal</h6>
        <p class="mg-b-10 mg-sm-b-10">Total posts: {{ $posts->total() }}<span style="float: right">
            <a href="{{ route('admin.post.create') }}" class="btn btn-info">New post</a>
        </span></p>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th class="wd-5p">ID</th>
                    <th class="wd-5p">Image</th>
                    <th class="wd-15p">Name</th>
                    <th class="wd-5p">Rubric</th>
                    <th class="wd-20p">Content</th>
                    <th class="wd-5p">Date</th>
                    <th class="wd-20p">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><img src="/{{ $post->post_image }}" style="height:100px;" alt=""></td>
                        <td><a href="{{ route('front.post', $post->id) }}" target="_blank">{{ $post->post_title }}</a></td>
                        <td>{{ $post->rubric->rubric_title }}</td>
                        <td>{!! substr($post->post_content, 0, 100) . " ..." !!}</td>
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <div class="flex" style="display: flex; justify-content: flex-start; align-items: flex-start">
                            <a href="{{ route('front.post', $post->id) }}" class="btn btn-outline-info" style="display: inline-block; margin-right: 10px;"><i class="fa fa-eye" style="font-size: 1.2rem;padding: 0"></i>
                            </a>
                            <a href="{{ route('admin.post.edit', $post->id) }}" class="btn btn-outline-warning" style="display: inline-block; margin-bottom: 10px; margin-right: 10px"><i class="fa fa-edit" style="font-size: 1.2rem;"></i></a>
                            <a href="{{ route('admin.post.delete', $post->id) }}" id="delete" class="btn btn-outline-danger" style="display: inline-block; margin-right: 10px;"><i class="fa fa-trash" style="font-size: 1.2rem;"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if($posts->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $posts->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>

        <div style="padding: 20px;"></div>
        {{--Trashed Posts--}}
        <h6 class="card-body-title">Trash</h6>
        <p class="mg-b-10 mg-sm-b-10">Trashed posts: {{ $trashPosts->total() }}</p>
        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th class="wd-5p">ID</th>
                    <th class="wd-5p">Image</th>
                    <th class="wd-15p">Name</th>
                    <th class="wd-5p">Rubric</th>
                    <th class="wd-20p">Content</th>
                    <th class="wd-5p">Date</th>
                    <th class="wd-10p">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trashPosts as $trashPost)
                    <tr>
                        <td>{{ $trashPost->id }}</td>
                        <td><img src="/{{ $trashPost->post_image }}" style="height:100px;" alt=""></td>
                        <td>{{ $trashPost->post_title }}</td>
                        <td>{{ $trashPost->rubric->rubric_title }}</td>
                        <td>{!! substr($trashPost->post_content, 0, 100) . " ..." !!}</td>
                        <td>{{ $trashPost->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.post.restore', $trashPost->id) }}" class="btn btn-outline-success">Restore</a>
                            <a href="{{--{{ route('destroy.coffee', $trash->id) }}--}}" id="delete" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                @if($trashPosts->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $trashPosts->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </div>

@endsection
