@extends('layouts.admin_app')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Grinds</h6>
        <p class="mg-b-20 mg-sm-b-30">Total grinds: {{ $grinds->total() }}<span style="float: right">
            <a href="" class="btn btn-info" data-toggle="modal" data-target="#modaldemo3">New grind</a>
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
                @foreach($grinds as $grind)
                    <tr>
                        <td scope="col">
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td scope="col">{{ $grind->id }}</td>
                        <td scope="col">{{ $grind->title }}</td>
                        <td>
                            <a href="{{ route('admin.grind.delete', $grind->id) }}" id="delete" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                @if($grinds->total() == 0)
                    <tr>
                        <td></td>
                        <td></td>
                        <td><p style="text-align: center">no grinds</p></td>
                        <td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $grinds->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </div>

    <!-- LARGE MODAL -->
    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">New grind</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('admin.grind.store') }}">
                    @csrf
                    <div class="modal-body pd-20">

                        <div class="form-group @error('grind_name') is-invalid @enderror">
                            <input type="text" name="grind_name" class="form-control" placeholder="Name">
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
