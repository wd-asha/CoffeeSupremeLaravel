@extends('layouts.wishlist')
@section('title', 'Coffee Supreme - Account')
@section('content')

<div class="wrapper">

    <div class="breadcrumbs">
        <h6>
            <a href="{{ route('front') }}">Home</a>
            <i class="fas fa-caret-right"></i>
            <span>Account</span>
        </h6>
    </div>

    <div class="wishlist-title">
        <h2>Account ( @php echo Auth::user()->name; @endphp )</h2>
    </div>

    <div class="wishlist">
        <div class="account">
            <h4>PERSONAL INFORMATION</h4>
            <form action="{{ route('personal.update') }}" method="post" class="personal-form">
                @csrf
                <div class="input-box">
                    <label for="first_user">Name:</label>
                    <input type="text" name="first_user" id="first_user" placeholder="" value="{{ Auth::user()->name }}">
                </div>
                <div class="input-box">
                    <label for="email_user">Email:</label>
                    <input type="email" name="email_user" id="email_user" placeholder="" value="{{ Auth::user()->email }}">
                </div>
                <div class="input-box">
                    <label for="birt_user">Birthday:</label>
                    <input type="text" name="birt_user" id="birt_user" placeholder="" value="{{ Auth::user()->birthday_user }}">
                </div>
                <div class="form-btn">
                    <button type="submit" class="personal_submit">Save changes</button>
                    <div class="submit-back"></div>
                </div>
            </form>

            <h4>SHIPPING ADDRESS</h4>
            @if($errors->any())
                <div class="alert alert-danger" style="margin-bottom: 1rem; text-align: right;">
                    @foreach($errors->get('shipping_user') as $error)
                        <span style="color:red; font-size: .8rem; padding-bottom: .2rem; display: inline-block"> {{ $error }} </span><br>
                    @endforeach
                    @foreach($errors->get('apartment_user') as $error)
                        <span style="color:red; font-size: .8rem; padding-bottom: .2rem; display: inline-block"> {{ $error }} </span><br>
                    @endforeach
                    @foreach($errors->get('phone_user') as $error)
                        <span style="color:red; font-size: .8rem; padding-bottom: .2rem; display: inline-block"> {{ $error }} </span><br>
                    @endforeach

                </div>
            @endif
            <form action="{{ route('shipping.update') }}" method="post" class="shipping-form">
                @csrf
                <div class="input-box">
                    <label for="shipping_user">Address:</label>
                    <input type="text" name="shipping_user" id="shipping_user" placeholder="" value="{{ Auth::user()->shipping_user }}">
                </div>
                <div class="input-box">
                    <label for="apartment_user">Apartment:</label>
                    <input type="text" name="apartment_user" id="apartment_user" placeholder="" value="{{ Auth::user()->apartment_user }}">
                </div>
                <div class="input-box">
                    <label for="phone_user">Phone:</label>
                    <input type="tel" name="phone_user" id="phone_user" placeholder="" value="{{ Auth::user()->phone_user }}">
                </div>
                <div class="form-btn">
                    <button type="submit" class="shipping_submit">Save changes</button>
                    <div class="submit-back"></div>
                </div>
            </form>

            <h4>CHANGE PASSWORD</h4>
            @if($errors->any())
                <div class="alert alert-danger" style="margin-bottom: 1rem; text-align: right;">
                    @foreach($errors->get('new_pass_user') as $error)
                        <span style="color:red; font-size: .8rem; padding-bottom: .2rem; display: inline-block"> {{ $error }} </span><br>
                    @endforeach
                    @foreach($errors->get('repeat_pass_user') as $error)
                        <span style="color:red; font-size: .8rem; padding-bottom: .2rem; display: inline-block"> {{ $error }} </span><br>
                    @endforeach
                </div>
            @endif
            <form action="{{ route('reset.password') }}" method="post" class="change-form">
                @csrf
                <div class="input-box-change">
                    <label for="email_pass_user">Email:</label>
                    <input type="email" name="email_pass_user" id="email_pass_user" placeholder="" value="{{ Auth::user()->email }}">
                </div>
                <div class="input-box-change">
                    <label for="new_pass_user">Password:</label>
                    <input type="password" name="new_pass_user" id="new_pass_user" placeholder="" value="">
                </div>
                <div class="input-box-change">
                    <label for="repeat_pass_user">Repeat:</label>
                    <input type="password" name="repeat_pass_user" id="repeat_pass_user" placeholder="" value="">
                </div>
                <div class="form-btn_reset">
                    <button type="submit" class="change_submit">Change Password</button>
                    <div class="submit-back"></div>
                </div>
            </form>

            <div class="btn-logout">
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                    <i class="fa fa-power-off"></i><span>&emsp;Logout</span>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>

        <div class="cart-action">
            <h3>MY WISHLIST</h3>
            <div class="list-items-titles">
                <div class="items-title">Product</div>
                <div class="items-remove">Remove</div>
            </div>
            @php $count = 0; @endphp
            @foreach($wishlists as $wishlist)
                @if($wishlist->user_id == Auth::user()->id)
                    @php $count = $count + 1 @endphp
                    @foreach($products as $product)
                        @if($wishlist->coffee_id == $product->id AND $wishlist->equipment_id == NULL)
                            <div class="list-item">
                                <a href="" class="wishlist-item-img">
                                    <img src="/{{ $product->coffee_image }}" alt="">
                                </a>
                                <div class="wishlist-item-desc">
                                    <a href="{{ route('shop.coffee-single', $product->id) }}" class="desc-title">{{ $product->coffee_title }}</a>
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
                    @foreach($things as $thing)
                        @if($wishlist->equipment_id == $thing->id AND $wishlist->coffee_id == NULL)
                            <div class="list-item">
                                <a href="" class="wishlist-item-img">
                                    <img src="/{{ $thing->equipment_image }}" alt="">
                                </a>
                                <div class="wishlist-item-desc">
                                    <a href="{{ route('shop.equipment-single', $thing->id) }}" class="desc-title">{{ $thing->equipment_title }}</a>
                                    <div class="desc-price">$ {{ number_format($thing->equipment_price, 2, '.', ' ')  }}</div>
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
            @if($count === 0)
                <p style="margin: 2rem 0;">You wishlist is empty</p>
            @endif
            <div class="btn-box" style="margin: 2rem 0 4rem 0;">
                <a href="{{ route('shop.coffees') }}" class="in-shop">In shop</a>
                @if($flag)
                    @php
                        $subscriber = 0;
                        foreach($subscribers as $item) {
                            $subscriber = $item->id;
                        }
                    @endphp
                    <a href="{{ route('shop.unsubscribe', $subscriber) }}" class="in-shop">Unsubscribe</a>
                @else
                    <a href="{{ route('shop.subscribe') }}" class="in-shop">Subscribe</a>
                @endif
                @if(Auth::user()->name === 'Admin')
                    <a href="{{ route('admin.index') }}" class="in-shop">Dashboard</a>
                @endif
            </div>

            <h3>MY ORDERS</h3>
            <div class="list-items-titles">
                <div class="orders-title"></div>
                <div class="orders-title">Total</div>
                <div class="orders-title">Date</div>
                <div class="orders-title">status</div>
            </div>
            @foreach($orders as $order)
                @if( (int)$order->user_id == Auth::user()->id )
                    <div class="list-item">
                        <div class="order-item">
                            # {{ $order->id }}
                        </div>
                        <div class="order-item">
                            $ {{ $order->order_total }}
                        </div>
                        <div class="order-item">
                            {{ $order->created_at }}
                        </div>
                        <div class="order-item">
                            @if( $order->order_status == 0 )
                                <div class="order-item-status">pending</div>
                            @endif
                            @if( $order->order_status == 1 )
                             <div class="order-item-status">processing</div>
                            @endif
                            @if( $order->order_status == 2 )
                             <div class="order-item-status">delivering</div>
                            @endif
                            @if( $order->order_status == 3 )
                             <div class="order-item-status">completed</div>
                            @endif

                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>

</div>

@endsection

