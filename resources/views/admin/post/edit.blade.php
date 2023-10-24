@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">Edit post (ID {{ $post->id }})</h6>

        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="post_title" placeholder="Input name" value="{{ $post->post_title }}"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Rubric: <span class="tx-danger">*</span></label>
                            <select class="form-control" data-placeholder="Select rubric" name="rubric_id">
                                <option label="Select rubric"></option>
                                @foreach($rubrics as $rubric)
                                    <option value="{{ $rubric->id }}"
                                        @php if($rubric->id === $post->rubric_id) { echo "selected"; } @endphp>
                                        {{ $rubric->rubric_title }}</option>
                                @endforeach
                            </select><br>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Content: <span class="tx-danger">*</span></label>
                            <textarea class="form-control" id="summernote" name="post_content">
                                {{ $post->post_content }}
                            </textarea><br>
                        </div>
                    </div>

                </div>

                <hr>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info mg-r-5">Update</button>
                    <a href="{{ route('admin.posts') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>

        <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
            <h6 class="card-body-title">Change post images</h6><br>

            <form action="{{ route('admin.post.updatePhoto', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Image: <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input class="custom-file-input" type="file" id="file" name="image_one" data-placeholder="Select Image" onchange="readURL1(this);"><br><br>
                                <span class="custom-file-control"></span>
                                <input type="hidden" name="old_image_one" value="{{ $post->post_image }}">
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img src="/{{ $post->post_image }}" style="width: 80px; height: 80px;" alt=""> &rarr;
                        <img src="{{ asset('media/post/empty-image.png') }}" id="one" style="width: 80px; height: 80px;" alt="">
                    </div>
                </div>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info mg-r-5">Update</button>
                    <a href="{{ route('admin.posts') }}" class="btn btn-secondary">Cancel</a>
                </div><!-- form-layout-footer -->

            </form>
        </div>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

    <script>
        $(document).on("click", "[type='checkbox']", function(e) {
            if (this.checked) {
                $(this).attr("value", "true");
            } else {
                $(this).attr("value","false");}
        });
    </script>

    <script type="text/javascript">
        function readURL1(input){
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#one')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
