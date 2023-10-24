@extends('layouts.admin_app')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Users</h6>
        <p class="mg-b-20 mg-sm-b-30">Total users: {{ $users->total() }}<span style="float: right">
            <a href="{{ route('register') }}" class="btn btn-outline-success">New user</a>
        </span></p>

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
                    <th scope="col">Mame</th>
                    <th scope="col">EMail</th>
                    <th scope="col">Status</th>
                    <th scope="col">Registration date</th>
                    <th scope="col">Restoration date</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td scope="col">
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td scope="col">{{ $user->id }}</td>
                        <td scope="col">{{ $user->name }}</td>
                        <td scope="col">{{ $user->email }}</td>
                        <td scope="col">
                            @if($user->role_id == 0) Admin
                            @elseif($user->role_id == 1) Manager
                            @elseif($user->role_id == 2) Visitor
                            @endif
                        </td>
                        <td scope="col">{{ $user->created_at->diffForHumans() }}</td>
                        <td scope="col">
                            @if($user->updated_at)
                                {{ $user->updated_at->diffForHumans() }}
                            @else There is no data
                            @endif
                        </td>
                        <td scope="col">
                            @if(!$user->role_id == 0)
                                <a href="{{ route('destroy.user', $user->id) }}" class="btn btn-outline-warning">Blocking</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-3">
                {{ $users->links('vendor.pagination.bootstrap-4') }}
            </div>

            <h6 class="card-body-title">Trash</h6>
            <p class="mg-b-20 mg-sm-b-30">Remote users: {{ $trashed->total() }}</p>
            <table class="table table-hover table-bordered mg-b-0">
                <thead class="bg-info">
                <tr>
                    <th scope="col">
                        <label class="ckbox mg-b-0">
                            <input type="checkbox"><span></span>
                        </label>
                    </th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">EMail</th>
                    <th scope="col">Status</th>
                    <th scope="col">Registration date</th>
                    <th scope="col">Blocking date</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trashed as $trash)
                    <tr>
                        <td scope="col">
                            <label class="ckbox mg-b-0">
                                <input type="checkbox"><span></span>
                            </label>
                        </td>
                        <td scope="col">{{ $trash->id }}</td>
                        <td scope="col">{{ $trash->name }}</td>
                        <td scope="col">{{ $trash->email }}</td>
                        <td scope="col">
                            @if($trash->role_id == 0) Admin
                            @elseif($trash->role_id == 1) Manager
                            @elseif($trash->role_id == 2) Visitor
                            @endif
                        </td>
                        <td scope="col">
                            @if($trash->created_at)
                                {{ $trash->created_at->diffForHumans() }}
                            @else There is no data
                            @endif
                        </td>
                        <td scope="col">
                            @if($trash->deleted_at)
                                {{ $trash->deleted_at->diffForHumans() }}
                            @else There is no data
                            @endif
                        </td>
                        <td scope="col">
                            <a href="{{ route('restore.user', $trash->id) }}" class="btn btn-outline-success">Restore</a>
                            <a href="{{ route('destroy.user', $trash->id) }}" id="delete" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
