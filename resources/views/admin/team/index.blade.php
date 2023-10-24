@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Team</h6>
        <p class="mg-b-10 mg-sm-b-10">Total members: {{ $teams->total() }}<span style="float: right">
            <a href="{{ route('admin.team.create') }}" class="btn btn-info">New member</a>
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
                    <th class="wd-5p">ID</th>
                    <th class="wd-10p">Photo</th>
                    <th class="wd-10p">Name</th>
                    <th class="wd-10p">Country</th>
                    <th class="wd-10p">Town</th>
                    <th class="wd-10p">Date</th>
                    <th class="wd-20p">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($teams as $team)
                    <tr>
                        <td>{{ $team->id }}</td>
                        <td><img src="/{{ $team->team_image }}" style="height:100px;" alt=""></td>
                        <td>{{ $team->team_title }}</td>
                        <td>{{ $team->country->country_title }}</td>
                        <td>{{ $team->town->town_title }}</td>
                        <td>{{ $team->created_at }}</td>
                        <td>
                            <div class="flex" style="display: flex; justify-content: flex-start; align-items: flex-start">
                                <a href="{{ route('admin.team.delete', $team->id) }}" id="delete" class="btn btn-outline-danger" style="display: inline-block; margin-right: 10px;"><i class="fa fa-trash" style="font-size: 1.2rem;"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                @if($teams->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $teams->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>

        <div style="padding: 20px;"></div>
        {{--Trashed Team--}}
        <h6 class="card-body-title">Trash</h6>
        <p class="mg-b-10 mg-sm-b-10">Trashed members: {{ $trashTeams->total() }}</p>
        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th class="wd-5p">ID</th>
                    <th class="wd-5p">Photo</th>
                    <th class="wd-15p">Name</th>
                    <th class="wd-5p">Country</th>
                    <th class="wd-20p">Town</th>
                    <th class="wd-5p">Date</th>
                    <th class="wd-10p">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trashTeams as $trashTeam)
                    <tr>
                        <td>{{ $trashTeam->id }}</td>
                        <td><img src="/{{ $trashTeam->team_image }}" style="height:100px;" alt=""></td>
                        <td>{{ $trashTeam->team_title }}</td>
                        <td>{{ $trashTeam->country->country_title }}</td>
                        <td>{{ $trashTeam->town->town_title }}</td>
                        <td>{{ $trashTeam->updated_at }}</td>
                        <td>
                            <a href="{{ route('admin.team.restore', $trashTeam->id) }}" class="btn btn-outline-success">Restore</a>
                            <a href="{{--{{ route('admin.team.destroy', $trashTeam->id) }}--}}" id="delete" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                @if($trashTeams->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $trashTeams->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </div>

@endsection
