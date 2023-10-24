@extends('layouts.admin_app')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Firms</h6>
        <p class="mg-b-20 mg-sm-b-30">Total firms: {{ $firmas->total() }}
            <span style="float: right">
                <a href="" class="btn btn-info" data-toggle="modal" data-target="#modaldemo3">New firm</a>
                <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a>
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#modalImport">Import data</a>
            </span>
        </p>

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
                @foreach($firmas as $firm)
                    <tr>
                        <td>{{ $firm->id }}</td>
                        <td>{{ $firm->title }}</td>
                        <td>
                            <a href="{{ route('admin.firma.delete', $firm->id) }}" id="delete" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                @if($firmas->total() == 0)
                    <tr>
                        <td></td>
                        <td></td>
                        <td><p style="text-align: center">no firms</p></td>
                        <td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $firmas->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </div>

    <div id="modalImport" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Import data</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <label class="custom-file">
                                <input type="file" name="file" class="custom-file-input" id="customFile" autofocus>
                                <span class="custom-file-control"></span>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </label>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Import data</button>
                        </div>
                    </div><!-- modal-body -->
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->

    <div id="modaldemo3" class="modal fade">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">New firm</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="{{ route('admin.firma.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body pd-20">
                        <div class="form-group">
                            <input type="text" class="form-control mb-3" id="title" name="title" placeholder="Firm name" autofocus>
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-info btn-block">Create</button>
                        </div>
                    </div><!-- modal-body -->
                </form>
            </div>
        </div><!-- modal-dialog -->
    </div><!-- modal -->

@endsection
