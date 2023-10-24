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
            <div class="list-items-titles">
                <div class="items-title">Product</div>
                <div class="items-qty">QTY</div>
                <div class="items-sub">Subtotal</div>
                <div class="items-remove">Remove</div>
                @auth <div class="items-sub">Wishlist</div> @endauth
            </div>

            @foreach($cartItems as $cartItem)
                <div class="cartItem-box">
                <form action="{{route('cart.update')}}" method="POST" name="form-update">
                    @csrf
                    <div class="list-item">
                        <a href="" class="list-item-img">
                            <img src="{{ $cartItem->options->image }}" alt="">
                        </a>
                        <div class="list-item-desc">
                            <a href="" class="desc-title">{{ $cartItem->name }} ({{ $cartItem->qty }}
                                @if($cartItem->qty === '1') <span class="cart-span">pc.</span>)
                                @else <span class="cart-span">pcs.</span>)
                                    @endif
                            </a>
                            @if($cartItem->weight != 0)
                            <div class="desc-subtitle">{{ $cartItem->options->grind }} / {{ $cartItem->weight }}g</div>
                            @endif
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

                        <div class="list-item-delete">
                            <a href="{{route('cart.delete', $cartItem->rowId)}}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                </form>
                @auth
                    <div class="list-item-wishlist">
                        <a href="{{ route('favorite', $cartItem->id) }}" class="wishlist-btn">
                            <i class="fas fa-heart"></i>
                        </a>
                    </div>
                @endauth
                </div>
            @endforeach

            <div class="under-cart-list">
                <div class="policys">
                    <a href="" class="policy">Refund policy</a>
                    <a href="" class="policy">Privacy policy</a>
                    <a href="" class="policy">Term of service</a>
                    <a href="" class="policy">Subscription policy</a>
                </div>
                <div class="discount">
                    <input type="text" class="discount_input" placeholder="Discount code or gift cart">
                    <a href="#" class="discount_btn">Apply
                        <div class="discount_back"></div>
                    </a>
                </div>
            </div>

            <div class="under-cart">
                <img src="../../images/undercart.jpg">
            </div>
        </div>

        <div class="cart-action">

            <h4 class="center">Express checkout</h4>
            <div class="express_images">
                <div class="express">
                    <img src="{{asset('../../images/shop-pay.jpg')}}" alt="">
                </div>
                <div class="express">
                    <img src="{{asset('../../images/pay-pal.png')}}" alt="">
                </div>
                <div class="express">
                    <img src="{{asset('../../images/g-pay.png')}}" alt="">
                </div>
            </div>
            <div class="center separator">
                <div>&mdash;&mdash;&mdash;&mdash;&mdash;</div>
                <div>&emsp;OR&emsp;</div>
                <div>&mdash;&mdash;&mdash;&mdash;&mdash;</div>
            </div>

            <h4 class="center">Payment credit cart</h4>

            <div class="credit-card">
                <div class="credit-image-list">
                    <img src="../../images/visa.svg">
                    <img src="../../images/master.svg">
                    <img src="../../images/amex.svg">
                    <img src="../../images/union.svg">
                </div>
                <form action="" method="" name="credit-form" class="credit-form">
                    <input type="text" class="credit-input" name="credit_number" placeholder="Card Number">
                    <div class="credit-box">
                        <div class="credit-month">
                            <span class="credit-span"> Month</span>
                            <input type="text" class="credit-input" placeholder="MM">
                        </div>
                        <div class="credit-month">
                            <span class="credit-span"> Year</span>
                            <input type="text" class="credit-input" placeholder="YY">
                        </div>
                        <div class="credit-month">
                            <span class="credit-span"> CCV</span>
                            <input type="text" class="credit-input">
                        </div>
                        <div class="credit-image">
                            <img src="../../images/card.png">
                        </div>
                    </div>
                    <input type="text" class="credit-input" name="credit_name" placeholder="Name on the Card">
                    <div class="credit-btn-box">
                        <button type="submit" name="submit" class="btn-checkout">pay now</button>
                    </div>
                </form>
            </div>

            <div class="center separator">
                <div>&mdash;&mdash;&mdash;&mdash;&mdash;</div>
                <div>&emsp;OR&emsp;</div>
                <div>&mdash;&mdash;&mdash;&mdash;&mdash;</div>
            </div>

            <h4>Shipping address</h4>
            <form action="{{ route('check') }}" method="POST" name="form-checkout">
                @csrf
                <div class="inputs-address">
                    @auth
                        <input type="text" name="delivery" class="input-address" placeholder="Address" value="{{ Auth::user()->shipping_user }}">
                        <input type="text" name="apartment" class="input-address" placeholder="Apartment, suite, etc. (optional)" value="{{ Auth::user()->apartment_user }}">
                        <input type="email" name="email" class="input-address" placeholder="Email" value="{{ Auth::user()->email }}">
                        <input type="tel" name="phone" class="input-address" placeholder="Phone (optional)" value="{{ Auth::user()->phone_user }}">
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <input type="hidden" name="user_name" value="{{ Auth::user()->name }}">
                    @endauth
                    @guest
                        <input type="text" name="delivery" class="input-address" placeholder="Address" value="">
                        <input type="text" name="apartment" class="input-address" placeholder="Apartment, suite, etc. (optional)" value="">
                        <input type="email" name="email" class="input-address" placeholder="Email" value="">
                        <input type="tel" name="phone" class="input-address" placeholder="Phone (optional)" value="">
                        <input type="hidden" name="user_id" value="0">
                        <input type="hidden" name="user_name" value="noname">
                    @endguest
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
                    <button type="submit" name="submit" class="btn-checkout">Order</button>
                </div>
            </form>

        </div>
    </div>

</div>

@endsection

