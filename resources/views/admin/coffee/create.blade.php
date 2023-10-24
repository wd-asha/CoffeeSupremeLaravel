@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">New coffee</h6>

        <form action="{{ route('admin.coffee.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="form-layout">
            <div class="row mg-b-25">

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="coffee_title" placeholder="Input name"><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Code: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="coffee_code" placeholder="Input code"><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Aroma: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="coffee_aroma" placeholder="Input aroma"><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Finish: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="coffee_finish" placeholder="Input finish"><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                        <select class="form-control" data-placeholder="Select brand" name="brand_id">
                            <option label="Select brand"></option>
                            @foreach($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->title }}</option>
                            @endforeach
                        </select><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Weight: <span class="tx-danger">*</span></label>
                        <select class="form-control" data-placeholder="Select weight" name="weight_id">
                            <option label="Select weight"></option>
                            @foreach($weights as $weight)
                                <option value="{{ $weight->id }}">{{ $weight->title }}</option>
                            @endforeach
                        </select><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                        <select class="form-control" name="category_id">
                            <option label="Select category"></option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->title }}</option>
                            @endforeach
                        </select><br>
                    </div>
                </div><!-- col-4 -->

                <div class="col-lg-3">
                    <div class="form-group mg-b-10-force">
                        <label class="form-control-label">Grind: <span class="tx-danger">*</span></label>
                        <select class="form-control" name="grind_id">
                            <option label="Select grind"></option>
                            @foreach($grinds as $grind)
                                <option value="{{ $grind->id }}">{{ $grind->title }}</option>
                            @endforeach
                        </select><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="coffee_price" placeholder="Input Price"><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Taste: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="coffee_taste" placeholder="Input taste"><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Acidity: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="coffee_acidity" placeholder="Input acidity"><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Body: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="coffee_body" placeholder="Input body"><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Dize: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="coffee_dize" placeholder="Input dize"><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Time: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="coffee_time" placeholder="Input time"><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Yield: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="coffee_yield" placeholder="Input yield"><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Temp: <span class="tx-danger">*</span></label>
                        <input class="form-control" type="text" name="coffee_temp" placeholder="Input temp"><br>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group">
                        <label class="form-control-label">Details: <span class="tx-danger">*</span></label>
                        <textarea class="form-control" id="summernote" name="coffee_about"></textarea><br>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="form-group">
                        <label class="form-control-label">Image: <span class="tx-danger">*</span></label><br>
                        <label class="custom-file">
                            <input class="custom-file-input" type="file" id="file" name="coffee_image" data-placeholder="Select image" onchange="readURL1(this);" required><br><br>
                            <span class="custom-file-control"></span>
                            <img src="{{ asset('media/product/empty-image.png') }}" id="one">
                        </label>
                    </div>
                </div>

            </div><!-- row -->

            <hr>

            <div class="row">
                <div class="col-lg-3">
                    <label class="ckbox">
                        <input type="checkbox" name="coffee_home" value="false">
                        <span>On Main</span>
                    </label>
                </div>
                <!-- col-4 -->

                <div class="col-lg-3">
                    <label class="ckbox">
                        <input type="checkbox" name="coffee_status" value="false">
                        <span>Active</span>
                    </label>
                </div>
                <!-- col-4 -->

            </div>

            <hr>

            <div class="form-layout-footer">
                <button type="submit" class="btn btn-info mg-r-5">Create</button>
                <a href="{{ route('admin.coffees') }}" class="btn btn-secondary">Cancel</a>
            </div><!-- form-layout-footer -->
        </div>
        </form>

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
