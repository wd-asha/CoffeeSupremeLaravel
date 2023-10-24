@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50 m-5">
        <h6 class="card-body-title">Coffee ID: {{ $coffee->id }}</h6>
            <div class="form-layout">
                <div class="row mg-b-25">

                    <div class="col-lg-3 pt-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Brand: </label>
                            <span style="text-transform: uppercase;"><strong>{{ $coffee->brand->title }}</strong></span>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-3 pt-3">
                        <div class="form-group">
                            <label class="form-control-label">Name: </label>
                            <span style="text-transform: uppercase;">{{ $coffee->coffee_title }}</span>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-3 pt-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Category: </label>
                            <span style="text-transform: uppercase;">{{ $coffee->category->title }}</span>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-3 pt-3">
                        <div class="form-group mg-b-10-force">
                            <label class="form-control-label">Grind: </label>
                            <span style="text-transform: uppercase;">{{ $coffee->grind->title }}</span>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-3 pt-3">
                        <div class="form-group">
                            <label class="form-control-label">Code: </label>
                            <span style="text-transform: uppercase;">{{ $coffee->coffee_code }}</span>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-3 pt-3">
                        <div class="form-group">
                            <label class="form-control-label">Price: </label>
                            <span style="text-transform: uppercase;">$ {{ number_format($coffee->coffee_price, 2, '.', ',' ) }}</span>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-3 pt-3">
                        <div class="form-group">
                            <label class="form-control-label">Weight: </label>
                            <span style="text-transform: uppercase;">{{ $coffee->weight->title }} g.</span>
                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-12 pt-3">
                        <div class="form-group">
                            <label class="form-control-label">Details: </label>
                            <p>{!! $coffee->coffee_about !!}</p>

                        </div>
                    </div><!-- col-4 -->

                    <div class="col-lg-3">
                        <div class="form-group">
                            <label class="form-control-label"></label><br>
                                <img src="/{{ $coffee->coffee_image }}" style="width: 180px; height: 180px; border: 1px solid rgba(0, 0, 0, .2);">
                        </div>
                    </div><!-- col-4 -->
                </div><!-- row -->

                <hr>

                <div class="row">
                    <div class="col-lg-3">
                        @if($coffee->coffee_home === 1)
                            <span style="color: green; text-transform: uppercase">Position: on Main</span>
                            @else
                            <span style="text-transform: uppercase">Position: Not Main</span>
                        @endif
                    </div><!-- col-4 -->
                    <div class="col-lg-3">
                        @if($coffee->coffee_status === 1)
                            <span style="color: green; text-transform: uppercase">Status: Active</span>
                            @else
                            <span style="text-transform: uppercase">Status: not Active</span>
                        @endif
                    </div><!-- col-4 -->
                </div>

                <hr>

                <div class="form-layout-footer">
                    <a href="{{ route('admin.coffees') }}" class="btn btn-secondary">Back</a>
                </div><!-- form-layout-footer -->
            </div>


    </div>

@endsection
