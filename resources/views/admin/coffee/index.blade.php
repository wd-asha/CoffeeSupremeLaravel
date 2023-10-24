@extends('layouts.admin_app')
@section('content')
    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Coffees</h6>
        <p class="mg-b-10 mg-sm-b-10">Total Coffees: {{ $coffees->total() }}<span style="float: right">
            <a href="{{ route('admin.coffee.create') }}" class="btn btn-info">New Coffee</a>
        </span></p>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        {{-- Amount filter --}}
        <form action="{{route('admin.coffeesA')}}" method="get" class="mr-4">
            @csrf
            <input type="number" name="amount" placeholder="Amount" style="height: 2.5rem; border: 1px solid rgba(200, 200, 200, 1); border-right: none; background-color: transparent; color: rgba(80, 80, 80, 1); padding: .5rem; margin-bottom: 1rem; width: 6rem;">
            <button type="submit" class="btn btn-outline-info" style="transform: translateX(-.25rem);">Apply</button>
        </form>
        {{-- end amount filter --}}

        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th class="wd-5p">ID</th>
                    <th class="wd-5p">Code</th>
                    <th class="wd-10p">Brand</th>
                    <th class="wd-10p">Name</th>
                    <th class="wd-10p">Image</th>
                    <th class="wd-5p">Price</th>
                    <th class="wd-5p">Weight</th>
                    <th class="wd-5p">Amount</th>
                    <th class="wd-5p">On main</th>
                    <th class="wd-10p">Status</th>
                    <th class="wd-15p">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($coffees as $coffee)
                    <tr>
                        <td>{{ $coffee->id }}</td>
                        <td>{{ $coffee->coffee_code }}</td>
                        <td>{{ $coffee->brand->title }}</td>
                        <td><a href="{{ route('shop.coffee-single', $coffee->id) }}" target="_blank">{{ $coffee->coffee_title }}</a></td>
                        <td><img src="/{{ $coffee->coffee_image }}" style="height:100px;" alt=""></td>

                        <td>${{ number_format($coffee->coffee_price, 2, '.', ',' ) }}</td>
                        <td>{{ $coffee->weight->title }}</td>
                        <td>
                            @if($coffee->amount < 3)
                                <span style="color: red; font-size: 1rem">{{ $coffee->amount }}</span><br>
                                <a href="" data-toggle="modal" data-target="#modaldemo{{ $coffee->id }}" class="btn btn-danger" style="display: inline-block; margin-bottom: 10px; padding: .2rem .4rem .2rem .4rem;">
                                    <i class="fa fa-plus" style="font-size: .66rem;"></i>
                                </a>
                            @else
                                <span style="font-size: 1rem">{{ $coffee->amount }}</span><br>
                                <a href="" data-toggle="modal" data-target="#modaldemo{{ $coffee->id }}" class="btn btn-outline-info" style="display: inline-block; margin-bottom: 10px; padding: .2rem .4rem .2rem .4rem;">
                                    <i class="fa fa-plus" style="font-size: .66rem;"></i>
                                </a>
                            @endif
                        </td>
                        <td>
                            @if($coffee->coffee_home === 1)
                                <span
                                    style="padding: 6px;
                                    background-color: #1a8e06;
                                    color: white;
                                    margin-bottom: 10px;
                                    display: inline-block;
                                    font-size: .8rem">yes
                                </span><br>
                                @else
                                <span
                                    style="padding: 6px;
                                    background-color: grey;
                                    color: white;
                                    margin-bottom: 10px;
                                    display: inline-block;
                                    font-size: .8rem">not
                                </span><br>
                            @endif
                        </td>
                        {{--<td>{!! substr($coffee->coffee_about, 0, 100) . " ..." !!}</td>--}}
                        <td>
                            @if($coffee->coffee_status == 1)
                                <span
                                    style="padding: 6px;
                                    background-color: #1a8e06;
                                    color: white;
                                    font-size: .8rem">&ensp;Active&nbsp;
                                </span>&emsp;
                            @else
                                <span
                                    style="padding: 6px;
                                    background-color: #df3b3b;
                                    color: white;
                                    font-size: .8rem">&ensp;Inactive
                                </span>&emsp;
                            @endif
                        </td>
                        <td>
                            @if($coffee->coffee_status === 1)
                                <a href="{{ route('coffee.inactive', $coffee->id) }}" class="btn btn-outline-danger" style="display: inline-block; margin-bottom: 10px; margin-right: 10px;">
                                    <i class="fa fa-thumbs-down" style="font-size: 1.2rem"></i>
                                </a>
                            @else
                                <a href="{{ route('coffee.active', $coffee->id) }}" class="btn btn-outline-success" style="display: inline-block; margin-bottom: 10px; margin-right: 10px;">
                                    <i class="fa fa-thumbs-up" style="font-size: 1.2rem"></i>
                                </a>
                            @endif
                            <a href="{{ route('admin.coffee.show', $coffee->id) }}" class="btn btn-outline-info" style="display: inline-block; margin-bottom: 10px;">
                                <i class="fa fa-eye" style="font-size: 1.2rem;"></i>
                            </a>
                            <a href="{{ route('admin.coffee.edit', $coffee->id) }}" class="btn btn-outline-warning" style="display: inline-block; margin-bottom: 10px; margin-right: 10px">
                                <i class="fa fa-edit" style="font-size: 1.2rem;"></i>
                            </a>
                            <a href="{{ route('admin.coffee.delete', $coffee->id) }}" id="delete" class="btn btn-outline-danger" style="display: inline-block; margin-bottom: 10px;">
                                <i class="fa fa-trash" style="font-size: 1.2rem; padding: 2px"></i>
                            </a>
                        </td>
                    </tr>

                    <!-- LARGE MODAL -->
                    <div id="modaldemo{{ $coffee->id }}" class="modal fade">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content tx-size-sm">
                                <div class="modal-header pd-x-20">
                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Amount</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST" action="{{ route('amount.coffee', $coffee->id) }}">
                                    @csrf
                                    <div class="modal-body pd-20">
                                        <div class="form-group @error('title') is-invalid @enderror">
                                            <input type="number" name="amount" class="form-control" placeholder="Amount" value="{{ $coffee->amount }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-block">Sane</button>
                                        </div>
                                    </div><!-- modal-body -->
                                </form>
                            </div>
                        </div><!-- modal-dialog -->
                    </div><!-- modal -->

                @endforeach
                @if($coffees->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $coffees->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>

        <div style="padding: 20px;"></div>
        {{--Trashed Coffee--}}
        <h6 class="card-body-title">Trash</h6>
        <p class="mg-b-10 mg-sm-b-10">Trashed coffees: {{ $trashed->total() }}</p>
        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th class="wd-5p">ID</th>
                    <th class="wd-5p">Code</th>
                    <th class="wd-10p">Brand</th>
                    <th class="wd-10p">Name</th>
                    <th class="wd-10p">Image</th>
                    <th class="wd-5p">Price</th>
                    <th class="wd-5p">Weight</th>
                    <th class="wd-20p">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trashed as $trash)
                    <tr>
                        <td>{{ $trash->id }}</td>
                        <td>{{ $trash->coffee_code }}</td>
                        <td>{{ $trash->brand->title }}</td>
                        <td>{{ $trash->coffee_title }}</td>
                        <td><img src="/{{ $trash->coffee_image }}" style="height:100px;" alt=""></td>
                        <td>${{ number_format($trash->coffee_price, 2, '.', ',' ) }}</td>
                        <td>{{ $trash->weight->title }}

                        <td>
                            <a href="{{ route('restore.coffee', $trash->id) }}" class="btn btn-outline-success">Restore</a>
                            <a href="{{ route('destroy.coffee', $trash->id) }}" id="delete" class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
                @if($trashed->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $trashed->links('vendor.pagination.bootstrap-4') }}
            </div>

        </div>
    </div>

@endsection
