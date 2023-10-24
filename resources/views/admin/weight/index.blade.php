@extends('layouts.admin_app')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Weights</h6>
        <p class="mg-b-20 mg-sm-b-30">Total weights: {{ $weights->total() }}<span style="float: right">
            <a href="" class="btn btn-info" data-toggle="modal" data-target="#modaldemo3">New weight</a>
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
                    <th scope="col">
                        <label class="ckbox mg-b-0">
                            <input type="checkbox"><span></span>
                        </label>
                    </th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($weights as $weight)
                    <tr>
                        <td scope="col">
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td scope="col">{{ $weight->id }}</td>
                        <td scope="col">{{ $weight->title }}</td>
                        <td>
                            <a href="{{ route('admin.weight.delete', $weight->id) }}" id="delete" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                @if($weights->total() == 0)
                    <tr>
                        <td></td>
                        <td></td>
                        <td><p style="text-align: center">no weights</p></td>
                        <td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $weights->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </div>

    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">New weight</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('admin.weight.store') }}">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group @error('weight_name') is-invalid @enderror">
                            <input type="text" name="weight_name" class="form-control" placeholder="Name">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info btn-block">Create</button>
                        </div>

                    </div><!-- modal-body -->
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->

@endsection
