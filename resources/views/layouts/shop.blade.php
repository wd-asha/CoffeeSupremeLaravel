<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('fontawesome/all.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/menu.css')}}">
    <link rel="stylesheet" href="{{asset('css/coffee.css')}}">
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
    <link rel="stylesheet" href="{{ asset('css/toastr.css')}}">
</head>
<body>

<div id="overlay"></div>
<div id="overlaySearch">
    <div id="searchClose">
        <i class="fas fa-times"></i>
    </div>
    <label for="search"></label>
    <input type="search" placeholder="Start typing here..." id="search">
</div>

<div class="header-bg">
    @php $carts = Cart::content(); @endphp
    <div id="cartBox">
        <div class="cart-header">
            <div class="cart-title">Cart</div>
            <i class="fas fa-times cart-close" id="cartClose"></i>
        </div>

        @if(Cart::count() !== 0)
            <div class="cart-body">
                @foreach($carts as $cart)
                    <div class="cart-product">
                        <div class="product-img">
                            <img src="/{{ $cart->options->image }}" alt="">
                        </div>
                        <div class="product-desc">
                            <div class="product-name">{{ $cart->name }} ({{ $cart->qty }}
                                <span>
                                @if ($cart->qty === "1") pc.
                                    @else pcs.
                                    @endif
                            </span>)
                            </div>
                            <div class="product-options">{{ $cart->options->grind }} / {{ $cart->weight }}g</div>

                            <div class="product-price">$ {{ number_format($cart->price, 2, '.', ',' ) }}</div>
                        </div>
                        <div class="product-delete">
                            <a href="{{route('cart.delete', $cart->rowId)}}" class="btn btn-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="total-box">
                <div class="grand-total">Grand Total</div>
                <div class="sum-total">$ {{ Cart::priceTotal() }}</div>
            </div>
            <div class="btn-box-cart">
                <a href="{{ route('cart') }}" class="btn-cart">To Cart</a>
            </div>

        @else
            <div class="total-box">
                <div class="total-text">Your Cart is empty</div>
            </div>
        @endif
    </div>

    <header class="header" id="header">
        <div class="header_logo">
            <img src="{{asset('images/Coffee-Supreme-Logo.jpg')}}" alt="">
        </div>
        <div class="header_nav">
            <div class="nav_menuItem-shop" id="shop">
                <a href="#">Shop</a>
            </div>
            <div class="nav_menuItem-subscriptions">
                <a href="{{ route('front.ourpurpose') }}">Our purpose</a>
            </div>
            <div class="nav_menuItem-wholesale">
                <a href="{{ route('front.keeping') }}">Keeping Coffee</a>
            </div>
            <div class="nav_menuItem-search" id="searchMenu">
                <a href="#">
                    <i class="fa fa-search"></i>
                </a>
            </div>
            <div class="nav_menuItem-user">
                @guest
                    <a href="{{ route('login') }}">
                        <i class="fa fa-user"></i>
                    </a>
                @endguest
                @auth
                    <a href="{{ route('wishlist') }}">
                        <i class="fa fa-user-check"></i>
                    </a>
                @endauth
            </div>
            <div class="nav_menuItem-basket" id="basket">
                <a href="#">
                    <i class="fa fa-shopping-bag"></i>
                    <div class="bag-count">{{ Cart::count() }}</div>
                </a>
            </div>
            <div class="nav_menuItem-locations">
                <a href="{{ route('front.locations') }}">Locations</a>
            </div>
            <div class="nav_menuItem-news">
                <a href="{{ route('front.journal') }}">Journal</a>
            </div>
            <div class="nav_menuItem-careers">
                <a href="{{ route('front.teams') }}">Our Team</a>
            </div>
            <div class="nav_menuItem-contacts">
                <a href="{{ route('contacts') }}">Contacts</a>
            </div>
        </div>

        <div class="menu-panel" id="menuPanel">
            <div class="menu-panel_item" id="menuPanelCoffee">
                <a href="">
                    <span>Coffee</span>
                    <i class="fa fa-arrow-right myfa"></i>
                </a>
            </div>
            <div class="menu-panel_item" id="menuPanelEquipment">
                <a href="">
                    <span>Equipment</span>
                    <i class="fa fa-arrow-right myfa"></i>
                </a>
            </div>
            <div class="menu-panel_item" id="menuPanelMerchandise">
                <a href="{{ route('shop.merchandise') }}">
                    <span>Merchandise</span>
                </a>
            </div>
            <div class="menu-panel_item" id="menuPanelPantry">
                <a href="{{ route('shop.pantries') }}">
                    <span>Pantry</span>
                </a>
            </div>
            <i class="fa fa-arrow-left back"></i>
        </div>

        <div class="equipment-panel" id="equipmentPanel">
            <div class="equipment-panel_item">
                <a href="{{ route('shop.equipments') }}"><span>View&nbsp;all&nbsp;Equipment</span></a>
                <p>Brew&nbsp;Gear & Accessories</p>
                @foreach($subcategories as $subcategory)
                    <a href="{{ route('shop.equipments') }}">{{ $subcategory->title }}</a>
                @endforeach
            </div>
        </div>

        <div class="coffee-panel" id="coffeePanel">
            <div class="coffee-panel_item">
                <a href="{{ route('shop.coffees') }}"><span>View&nbsp;all&nbsp;coffee</span></a>
                <p>Espresso&nbsp;Blends</p>
                @foreach($coffees as $coffee)
                    @if(($coffee->brand->title === 'Espresso Blends') AND ($coffee->coffee_status === 1))
                        <a href="{{ route('shop.coffee-single', $coffee->id) }}">{{ $coffee->coffee_title }}</a>
                    @endif
                @endforeach
                <p>Single&nbsp;Origin&nbsp;Espresso</p>
                @foreach($coffees as $coffee)
                    @if(($coffee->brand->title === 'Single Origin Espresso') AND ($coffee->coffee_status === 1))
                        <a href="{{ route('shop.coffee-single', $coffee->id) }}">{{ $coffee->coffee_title }}</a>
                    @endif
                @endforeach
                <p>Single&nbsp;Origin&nbsp;Filter</p>
                @foreach($coffees as $coffee)
                    @if(($coffee->brand->title === 'Single Origin Filter') AND ($coffee->coffee_status === 1))
                        <a href="{{ route('shop.coffee-single', $coffee->id) }}">{{ $coffee->coffee_title }}</a>
                    @endif
                @endforeach
                <p>Gift&nbsp;Bags</p>
                <a href="#">Gift&nbsp;Bags&nbsp;Espresso</a>
                <a href="single/thank.html">Gift&nbsp;Bags&nbsp;Filter</a>
            </div>
        </div>

    </header>
</div>

@yield('content')

<div class="bg-footer">
    <footer class="down-footer">
        <div class="footer-item">
            <h3>Shop</h3>
            <a href={{ route('shop.coffees') }}>Coffee</a>
            <a href="{{ route('front.ourpurpose') }}">Our purpose</a>
            <a href="{{ route('shop.equipments') }}">Equipment</a>
            <a href="{{ route('front.office') }}">Coffee For The Office</a>
            <a href="https://cdn.shopify.com/s/files/1/0172/5642/files/Coffee_Supreme_Brew_Guide_2023_A4.pdf?v=1695707743">Brew Guide</a>
        </div>
        <div class="footer-item">
            <h3>About As</h3>
            <a href="{{ route('front.teams') }}">Our Team</a>
            <a href="{{ route('front.history') }}">Our History</a>
            <a href="{{ route('front.carriers') }}">Carriers</a>
            <a href="{{ route('front.journal') }}">Journal</a>
            <a href="{{ route('front.delivery') }}">Shipping & Delivery</a>
        </div>
        <div class="footer-item">
            <h3>Contacts</h3>
            <a href="{{ route('contacts') }}">Contact Us</a>
            <a href="{{ route('front.help') }}">FAQ & Returns</a>
            <a href="{{ route('front.policy') }}">Privacy Policy</a>
            <a href="https://cdn.shopify.com/s/files/1/0172/5642/files/Coffee_Supreme_Sustainability_Report.pdf?v=1596674498">Sustainability Report</a>
            <a href="{{ route('front.wholesale') }}">Wholesale</a>
        </div>
        <div class="footer-item">
            <span>© 2021 COFFEE SUPREME LIMITED</span>
            <p>We are an independent coffee roaster supplying cafes, homes and offices all across New Zealand and Australia</p>
            <p>0800 937 627</p>
            <p>shopnz@coffeesupreme.com</p>
        </div>
    </footer>
    <div class="copyRight">
        <a href="http://wd-asha.ru">wd-asha.ru</a>
    </div>
</div>

<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/fontawesome.js')}}"></script>
<script src="{{asset('js/menu.js')}}"></script>
<script src="{{asset('js/picks.js')}}"></script>

<script src="{{ asset('js/sweetalert.min.js')}}"></script>
<script src="{{ asset('js/toastr.min.js')}}"></script>

<script>
            @if(Session::has('message'))
    let type="{{Session::get('alert-type','info')}}";
    switch(type){
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
    }
    @endif
</script>

</body>
</html>
