@extends('layouts.cart')
@section('title', 'Coffee Supreme - Cart')
@section('content')

<div class="wrapper">

    <div class="breadcrumbs">
        <h6>
            <a href="{{ route('front') }}">Home</a>
            <i class="fas fa-caret-right"></i>
            <span>Cart</span>
        </h6>
    </div>

    <h2>Cart</h2>

    <div class="cart">
        <div class="cart-list">
            <h4>Product List</h4>
            <div class="list-items-titles">
                <div class="items-title">Product</div>
                <div class="items-qty">QTY</div>
                <div class="items-sub">Subtotal</div>
                @auth <div class="items-sub">Wishlist</div> @endauth
                <div class="items-remove">Remove</div>
            </div>
            @foreach($cartItems as $cartItem)
                <form action="{{route('cart.update')}}" method="POST">
                    @csrf
                    <div class="list-item">
                        <a href="" class="list-item-img">
                            <img src="{{ $cartItem->options->image }}" alt="">
                        </a>
                    <div class="list-item-desc">
                        <a href="" class="desc-title">{{ $cartItem->name }} ({{ $cartItem->qty }}
                            @if($cartItem->qty === '1') <span class="cart-span">pack</span>)
                                @else <span class="cart-span">packs<span>)
                            @endif
                        </a>
                        <div class="desc-subtitle">{{ $cartItem->options->grind }} / {{ $cartItem->weight }}g</div>
                        <div class="desc-price">$ {{ $cartItem->price(2, '.', ' ' ) }}</div>
                    </div>
                    <input type="hidden" name="rowId" value="{{ $cartItem->rowId }}">
                    <div class="quantity">
                        <input type="text" name="qty" value="{{ $cartItem->qty }}" class="quantity-item">
                        <div class="quantity-item quantity-has-select">+</div>
                        <div class="quantity-item quantity-has-select">-</div>
                    </div>
                    <button type="submit" class="recalc" name="submit">update</button>
                    <div class="list-item-subtotal"><span> {{ $cartItem->subtotal(2, '.', ',' ) }}</span></div>

                    @auth
                        <div class="list-item-delete">
                            <a href="">
                                <i class="fas fa-heart"></i>
                            </a>
                        </div>
                    @endauth

                    <div class="list-item-delete">
                        <a href="{{route('cart.delete', $cartItem->rowId)}}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>

                </fprm>
            @endforeach
            <div class="discount">
                <input type="text" class="discount_input" placeholder="Discount code or gift cart">
                <a href="#" class="discount_btn">Apply
                    <div class="discount_back"></div>
                </a>
            </div>
            <div class="policys">
                <a href="" class="policy">Refund policy</a>
                <a href="" class="policy">Privacy policy</a>
                <a href="" class="policy">Term of service</a>
                <a href="" class="policy">Subscription policy</a>
            </div>
        </div>
        <div class="cart-action">
            <h4 class="center">Express checkout</h4>
            <div class="express_images">
                <div class="express">
                    <img src="{{asset('../../images/shop-pay.jpg')}}">
                </div>
                <div class="express">
                    <img src="{{asset('../../images/pay-pal.png')}}">
                </div>
                <div class="express">
                    <img src="{{asset('../../images/g-pay.png')}}">
                </div>
            </div>
            <div class="center separator">
                <div>&mdash;&mdash;&mdash;&mdash;&mdash;</div>
                <div>&emsp;OR&emsp;</div>
                <div>&mdash;&mdash;&mdash;&mdash;&mdash;</div>
            </div>
            <h4>Shipping address</h4>
            <form action="" method="" name="form-address">
                @csrf
                <div class="inputs-address">
                    <input type="text" name="address" class="input-address" placeholder="Address">
                    <input type="text" name="apartment" class="input-address" placeholder="Apartment, suite, etc. (optional)">
                    <input type="email" name="email" class="input-address" placeholder="Email">
                    <input type="tel" name="phone" class="input-address" placeholder="Phone (optional)">
                </div>
                <h4>Add a note to your order</h4>
                <label for="mess"></label>
                <textarea rows="3" id="mess"></textarea>
                <div class="order-summary">
                    <p>grand total:&emsp;&emsp;</p>
                    <p><span class="total" id="total">{{ Cart::total() }}</span></p>
                </div>
                <div class="btn-box">
                    <a href="{{ route('shop.coffees') }}" class="in-shop">Continue shopping</a>
                    <button type="submit" name="submit" class="btn-checkout">Checkout</button>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection

