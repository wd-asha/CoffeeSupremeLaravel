@extends('layouts.app')
@section('content')
    <div class="wrapper">

        <div class="breadcrumbs">
            <h6>
                <a href="{{ route('front') }}">Home</a>
                <i class="fas fa-caret-right"></i>
                <span>Wishlist</span>
            </h6>
        </div>

        <h2>Wishlist</h2>

        <div class="wishlist">
            <div class="cart-list">

            </div>

            <div class="cart-action">
                <div class="list-items-titles">
                    <div class="items-title">Product</div>
                    <div class="items-remove">Remove</div>
                </div>
                @foreach($wishlists as $wishlist)
                    @php $count = 0; @endphp
                    @if($wishlist->user_id == Auth::user()->id)
                        @php $count = $count + 1 @endphp
                        @foreach($products as $product)
                            @if($wishlist->coffee_id == $product->id)
                                <div class="list-item">
                                    <a href="" class="wishlist-item-img">
                                        <img src="/{{ $product->coffee_image }}" alt="">
                                    </a>
                                    <div class="wishlist-item-desc">
                                        <a href="" class="desc-title">{{ $product->coffee_title }}</a>
                                        <div class="desc-subtitle">{{ $product->grind->title }} / {{ $product->weight->title }}g</div>
                                        <div class="desc-price">$ {{ number_format($product->coffee_price, 2, '.', ' ')  }}</div>
                                    </div>
                                    <div class="wishlist-item-delete">
                                        <a href="{{route('wishlist.destroy', $wishlist->id)}}" class="wishlist-btn">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    @endif
                @endforeach
                @if($count == 0)
                    <p style="margin: 2rem 0;">You wishlist is empty</p>
                @endif
                <div class="btn-box" style="margin: 2rem 0 0 0;">
                    <a href="{{ route('shop.coffees') }}" class="in-shop">Continue shopping</a>
                </div>


            </div>
        </div>

    </div>
@endsection

