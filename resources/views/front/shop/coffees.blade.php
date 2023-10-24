@extends('layouts.shop')
@section('title', 'Coffee Supreme - All Coffee')
@section('content')

    <div class="wrapper">

        <div class="breadcrumbs">
            <h6>
                <a href="{{ route('front') }}">Home</a>
                <i class="fas fa-caret-right"></i>
                <span>Coffee</span>
            </h6>
        </div>

        <div  id="espress"></div>
        <h2>Coffee</h2>

        <div class="coffees">
            <div class="caption">
                <p>Espresso Blends</p>
            </div>
            <div class="products">
                @foreach($coffees as $coffee)
                    @if(($coffee->brand->title === 'Espresso Blends') AND ($coffee->coffee_status === 1))
                        <div class="product">
                            <a href="{{ route('shop.coffee-single', $coffee->id) }}">
                                <div class="product_img">
                                    <img src="../../{{ $coffee->coffee_image }}" alt="">
                                </div>
                                <h4 class="product_title">
                                    {{ $coffee->coffee_title }}
                                </h4>
                                <p class="product_text">
                                    {{ $coffee->coffee_taste }}
                                </p>
                                <p class="product_price">
                                    ${{ number_format($coffee->coffee_price, 2, '.', ',' ) }}
                                </p>

                                <form action="{{route('coffee.addCart', $coffee->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="qtyH" id="qtyH" value="1">
                                    <input type="hidden" name="weightH" id="weightH" value="{{ $coffee->weight->title }}">
                                    <input type="hidden" name="priceR" id="priceR" value="{{ $coffee->coffee_price }}">
                                    <input type="hidden" name="grindH" id="grindH" value="{{ $coffee->grind->title }}">

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
            <div id="picks"></div>
        </div>
        <div class="coffees">
            <div class="caption">
                <p>Single Origin Espresso</p>
            </div>
            <div class="products">

                @foreach($coffees as $coffee)
                    @if(($coffee->brand->title === 'Single Origin Espresso') AND ($coffee->coffee_status === 1))
                        <div class="product">
                            <a href="{{ route('shop.coffee-single', $coffee->id) }}">
                                <div class="product_img">
                                    <img src="../../{{ $coffee->coffee_image }}" alt="">
                                </div>
                                <h4 class="product_title">
                                    {{ $coffee->coffee_title }}
                                </h4>
                                <p class="product_text">
                                    {{ $coffee->coffee_taste }}
                                </p>
                                <p class="product_price">
                                    ${{ number_format($coffee->coffee_price, 2, '.', ',' ) }}
                                </p>
                                <form action="{{route('coffee.addCart', $coffee->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="qtyH" id="qtyH" value="1">
                                    <input type="hidden" name="weightH" id="weightH" value="{{ $coffee->weight->title }}">
                                    <input type="hidden" name="priceR" id="priceR" value="{{ $coffee->coffee_price }}">
                                    <input type="hidden" name="grindH" id="grindH" value="{{ $coffee->grind->title }}">

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
            <div id="filte"></div>
        </div>
        <div class="coffees">
            <div class="caption">
                <p>Single Origin Filter</p>
            </div>
            <div class="products">
                @foreach($coffees as $coffee)
                    @if(($coffee->brand->title === 'Single Origin Filter') AND ($coffee->coffee_status === 1))
                        <div class="product">
                            <a href="{{ route('shop.coffee-single', $coffee->id) }}">
                                <div class="product_img">
                                    <img src="../../{{ $coffee->coffee_image }}" alt="">
                                </div>
                                <h4 class="product_title">
                                    {{ $coffee->coffee_title }}
                                </h4>
                                <p class="product_text">
                                    {{ $coffee->coffee_taste }}
                                </p>
                                <p class="product_price">
                                    ${{ number_format($coffee->coffee_price, 2, '.', ',' ) }}
                                </p>
                                <form action="{{route('coffee.addCart', $coffee->id)}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="qtyH" id="qtyH" value="1">
                                    <input type="hidden" name="weightH" id="weightH" value="{{ $coffee->weight->title }}">
                                    <input type="hidden" name="priceR" id="priceR" value="{{ $coffee->coffee_price }}">
                                    <input type="hidden" name="grindH" id="grindH" value="{{ $coffee->grind->title }}">

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
