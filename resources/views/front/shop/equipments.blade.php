@extends('layouts.shop')
@section('title', 'Coffee Supreme - All Equipments')
@section('content')

    <div class="wrapper">

        <div class="breadcrumbs">
            <h6>
                <a href="{{ route('front') }}">Home</a>
                <i class="fas fa-caret-right"></i>
                <span>Equipments</span>
            </h6>
        </div>

        <div  id="espress"></div>
        <h2>Equipments</h2>

        <div class="coffees">
            <div class="caption">
                <p>Manual Brewing</p>
            </div>
            <div class="products">
                @foreach($equipments as $equipment)
                    @if(($equipment->subcategory->title === 'Manual Brewing') AND ($equipment->equipment_status === 1))
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
            <div id="filtermash"></div>
        </div>

        <div class="coffees">
            <div class="caption">
                <p>Filter Machines</p>
            </div>
            <div class="products">
                @foreach($equipments as $equipment)
                    @if(($equipment->subcategory->title === 'Filter Machines') AND ($equipment->equipment_status === 1))
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
            <div id="espmash"></div>
        </div>

        <div class="coffees">
            <div class="caption">
                <p>Espresso Machines</p>
            </div>
            <div class="products">
                @foreach($equipments as $equipment)
                    @if(($equipment->subcategory->title === 'Espresso Machines') AND ($equipment->equipment_status === 1))
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
            <div id="grinder"></div>
        </div>

        <div class="coffees">
            <div class="caption">
                <p>Grinders</p>
            </div>
            <div class="products">
                @foreach($equipments as $equipment)
                    @if(($equipment->subcategory->title === 'Grinders') AND ($equipment->equipment_status === 1))
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
            <div id="access"></div>
        </div>

        <div class="coffees">
            <div class="caption">
                <p>Accessories</p>
            </div>
            <div class="products">
                @foreach($equipments as $equipment)
                    @if(($equipment->subcategory->title === 'Accessories') AND ($equipment->equipment_status === 1))
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
            <div id="cups"></div>
        </div>

        <div class="coffees">
            <div class="caption">
                <p>KeepCups</p>
            </div>
            <div class="products">
                @foreach($equipments as $equipment)
                    @if(($equipment->subcategory->title === 'KeepCups') AND ($equipment->equipment_status === 1))
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
            <div id="papers"></div>
        </div>

        <div class="coffees">
            <div class="caption">
                <p>Filter Papers</p>
            </div>
            <div class="products">
                @foreach($equipments as $equipment)
                    @if(($equipment->subcategory->title === 'Filter Papers') AND ($equipment->equipment_status === 1))
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
