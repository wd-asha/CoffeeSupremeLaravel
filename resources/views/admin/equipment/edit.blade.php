@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">Edit equipment (ID {{ $equipment->id }})</h6>

        <form action="{{ route('admin.equipment.update', $equipment->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Name: </label>
                            <input class="form-control" type="text" name="equipment_title" placeholder="Input name" value="{{ $equipment->equipment_title }}"><br>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Code: </label>
                            <input class="form-control" type="text" name="equipment_code" placeholder="Input code" value="{{ $equipment->equipment_code }}"><br>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Firm: </label>
                            <select class="form-control" data-placeholder="Select firm" name="firma_id">
                                <option label="Select firm"></option>
                                @foreach($firmas as $firma)
                                    <option value="{{ $firma->id }}"
                                            @php if($firma->id === $equipment->firma_id) { echo "selected"; } @endphp>
                                        {{ $firma->title }}</option>
                                @endforeach
                            </select><br>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                            <select class="form-control" data-placeholder="Select category" name="category_id">
                                <option label="Select category"></option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @php if($category->id == $equipment->category_id) { echo "selected"; } @endphp>
                                        {{ $category->title }}</option>
                                @endforeach
                            </select><br>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">SubCategory: <span class="tx-danger">*</span></label>
                            <select class="form-control" data-placeholder="Select subcategory" name="subcategory_id">
                                <option label="Select subcategory"></option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}"
                                            @php if($subcategory->id == $equipment->subcategory_id) { echo "selected"; } @endphp>
                                        {{ $subcategory->title }}</option>
                                @endforeach
                            </select><br>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Price: </label>
                            <input class="form-control" type="text" name="equipment_price" placeholder="Input Price" value="{{ $equipment->equipment_price }}"><br>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Desc: </label>
                            <input class="form-control" type="text" name="equipment_desc" placeholder="Input desc" value="{{ $equipment->equipment_desc }}"><br>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Details: </label>
                            <textarea class="form-control" id="summernote" name="equipment_about">
                                {{ $equipment->equipment_about }}
                            </textarea><br>
                        </div>
                    </div><!-- col-4 -->

                {{--<div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Image 1 (main): <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input class="custom-file-input" type="file" id="file" name="image_one" data-placeholder="Select image" onchange="readURL1(this);" required><br><br>
                            <span class="custom-file-control"></span>
                            <img src="/{{ $product->image_one }}" id="one" style="height: 80px; width: 80px;">
                        </label>
                    </div>
                </div>--}}<!-- col-4 -->

                {{--<div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Image 2: <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input class="custom-file-input" type="file" id="file" name="image_two" data-placeholder="Select image" onchange="readURL2(this);" required><br><br>
                            <span class="custom-file-control"></span>
                            <img src="/{{ $product->image_two }}" id="two" style="height: 80px; width: 80px;">
                        </label>
                    </div>
                </div>--}}<!-- col-4 -->

                {{--<div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Image 3: <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input class="custom-file-input" type="file" id="file" name="image_three" data-placeholder="Select image" onchange="readURL3(this);" required><br><br>
                            <span class="custom-file-control"></span>
                            <img src="/{{ $product->image_three }}" id="three" style="height: 80px; width: 80px;">
                        </label>
                    </div>
                </div>--}}<!-- col-4 -->

                {{--<div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Image 4: <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input class="custom-file-input" type="file" id="file" name="image_four" data-placeholder="Select image" onchange="readURL4(this);" required><br><br>
                            <span class="custom-file-control"></span>
                            <img src="/{{ $product->image_four }}" id="four" style="height: 80px; width: 80px;">
                        </label>
                    </div>
                </div>--}}<!-- col-4 -->

                </div><!-- row -->

                <hr>

                <div class="row">
                    <div class="col-lg-3">
                        <label class="ckbox">
                            <input type="checkbox" name="equipment_home" value="false"
                                    @php if($equipment->equipment_home === 1) {echo "checked";} @endphp>
                            <span>On Main</span>
                        </label>
                    </div><!-- col-4 -->
                    <div class="col-lg-3">
                        <label class="ckbox">
                            <input type="checkbox" name="equipment_status" value="false"
                                    @php if($equipment->equipment_status === 1) {echo "checked";} @endphp>
                            <span>Active</span>
                        </label>
                    </div><!-- col-4 -->

                </div>

                <hr>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info mg-r-5">Update</button>
                    <a href="{{ route('admin.equipments') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>


        <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
            <h6 class="card-body-title">Change equipment image</h6><br>

            <form action="{{ route('admin.equipment.updatePhoto', $equipment->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Image: <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input class="custom-file-input" type="file" id="file" name="image_one" data-placeholder="Select Image" onchange="readURL1(this);"><br><br>
                                <span class="custom-file-control"></span>
                                <input type="hidden" name="old_image_one" value="{{ $equipment->equipment_image }}">
                            </label>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <img src="/{{ $equipment->equipment_image }}" style="width: 80px; height: 80px;"> &rarr;
                        <img src="{{ asset('media/product/empty-image.png') }}" id="one" style="width: 80px; height: 80px;">
                    </div>
                </div>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info mg-r-5">Update</button>
                    <a href="{{ route('admin.equipments') }}" class="btn btn-secondary">Cancel</a>
                </div>

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
    <script type="text/javascript">
        function readURL2(input){
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#two')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script type="text/javascript">
        function readURL3(input){
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#three')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script type="text/javascript">
        function readURL4(input){
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#four')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection
