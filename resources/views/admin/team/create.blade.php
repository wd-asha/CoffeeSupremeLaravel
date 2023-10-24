@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">New member</h6>

        <form action="{{ route('admin.team.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-layout">
                <div class="row mg-b-25">

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="team_title" placeholder="Input name"><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Country: <span class="tx-danger">*</span></label>
                            <select class="form-control" data-placeholder="Select country" name="country_id">
                                <option label="Select country"></option>
                                @foreach($countries as $country)
                                    <option value="{{ $country->id }}">{{ $country->country_title }}</option>
                                @endforeach
                            </select><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Town: <span class="tx-danger">*</span></label>
                            <select class="form-control" data-placeholder="Select town" name="town_id">
                                <option label="Select town"></option>
                                @foreach($towns as $town)
                                    <option value="{{ $town->id }}">{{ $town->town_title }}</option>
                                @endforeach
                            </select><br>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Dept: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="team_dept" placeholder="Input dept"><br>
                        </div>
                    </div>


                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label">Photo: <span class="tx-danger">*</span></label><br>
                            <label class="custom-file">
                                <input class="custom-file-input" type="file" id="file" name="team_image" data-placeholder="Select image" onchange="readURL1(this);" required><br><br>
                                <span class="custom-file-control"></span>
                                <img src="{{ asset('media/team/empty-image.png') }}" id="one">
                            </label>
                        </div>
                    </div>

                </div>

                <hr>

                <div class="form-layout-footer">
                    <button type="submit" class="btn btn-info mg-r-5">Create</button>
                    <a href="{{ route('admin.teams') }}" class="btn btn-secondary">Cancel</a>
                </div>
            </div>
        </form>

    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>


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

