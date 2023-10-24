@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">New equipment</h6>

        <form action="{{ route('admin.equipment.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="equipment_title" placeholder="Input name"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Code: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="equipment_code" placeholder="Input code"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Firma: <span class="tx-danger">*</span></label>
                            <select class="form-control" data-placeholder="Select brand" name="firma_id">
                                <option label="Select firma"></option>
                                @foreach($firmas as $firma)
                                    <option value="{{ $firma->id }}">{{ $firma->title }}</option>
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
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">SubCategory: <span class="tx-danger">*</span></label>
                            <select class="form-control" name="subcategory_id">
                                <option label="Select subcategory"></option>
                                @foreach($subcategories as $subcategory)
                                    <option value="{{ $subcategory->id }}">{{ $subcategory->title }}</option>
                                @endforeach
                            </select><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Price: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="equipment_price" placeholder="Input Price"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Desc: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="equipment_desc" placeholder="Input Desc"><br>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="form-group">
                            <label class="form-control-label">Details: <span class="tx-danger">*</span></label>
                            <textarea class="form-control" id="summernote" name="equipment_about"></textarea><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Image: <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input class="custom-file-input" type="file" id="file" name="equipment_image" data-placeholder="Select image" onchange="readURL1(this);" required><br><br>
                                <span class="custom-file-control"></span>
                                <img src="{{ asset('media/product/empty-image.png') }}" id="one">
                            </label>
                        </div>
                    </div>

                </div>

                <hr>

                <div class="row">
                    <div class="col-lg-3">
                        <label class="ckbox">
                            <input type="checkbox" name="equipment_home" value="false">
                            <span>On Main</span>
                        </label>
                    </div>

                    <div class="col-lg-3">
                        <label class="ckbox">
                            <input type="checkbox" name="equipment_status" value="false">
                            <span>Active</span>
                        </label>
                    </div>

                </div>

                <hr>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info mg-r-5">Create</button>
                    <a href="{{ route('admin.equipments') }}" class="btn btn-secondary">Cancel</a>
                </div>
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
