@extends('layouts.single')
@section('title', 'Coffee Supreme - Coffee')
@section('content')

    <div class="wrapper">

        <div class="breadcrumbs">
            <h6>
                <a href="{{ route('front') }}">Home</a>
                <i class="fas fa-caret-right"></i>
                <a href="{{ route('shop.equipments') }}">All equipments</a>
                <i class="fas fa-caret-right"></i>
                <span>Equipment</span>
            </h6>
        </div>

        <div class="single">
            <div class="imageProduct">
                <img src="../../../../{{ $equipmentSingle->equipment_image }}" alt="">
                @auth
                    @php $d = false; @endphp
                    @foreach($wishlist as $item)
                        @if ( (int)$item->equipment_id == $equipmentSingle->id AND (int)$item->user_id == Auth::user()->id)
                            @php $d = true @endphp
                        @endif
                    @endforeach
                    @if($d == false)
                        <a href="{{ route('favoriteEquipment', $equipmentSingle->id) }}" class="heart">
                            <i class="fa fa-heart"></i>
                        </a>
                    @endif
                @endauth
            </div>
            <div class="infoProduct">
                <h3>{{ $equipmentSingle->firma->title }}</h3>
                <h2>{{ $equipmentSingle->equipment_title }}</h2>
                <p>{{ $equipmentSingle->equipment_desc }}</p>

                @if( $equipmentSingle->amount > 0)
                <h4>Quantity:</h4>
                <div class="quantity">
                    <div class="quantity-item" id="quantity">1</div>
                    <div class="quantity-item"></div>
                    <div class="quantity-item quantity-has-select">+</div>
                    <div class="quantity-item quantity-has-select">-</div>
                </div>

                <form action="{{route('equipment.addCart', $equipmentSingle->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="qtyH" id="qtyH" value="1">
                    <input type="hidden" name="weightH" id="weightH" value="0">
                    <input type="hidden" name="priceR" id="priceR" value="{{ $equipmentSingle->equipment_price }}">

                <div class="btn-box">
                    <button type="submit" class="add-to-cart">$<span id="priceNew">{{ number_format($equipmentSingle->equipment_price, 2, '.', ',' ) }}</span> — add to cart
                    </button>
                    <div id="btnBack"></div>
                </div>
                </form>
                @else
                    <div style="padding: 2rem 0 0 0; color: red; font-size: .9rem;">Product is not yet in stock</div>
                @endif

                <h4>SHIPPING & DELIVERY</h4>
                <p>We are currently offering free shipping on all orders nationwide. Excludes any order of Boring Milk, which has a flat delivery rate of $6. All going to plan, place your order before 3pm and we'll ship it that day.​ ​Please allow ​an extra ​2-3 days for your delivery to land. Any orders placed after 3pm on Thursday 23rd June will be dispatched after the Matariki long weekend. International Delivery DHL: 1-2 weeks. No Saturday delivery</p>
            </div>

            <div class="aboutProduct">
                <h4 class="info-h4">About this equipment</h4>
                {!! $equipmentSingle->equipment_about !!}
            </div>
        </div>

    </div>

@endsection
