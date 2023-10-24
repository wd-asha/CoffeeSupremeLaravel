@extends('layouts.single')
@section('title', 'Coffee Supreme - Coffee')
@section('content')

    <div class="wrapper">

        <div class="breadcrumbs">
            <h6>
                <a href="{{ route('front') }}">Home</a>
                <i class="fas fa-caret-right"></i>
                <a href="{{ route('shop.coffees') }}">All coffees</a>
                <i class="fas fa-caret-right"></i>
                <span>Coffee</span>
            </h6>
        </div>

        <div class="single">
            <div class="imageProduct">
                <img src="../../../../{{ $coffeeSingle->coffee_image }}" alt="">
                @auth
                    @php $d = false; @endphp
                    @foreach($wishlist as $item)
                        @if ( (int)$item->coffee_id == $coffeeSingle->id AND (int)$item->user_id == Auth::user()->id)
                            @php $d = true @endphp
                        @endif
                    @endforeach
                    @if($d == false)
                        <a href="{{ route('favorite', $coffeeSingle->id) }}" class="heart">
                            <i class="fa fa-heart"></i>
                        </a>
                    @endif
                @endauth
            </div>
            <div class="infoProduct">
                <h3>{{ $coffeeSingle->brand->title }}</h3>
                <h2>{{ $coffeeSingle->coffee_title }}</h2>
                <p>{{ $coffeeSingle->coffee_taste }}</p>
                <h4>Grind:</h4>
                <div class="grind">
                    <div class="grind-item @if ($coffeeSingle->grind->title === 'Whole Beans') select-grind @endif">Beans</div>
                    <div class="grind-item @if ($coffeeSingle->grind->title === 'Espresso') select-grind @endif">Espresso</div>
                    <div class="grind-item @if ($coffeeSingle->grind->title === 'Stovetop') select-grind @endif">Stovetop</div>
                    <div class="grind-item @if ($coffeeSingle->grind->title === 'Plunger') select-grind @endif">Plunger</div>
                </div>
                <h4>Weight:</h4>
                <div class="weight">
                    <div class="weight-item @if ($coffeeSingle->weight->title === '150') select-weight @endif">150g</div>
                    <div class="weight-item @if ($coffeeSingle->weight->title === '250') select-weight @endif">250g</div>
                    <div class="weight-item @if ($coffeeSingle->weight->title === '500') select-weight @endif">500g</div>
                    <div class="weight-item @if ($coffeeSingle->weight->title === '1000') select-weight @endif">1000g</div>
                </div>

                @if( $coffeeSingle->amount > 0)
                <h4>Quantity:</h4>
                <div class="quantity">
                    <div class="quantity-item" id="quantity">1</div>
                    <div class="quantity-item" style="opacity: 0; cursor: default;"></div>
                    <div class="quantity-item quantity-has-select">+</div>
                    <div class="quantity-item quantity-has-select">-</div>
                </div>

                <form action="{{route('coffee.addCart', $coffeeSingle->id)}}" method="POST">
                    @csrf
                    <input type="hidden" name="qtyH" id="qtyH" value="1">
                    <input type="hidden" name="weightH" id="weightH" value="{{ $coffeeSingle->weight->title }}">
                    <input type="hidden" name="priceR" id="priceR" value="{{ $coffeeSingle->coffee_price }}">
                    <input type="hidden" name="grindH" id="grindH" value="{{ $coffeeSingle->grind->title }}">

                <div class="btn-box">
                    <button type="submit" class="add-to-cart">$<span id="priceNew">{{ number_format($coffeeSingle->coffee_price, 2, '.', ',' ) }}</span> — add to cart
                    </button>
                    <div id="btnBack"></div>
                </div>
                </form>
                @else
                    <div style="padding: 2rem 0 0 0; color: red; font-size: .9rem;">Product is not yet in stock</div>
                @endif

                <h4 class="info-h4">About this coffee</h4>
                {!! $coffeeSingle->coffee_about !!}

            </div>

            <div class="aboutProduct">
                <h4>Tasting notes</h4>
                <div class="tasting">
                    <div class="tasting-line">
                        <div class="tasting-cell-left">
                            <p>aroma:</p>
                        </div>
                        <div class="tasting-cell-right">
                            <p>{{ $coffeeSingle->coffee_aroma }}</p>
                        </div>
                    </div>
                    <div class="tasting-line">
                        <div class="tasting-cell-left">
                            <p>acidity:</p>
                        </div>
                        <div class="tasting-cell-right">
                            <p>{{ $coffeeSingle->coffee_acidity }}</p>
                        </div>
                    </div>
                    <div class="tasting-line">
                        <div class="tasting-cell-left">
                            <p>body:</p>
                        </div>
                        <div class="tasting-cell-right">
                            <p>{{ $coffeeSingle->coffee_body }}</p>
                        </div>
                    </div>
                    <div class="tasting-line">
                        <div class="tasting-cell-left">
                            <p>finish:</p>
                        </div>
                        <div class="tasting-cell-right">
                            <p>{{ $coffeeSingle->coffee_finish }}</p>
                        </div>
                    </div>
                </div>
                @if($coffeeSingle->brand->title === 'Single Origin Filter')
                    <h4>The Golden Ratio</h4>
                    <div class="tasting">
                        <div class="tasting-line">
                            <div class="tasting-cell-left-not">
                                <p>200ml</p>
                            </div>
                            <div class="tasting-cell-left-not">
                                <p>500ml</p>
                            </div>
                            <div class="tasting-cell-left-not">
                                <p>750ml</p>
                            </div>
                            <div class="tasting-cell-left-not">
                                <p>1l</p>
                            </div>
                        </div>
                        <div class="tasting-line">
                            <div class="tasting-cell-left-not">
                                <p>15g</p>
                            </div>
                            <div class="tasting-cell-left-not">
                                <p>30g</p>
                            </div>
                            <div class="tasting-cell-left-not">
                                <p>45g</p>
                            </div>
                            <div class="tasting-cell-left-not">
                                <p>60g</p>
                            </div>
                        </div>
                        <p class="tasting-p">We recommend a ratio of 60g of freshly ground coffee for every litre of water. This is a good place to start, but you can fine-tune your recipe to suit your taste. You'll find some suggested brewing ratios of hot water to ground coffee for you to use higher</p>
                        <p class="tasting-p">This recipe is a good place to start, but we recommend fine-tuning it to suit your taste and machinery. For other brewing recipes, tips and tricks, check out <a href="https://cdn.shopify.com/s/files/1/0172/5642/files/Coffee_Supreme_Brew_Guide_2023_A4.pdf?v=1695707743" target="_blank">The Coffee Supreme Brew Guide</a>.</p>
                    </div>
                @else
                    <h4>ESPRESSO RECIPE</h4>
                    <div class="tasting">
                        <div class="tasting-line">
                            <div class="tasting-cell-left">
                                <p>dise:</p>
                            </div>
                            <div class="tasting-cell-right">
                                <p>{{ $coffeeSingle->coffee_dise }}g</p>
                            </div>
                        </div>
                        <div class="tasting-line">
                            <div class="tasting-cell-left">
                                <p>BREW TIME:</p>
                            </div>
                            <div class="tasting-cell-right">
                                <p>{{ $coffeeSingle->coffee_time }}sec</p>
                            </div>
                        </div>
                        <div class="tasting-line">
                            <div class="tasting-cell-left">
                                <p>YIELD:</p>
                            </div>
                            <div class="tasting-cell-right">
                                <p>{{ $coffeeSingle->coffee_yield }}g</p>
                            </div>
                        </div>
                        <div class="tasting-line">
                            <div class="tasting-cell-left">
                                <p>TEMP:</p>
                            </div>
                            <div class="tasting-cell-right">
                                <p>{{ $coffeeSingle->coffee_temp }}°C</p>
                            </div>
                        </div>
                        <p class="tasting-p">This recipe is a good place to start, but we recommend fine-tuning it to suit your taste and machinery. For other brewing recipes, tips and tricks, check out <a href="https://cdn.shopify.com/s/files/1/0172/5642/files/Coffee_Supreme_Brew_Guide_2023_A4.pdf?v=1695707743" target="_blank">The Coffee Supreme Brew Guide</a>.</p>
                    </div>
                @endif
                <h4>SHIPPING & DELIVERY</h4>
                <p>We are currently offering free shipping on all orders nationwide. Excludes any order of Boring Milk, which has a flat delivery rate of $6. All going to plan, place your order before 3pm and we'll ship it that day.​ ​Please allow ​an extra ​2-3 days for your delivery to land. Any orders placed after 3pm on Thursday 23rd June will be dispatched after the Matariki long weekend. International Delivery DHL: 1-2 weeks. No Saturday delivery</p>
            </div>
        </div>

    </div>

@endsection
