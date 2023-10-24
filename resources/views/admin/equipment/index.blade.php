@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Equipments</h6>
        <p class="mg-b-10 mg-sm-b-10">Total Equipments: {{ $equipments->total() }}<span style="float: right">
            <a href="{{ route('admin.equipment.create') }}" class="btn btn-info">New Equipment</a>
        </span></p>

        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        {{-- Filtration --}}
        <div class="filerForms" style="display: flex; justify-content: flex-start; align-items: flex-start;">
            {{-- SubCategories filter --}}
            <form action="{{route('admin.equipmentsS')}}" method="get" class="mr-4">
                @csrf
                <select name="subcategory_id" style="height: 2.5rem; border: 1px solid rgba(200, 200, 200, 1); border-right: none; background-color: transparent; color: rgba(80, 80, 80, 1); padding: .5rem; margin-bottom: 1rem;">
                    <option label="All subcategory" selected></option>
                    @foreach($subcategories as $subcategory)
                        <option value="{{$subcategory->id}}"
                            @if(isset($_GET['subcategory_id']))
                                @if($_GET['subcategory_id'] == $subcategory->id) selected @endif
                            @endif>{{$subcategory->title}}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-outline-info" style="transform: translateX(-.25rem);">Apply</button>
            </form>
            {{-- end subcategories filer --}}
            {{-- Firms filter --}}
            <form action="{{route('admin.equipmentsF')}}" method="get" class="mr-4">
                @csrf
                <select name="firma_id" style="height: 2.5rem; border: 1px solid rgba(200, 200, 200, 1); border-right: none; background-color: transparent; color: rgba(80, 80, 80, 1); padding: .5rem; margin-bottom: 1rem;">
                    <option label="All firms" selected></option>
                    @foreach($firmas as $firma)
                        <option value="{{$firma->id}}"
                                @if(isset($_GET['firma_id']))
                                @if($_GET['firma_id'] == $firma->id) selected @endif
                                @endif>{{$firma->title}}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-outline-info" style="transform: translateX(-.25rem);">Apply</button>
            </form>
            {{-- end firms filter --}}
            {{-- Amount filter --}}
            <form action="{{route('admin.equipmentsA')}}" method="get" class="mr-4">
                @csrf
                <input type="number" name="amount" placeholder="Amount" style="height: 2.5rem; border: 1px solid rgba(200, 200, 200, 1); border-right: none; background-color: transparent; color: rgba(80, 80, 80, 1); padding: .5rem; margin-bottom: 1rem; width: 6rem;">
                <button type="submit" class="btn btn-outline-info" style="transform: translateX(-.25rem);">Apply</button>
            </form>
            {{-- end amount filter --}}
        </div>
        {{-- end filtration --}}

        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th class="wd-5p">ID</th>
                    <th class="wd-5p">Code</th>
                    <th class="wd-5p">SubCategory</th>
                    <th class="wd-5p">Firma</th>
                    <th class="wd-10p">Name</th>
                    <th class="wd-5p">Image</th>
                    <th class="wd-10p">Price, $</th>
                    <th class="wd-5p">Amount</th>
                    <th class="wd-5p">On main</th>
                    <th class="wd-20p">Status</th>
                    <th class="wd-30p">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($equipments as $equipment)
                    <tr>
                        <td>{{ $equipment->id }}</td>
                        <td>{{ $equipment->equipment_code }}</td>
                        <td>{{ $equipment->subcategory->title }}</td>
                        <td>{{ $equipment->firma->title }}</td>
                        <td><a href="{{ route('shop.equipment-single', $equipment->id) }}" target="_blank">{{ $equipment->equipment_title }}</a></td>
                        <td><img src="/{{ $equipment->equipment_image }}" style="width: 100%;" alt=""></td>

                        <td>{{ number_format($equipment->equipment_price, 2, '.', ',' ) }}</td>
                        <td>
                            @if($equipment->amount < 3)
                                <span style="color: tomato; font-size: 1rem">{{ $equipment->amount }}</span><br>
                                <a href="" data-toggle="modal" data-target="#modaldemo{{ $equipment->id }}" class="btn btn-warning" style="display: inline-block; margin-bottom: 10px; padding: .2rem .4rem .2rem .4rem;">
                                    <i class="fa fa-edit" style="font-size: .66rem;"></i>
                                </a>
                            @else
                                <span style="font-size: 1rem">{{ $equipment->amount }}</span><br>
                                <a href="" data-toggle="modal" data-target="#modaldemo{{ $equipment->id }}" class="btn btn-outline-info" style="display: inline-block; margin-bottom: 10px; padding: .2rem .4rem .2rem .4rem;">
                                    <i class="fa fa-edit" style="font-size: .66rem;"></i>
                                </a>
                            @endif
                        </td>
                        <td>
                            @if($equipment->equipment_home === 1)
                                <span
                                    style="padding: 6px;
                                    background-color: #1a8e06;
                                    color: white;
                                    margin-bottom: 10px;
                                    display: inline-block;
                                    font-size: .8rem;">yes
                                </span>
                            @else
                                <span
                                    style="padding: 6px;
                                    background-color: grey;
                                    color: white;
                                    margin-bottom: 10px;
                                    display: inline-block;
                                    font-size: .8rem">not
                                </span>
                            @endif
                        </td>
                        {{--<td>{{ $equipment->equipment_desc }}</td>--}}
                        {{--<td>{!! substr($equipment->equipment_about, 0, 100) . " ..." !!}</td>--}}
                        <td>
                            @if($equipment->equipment_status == 1)
                                <span
                                    style="padding: 6px;
                                    background-color: #1a8e06;
                                    color: white;
                                    font-size: .8rem;">&ensp;Active&nbsp;
                                </span>&emsp;
                            @else
                                <span
                                    style="padding: 6px;
                                    background-color: #df3b3b;
                                    color: white;
                                    font-size: .8rem;">&ensp;Inactive
                                </span>&emsp;
                            @endif
                        </td>
                        <td>
                            @if($equipment->equipment_status === 1)
                                <a href="{{ route('equipment.inactive', $equipment->id) }}" class="btn btn-outline-danger" style="display: inline-block; margin-bottom: 10px; margin-right: 10px;">
                                    <i class="fa fa-thumbs-down" style="font-size: 1.2rem"></i>
                                </a>
                            @else
                                <a href="{{ route('equipment.active', $equipment->id) }}" class="btn btn-outline-success" style="display: inline-block; margin-bottom: 10px; margin-right: 10px;">
                                    <i class="fa fa-thumbs-up" style="font-size: 1.2rem"></i>
                                </a>
                            @endif
                            <a href="{{ route('admin.equipment.show', $equipment->id) }}" class="btn btn-outline-info" style="display: inline-block; margin-bottom: 10px;">
                                <i class="fa fa-eye" style="font-size: 1.2rem;"></i>
                            </a>
                            <a href="{{ route('admin.equipment.edit', $equipment->id) }}" class="btn btn-outline-warning" style="display: inline-block; margin-bottom: 10px; margin-right: 10px">
                                <i class="fa fa-edit" style="font-size: 1.2rem;"></i>
                            </a>
                            <a href="{{ route('admin.equipment.delete', $equipment->id) }}" id="delete" class="btn btn-outline-danger" style="display: inline-block; margin-bottom: 10px;">
                                <i class="fa fa-trash" style="font-size: 1.2rem; padding: 2px"></i>
                            </a>
                        </td>
                    </tr>

                    <!-- LARGE MODAL -->
                    <div id="modaldemo{{ $equipment->id }}" class="modal fade">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content tx-size-sm">
                                <div class="modal-header pd-x-20">
                                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Amount</h6>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form method="POST" action="{{ route('amount.equipment', $equipment->id) }}">
                                    @csrf
                                    <div class="modal-body pd-20">
                                        <div class="form-group @error('title') is-invalid @enderror">
                                            <input type="number" name="amount" class="form-control" placeholder="Amount" value="{{ $equipment->amount }}">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-info btn-block">Save</button>
                                        </div>
                                    </div><!-- modal-body -->
                                </form>
                            </div>
                        </div><!-- modal-dialog -->
                    </div><!-- modal -->

                @endforeach
                @if($equipments->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif
                </tbody>
            </table>

            <div class="mt-3">
                {{ $equipments->withQueryString()->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>

        <div style="padding: 20px;"></div>
        {{--Trashed Equipments--}}
        <h6 class="card-body-title">Trash</h6>
        <p class="mg-b-10 mg-sm-b-10">Trashed equipments: {{ $trashed->total() }}</p>
        <div class="table-responsive">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th class="wd-5p">ID</th>
                    <th class="wd-5p">Code</th>
                    <th class="wd-10p">SubCategory</th>
                    <th class="wd-10p">Firma</th>
                    <th class="wd-10p">Name</th>
                    <th class="wd-10p">Image</th>
                    <th class="wd-5p">Price</th>
                    <th class="wd-20p">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($trashed as $trash)
                    <tr>
                        <td>{{ $trash->id }}</td>
                        <td>{{ $trash->equipment_code }}</td>
                        <td>{{ $trash->subcategory->title }}</td>
                        <td>{{ $trash->firma->title }}</td>
                        <td>{{ $trash->equipment_title }}</td>
                        <td><img src="/{{ $trash->equipment_image }}" style="height:100px;" alt=""></td>
                        <td>${{ number_format($trash->equipment_price, 2, '.', ',' ) }}</td>

                        <td>
                            <a href="{{ route('restore.equipment', $trash->id) }}" class="btn btn-outline-success">Restore</a>
                            <a href="{{--{{ route('destroy.equipment', $trash->id) }}--}}" id="delete" class="btn btn-outline-danger">Delete</a>
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
