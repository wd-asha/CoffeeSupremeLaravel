@extends('layouts.shop')
@section('title', 'Coffee Supreme - Merchandise')
@section('content')

    <div class="wrapper">

        <div class="breadcrumbs">
            <h6>
                <a href="{{ route('front') }}">Home</a>
                <i class="fas fa-caret-right"></i>
                <span>Merchandise</span>
            </h6>
        </div>

        <div  id="espress"></div>
        <h2>Merchandise</h2>

        <div class="coffees">
            <div class="products">
                @foreach($equipments as $equipment)
                    @if(($equipment->subcategory->title === 'Merchandise') AND ($equipment->equipment_status === 1))
                        <div class="product">
                            <a href="{{ route('shop.equipment-single', $equipment->id) }}">
                                <div class="product_img">
                                    <img src="../../{{ $equipment->equipment_image }}" alt="">
                                </div>
                                <h4 class="product_title">
                                    {{ $equipment->equipment_title }}
                                </h4>
                                <p class="product_text">
                                    {{ $equipment->equipment_desc }}
                                </p>
                                <p class="product_price">
                                    ${{ number_format($equipment->equipment_price, 2, '.', ',' ) }}
                                </p>

                                <form action="{{route('equipment.addCart', $equipment->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="qtyH" id="qtyH" value="1">
                                    <div class="btn-box">
                                        <button type="submit" class="add-to-cart">add to cart
                                        </button>
                                        <div class="btnBack"></div>
                                    </div>
                                </form>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

    </div>

@endsection
