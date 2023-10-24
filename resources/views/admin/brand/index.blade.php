@extends('layouts.admin_app')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Brands</h6>
        <p class="mg-b-20 mg-sm-b-30">Total brands: {{ $brands->total() }}<span style="float: right">
            <a href="" class="btn btn-info" data-toggle="modal" data-target="#modaldemo3">New brand</a>
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
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($brands as $brand)
                    <tr>
                        <td>{{ $brand->id }}</td>
                        <td>{{ $brand->title }}</td>
                        <td>
                            <a href="{{ route('admin.brand.delete', $brand->id) }}" id="delete" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                @if($brands->total() == 0)
                    <tr>
                        <td></td>
                        <td></td>
                        <td><p style="text-align: center">no brands</p></td>
                        <td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $brands->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </div>

    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">New brand</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-20">
                    <div class="form-group">
                        <input type="text" class="form-control mb-3" id="title" name="title" placeholder="Brand name">
                        @error('brand_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    {{--<div class="form-group">
                        <label class="custom-file">
                        <input type="file" class="custom-file-input" id="file" name="brand_logo">
                            <span class="custom-file-control"></span>
                        </label>
                        @error('brand_logo')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>--}}
                    <div class="modal-footer">
                        <button type="submit" name="submit" class="btn btn-info btn-block">Create</button>
                    </div>
                    </div><!-- modal-body -->
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->

@endsection
