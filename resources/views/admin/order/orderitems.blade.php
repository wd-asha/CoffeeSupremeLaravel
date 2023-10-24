@extends('layouts.admin_app')
@section('content')

    <div class="card pd-20 pd-sm-40 mg-t-50">
        <h6 class="card-body-title">Order Details</h6>
        <div class="row">
            <div class="col-md-5">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th class="wd-10p">ID:</th>
                        <th class="wd-10p">{{ $order->id }}</th>
                    </tr>
                    <tr>
                        <th class="wd-10p">User:</th>
                        <th class="wd-10p">{{ $order->user_name }}</th>
                    </tr>
                    <tr>
                        <th class="wd-10p">Email:</th>
                        <th class="wd-10p">{{ $order->order_email }}</th>
                    </tr>
                    <tr>
                        <th class="wd-10p">Phone:</th>
                        <th class="wd-10p">{{ $order->order_phone }}</th>
                    </tr>
                    </thead>
                </table>
            </div>

            <div class="col-md-5">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="wd-10p">Delivery:</th>
                            <th class="wd-10p">{{ $order->orderdelivery }}</th>
                        </tr>
                        <tr>
                            <th class="wd-10p">Phone:</th>
                            <th class="wd-10p">{{ $order->order_phone }}</th>
                        </tr>
                        <tr>
                            <th class="wd-10p">Address:</th>
                            <th class="wd-10p">{{ $order->order_address }}</th>
                        </tr>
                        <tr>
                            <th class="wd-10p">Status:</th>
                            <th class="wd-10p">
                                @if($order->order_status == 0)
                                    <span style="color: red;">Pending</span>
                                @elseif($order->order_status == 1)
                                    <span style="color: blue;">Process</span>
                                @elseif($order->order_status == 2)
                                    <span style="color: green;">Delivered</span>
                                @else
                                    <span>Completed</span>
                                @endif
                            </th>
                        </tr>
                        <tr>
                            <th class="wd-10p">Created:</th>
                            <th class="wd-10p">{{ $order->created_at }}</th>
                        </tr>
                        <tr>
                            <th class="wd-10p">Updated:</th>
                            <th class="wd-10p">{{ $order->updated_at }}</th>
                        </tr>
                        <tr>
                            <th class="wd-10p">Total:</th>
                            <th class="wd-10p" style="font-size: 1rem; color: green;">$ {{ $order->order_total }}</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>

            <div class="col-md-2">
                @if($order->order_status == 0)
                    <a href="{{ route('admin.neworders') }}" class="btn btn-warning" style="display: block; width: 100%; margin-bottom: 1rem;">Back to list pending</a>
                    @else
                    <a href="{{route('admin.order.pending', $order->id) }}" class="btn btn-warning" style="display: block; width: 100%; margin-bottom: 1rem;">Change to pending</a>
                @endif
                @if($order->order_status == 1)
                    <a href="{{ route('admin.orders.process') }}" class="btn btn-info" style="display: block; width: 100%; margin-bottom: 1rem;">Back to list process</a>
                    @else
                    <a href="{{ route('admin.order.process', $order->id) }}" class="btn btn-info" style="display: block; width: 100%; margin-bottom: 1rem;">Change to process</a>
                @endif
                @if($order->order_status == 2)
                    <a href="{{ route('admin.orders.delivered') }}" class="btn btn-success" style="display: block; width: 100%; margin-bottom: 1rem;">Back to list delivered</a>
                    @else
                    <a href="{{ route('admin.order.delivered', $order->id) }}" class="btn btn-success" style="display: block; width: 100%; margin-bottom: 1rem;">Change delivered</a>
                    @endif
                @if($order->order_status == 3)
                    <a href="{{ route('admin.orders.canceled') }}" class="btn btn-danger" style="display: block; width: 100%; margin-bottom: 1rem;">Back to list completed</a>
                    @else
                    <a href="{{ route('admin.order.canceled', $order->id ) }}" class="btn btn-danger" style="display: block; width: 100%; margin-bottom: 1rem;">Change to completed</a>
                    @endif
            </div>
        </div>

        <div class="table-responsive col-md-10">
            <table class="table table-hover table-bordered mg-b-0 mb-5">
                <thead class="bg-info">
                <tr>
                    <th class="wd-16p">ID</th>
                    <th class="wd-16p">Name</th>
                    <th class="wd-16p">Image</th>
                    <th class="wd-16p">Grind</th>
                    <th class="wd-16p">Weight</th>
                    <th class="wd-16p">QTY</th>
                    <th class="wd-16p">Price</th>
                </tr>
                </thead>
                <tbody>
                @foreach($orderItems as $item)
                    <tr>
                        <td>{{ $item->coffee_id }}</td>
                        <td>
                            <a href="{{ route('shop.coffee-single', $item->coffee_id) }}" target="_blank">
                            {{ $item->coffee_name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('shop.coffee-single', $item->coffee_id) }}" target="_blank">
                            <img src="/{{ $item->coffee_image }}" alt="" style="height:100px;">
                            </a>
                        </td>
                        <td>{{ $item->coffee_grind }}</td>
                        <td>{{ $item->coffee_weight }}</td>
                        <td>{{ $item->coffee_qty }}</td>
                        <td>$ {{ $item->coffee_price }}</td>
                    </tr>
                @endforeach
                {{--@if($orderItems->total() == 0)
                    <tr>
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
                @endif--}}
                </tbody>
            </table>

        </div>

    </div>

@endsection
