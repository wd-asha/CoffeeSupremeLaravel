@extends('layouts.app')
@section('title', 'Coffee Supreme')
@section('content')


<div class="wrapper">
    {{--Slider--}}
    <div class="slider">

        <div class="slide0" id="slide0">
            <img src="{{asset('images/slide1.jpg')}}" alt="">
        </div>

        <div class="slide" id="slide1">
            <img src="{{asset('images/slide1.jpg')}}" alt="">
            <div class="plus-box" id="plusBox1">
                <i class="fa fa-plus"></i>
            </div>
            <div class="note-box" id="noteBox1">
                <h3>Premium Quality Coffee</h3>
                <p>We've been here a while, so you can trust we know our stuff. Roasted fresh and delivered to you fresh. Always</p>
                <a href="coffee.html">
                    Shop Coffee
                </a>
                <div class="close-box" id="closeBox1">
                    <i class="fa fa-plus"></i>
                </div>
            </div>
        </div>

        <div class="slide" id="slide2">
            <img src="{{asset('images/slide2.jpg')}}" alt="">
            <div class="plus-box" id="plusBox2">
                <i class="fa fa-plus"></i>
            </div>
            <div class="note-box" id="noteBox2">
                <h3>Better Packaging</h3>
                <p>Our new paper recyclable packaging means less plastic, more recycling, less landfill</p>
                <a href="#">
                    Read more
                </a>
                <div class="close-box" id="closeBox2">
                    <i class="fa fa-plus"></i>
                </div>
            </div>
        </div>

        <div class="slide" id="slide3">
            <img src="{{asset('images/slide3.jpg')}}" alt="">
            <div class="plus-box" id="plusBox3">
                <i class="fa fa-plus"></i>
            </div>
            <div class="note-box" id="noteBox3">
                <h3>Coffee Subscriptions</h3>
                <p>A Coffee Supreme Coffee Subscription is the easiest way to have fresh coffee arriving in your letterbox</p>
                <a href="#">
                    Set one up
                </a>
                <div class="close-box" id="closeBox3">
                    <i class="fa fa-plus"></i>
                </div>
            </div>
        </div>

        <div class="pagination">
            <div class="pagin pagin-active" id="pagin1"></div>
            <div class="pagin" id="pagin2"></div>
            <div class="pagin" id="pagin3"></div>
        </div>

    </div>
    <div class="main">

        <div class="subscriptLeft">
            <h3>COFFEE SUPREME</h3>
            <p>When we started out in ’93, we roasted coffee for ourselves, pretty much because we were some of the few people around to drink it. Two decades and several waves later, our focus has grown a little broader — our customers, our friends.</p>
            <p>It's tempting to get caught up in the latest and greatest, but we try to remember who we are doing this for and what it is we do best: roasting delicious coffee and creating meaningful coffee experiences for folks who simply love coffee.</p>
            <p>So now we roast coffee for our amazing customers; be they café owners or enthusiastic home brewers — coffee drinkers! And luckily, we still get to drink it too. At the heart of Supreme is people, and the way coffee connects us. Perhaps our core product is not in fact coffee, but instead, what happens over a coffee shared — generous hospitality.</p>
        </div>

        <div class="espresso">
            <a href="{{ route('shop.coffees') }}#espress">
                Shop Espresso Coffee
                <i class="fa fa-arrow-right myfa"></i>
            </a>
            <p>Want something awesome to put through your espresso machine or in your plunger? We roast a range of delicious blends and single origins, which will do the trick.</p>
        </div>

        {{--Espresso--}}
        <div class="espressoContent">
            {{--Swiper--}}
            <div class="swiper mySwiper" style="width: 100%; height: 100%;">
                <div class="swiper-wrapper">
                    @foreach($coffees as $coffee)
                        @if($coffee->category->title === 'Coffee' AND
                        $coffee->brand->title === 'Espresso Blends' AND
                        $coffee->coffee_status === 1 AND
                        $coffee->coffee_home === 1)
                            <div class="swiper-slide">
                                <div class="espresso-item">
                                    <a href="{{ route('shop.coffee-single', $coffee->id) }}">
                                        <div class="espresso-item_img">
                                            <img src="{{ $coffee->coffee_image }}" alt="">
                                        </div>
                                        <h4 class="espresso-item_title">
                                            {{ $coffee->coffee_title }}
                                        </h4>
                                        <p class="espresso-item_text">
                                            {{ $coffee->coffee_taste }}
                                        </p>
                                        <p class="espresso-item_price">
                                            $ {{ number_format($coffee->coffee_price, 2, '.', ',' ) }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            {{--end swiper--}}
        </div>
        {{--end espresso--}}

        <div class="bench">
            <a href="{{ route('shop.coffees') }}#picks">
                Picks Of The Bunch
                <i class="fa fa-arrow-right myfa"></i>
            </a>
            <p>You could say we drink a lot of coffee around here, after all it's part of the job — tough gig huh? We thought we’d share what a few of the team here have been filling their mugs with. Whether it’s a tried and true favourite or a new addition to the menu, you can trust this lot to know a thing or two.</p>
        </div>

        {{--Bench--}}
        <div class="benchContent">
            {{--Swiper--}}
            <div class="swiper mySwiper" style="width: 100%; height: 100%;">
                <div class="swiper-wrapper">
                    @foreach($coffees as $coffee)
                        @if($coffee->category->title === 'Coffee' AND
                        $coffee->brand->title === 'Single Origin Espresso' AND
                        $coffee->coffee_status === 1 AND
                        $coffee->coffee_home === 1)
                            <div class="swiper-slide">
                                <div class="bench-item">
                                    <a href="{{ route('shop.coffee-single', $coffee->id) }}">
                                        <div class="bench-item_img">
                                            <img src="{{ $coffee->coffee_image }}" alt="">
                                        </div>
                                        <h4 class="bench-item_title">
                                            {{ $coffee->coffee_title }}
                                        </h4>
                                        <p class="bench-item_text">
                                            {{ $coffee->coffee_taste }}
                                        </p>
                                        <p class="bench-item_price">
                                            $ {{ number_format($coffee->coffee_price, 2, '.', ',' ) }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            {{--end swiper--}}
        </div>
        {{--end bench--}}

        <div class="filter">
            <a href="{{ route('shop.coffees') }}#filte">
                Shop Filter Coffee
                <i class="fa fa-arrow-right myfa"></i>
            </a>
            <p>Looking for a lighter roast? We have a range of delicious single origin filter coffees perfect for your plunger, AeroPress, pour over, or filter machine.</p>
        </div>
        {{--Filter--}}
        <div class="filterContent">
            {{--Swiper--}}
            <div class="swiper mySwiper" style="width: 100%; height: 100%;">
                <div class="swiper-wrapper">
                    @foreach($coffees as $coffee)
                        @if($coffee->category->title === 'Coffee' AND
                        $coffee->brand->title === 'Single Origin Filter' AND
                        $coffee->coffee_status === 1 AND
                        $coffee->coffee_home === 1)
                            <div class="swiper-slide">
                                <div class="filter-item">
                                    <a href="{{ route('shop.coffee-single', $coffee->id) }}">
                                        <div class="filter-item_img">
                                            <img src="{{ $coffee->coffee_image }}" alt="">
                                        </div>
                                        <h4 class="filter-item_title">
                                            {{ $coffee->coffee_title }}
                                        </h4>
                                        <p class="filter-item_text">
                                            {{ $coffee->coffee_taste }}
                                        </p>
                                        <p class="filter-item_price">
                                            $ {{ number_format($coffee->coffee_price, 2, '.', ',' ) }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            {{--end swiper--}}
        </div>
        {{--end filter--}}

        <div class="equipment">
            <a href="{{ route('shop.equipments') }}">
                Shop All Equipment
                <i class="fa fa-arrow-right myfa"></i>
            </a>
            <p>Looking for something to make great coffee with? We carry a range of equipment to make sure you get the best brews at home, at the office, or in the outdoors.</p>
        </div>

        <div class="equipmentContent">

            {{--Swiper--}}
            <div class="swiper mySwiper" style="width: 100%; height: 100%;">
                <div class="swiper-wrapper">
                    @foreach($equipments as $equipment)
                        @if($equipment->category->title === 'Equipment' AND
                        $equipment->subcategory->title !== 'Filter Papers' AND
                        $equipment->equipment_status === 1 AND
                        $equipment->equipment_home === 1)
                            <div class="swiper-slide">
                                <div class="filter-item">
                                    <a href="{{ route('shop.equipment-single', $equipment->id) }}">
                                        <div class="filter-item_img">
                                            <img src="{{ $equipment->equipment_image }}" alt="">
                                        </div>
                                        <h4 class="filter-item_title">
                                            {{ $equipment->equipment_title }}
                                        </h4>
                                        <p class="filter-item_text">
                                            {{ $equipment->equipment_desc }}
                                        </p>
                                        <p class="filter-item_price">
                                            $ {{ number_format($equipment->equipment_price, 2, '.', ',' ) }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            {{--end swiper--}}
        </div>
        {{--end equipment--}}


        <div class="filters">
            <a href="filter.html">
                Filters
                <i class="fa fa-arrow-right myfa"></i>
            </a>
            <p>Make sure you're stocked up with all the filters you might need to keep making coffee at home.</p>
        </div>

        <div class="filtersContent">
            {{--Swiper--}}
            <div class="swiper mySwiper" style="width: 100%; height: 100%;">
                <div class="swiper-wrapper">
                    @foreach($equipments as $equipment)
                        @if($equipment->category->title === 'Equipment' AND
                        $equipment->subcategory->title === 'Filter Papers' AND
                        $equipment->equipment_status === 1 AND
                        $equipment->equipment_home === 1)
                            <div class="swiper-slide">
                                <div class="filter-item">
                                    <a href="{{ route('shop.equipment-single', $equipment->id) }}">
                                        <div class="filter-item_img">
                                            <img src="{{ $equipment->equipment_image }}" alt="">
                                        </div>
                                        <h4 class="filter-item_title">
                                            {{ $equipment->equipment_title }}
                                        </h4>
                                        <p class="filter-item_text">
                                            {{ $equipment->equipment_desc }}
                                        </p>
                                        <p class="filter-item_price">
                                            $ {{ number_format($equipment->equipment_price, 2, '.', ',' ) }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
            {{--end swiper--}}
        </div>
        {{--end equipment--}}

    </div>

    <div class="latest-posts">
        <div class="allPosts">
            <a href="{{ route('front.journal') }}">
                Jornal
                <i class="fa fa-arrow-right myfa"></i>
            </a>
            <p>Read all posts</p>
        </div>
        <div class="latest">
            <h3>Latest Journal Posts</h3>
            <p>Here’s a taste of the freshest posts from our Journal</p>

        </div>
        <div class="posts">
            @foreach($posts as $post)
            <div class="post">
                <div class="post-img">
                    <img src="../../../../{{ $post->post_image }}" alt="">
                </div>
                <div class="post-content">
                    <a href="{{ route('front.post', $post->id) }}">
                        <h4 class="post-title">{{ $post->post_title }}</h4>
                    </a>
                    <div class="post-text_header">
                        <div class="post-text_header_left">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</div>
                        <div class="post-text_header_right">{{ $post->rubric->rubric_title }}</div>
                    </div>
                    <div class="post-text">
                        @php $txt = mb_substr($post->post_content, 0, 450) @endphp
                        <div>{!! $txt !!}...</div>
                        <a href="{{ route('front.post', $post->id) }}">Read more</a>
                    </div>
                </div>
            </div>
            @endforeach
            {{--<div class="post">
                <a href="Posts/latest-post2.html">
                    <div class="post-img">
                        <img src="{{asset('images/Posts/cake.jpg')}}" alt="">
                    </div>
                    <h4 class="post-title">
                        Coffee, Chocolate & Hazelnut Cake by Clementine Day
                    </h4>
                    <div class="post-text_header">
                        <div class="post-text_header_left">
                            september 23, 2021
                        </div>
                        <div class="post-text_header_right">
                            recipes
                        </div>
                    </div>
                    <p class="post-text">
                        Coffee, Chocolate & Hazelnut Cake by Clementine Day of Some Things I Like To Cook...
                    </p>
                </a>
            </div>
            <div class="post">
                <a href="Posts/latest-post3.html">
                    <div class="post-img">
                        <img src="{{asset('images/Posts/mhf.jpg')}}" alt="">
                    </div>
                    <h4 class="post-title">
                        Our Partnership with the Mental Health Foundation
                    </h4>
                    <div class="post-text_header">
                        <div class="post-text_header_left">
                            september 23, 2021
                        </div>
                        <div class="post-text_header_right">
                            community
                        </div>
                    </div>
                    <p class="post-text">
                        We often say great things happen over a cup of coffee. Sometimes it’s about connecting with a friend or colleague and...
                    </p>
                </a>
            </div>--}}
        </div>

    </div>

    <div class="wholesale">
        <div class="wholesale-left">
            <div class="wholesale-left_content">
                <h3>WHOLESALE</h3>
                <p>In previous lives, lots of the Coffee Supreme team were baristas, cafe owners, dishwashers, furniture designers, there’s even a pro skater in there somewhere. Our collective knowledge covers all you need to know to open a great spot. We're here to help you create great coffee experiences for your customers. Consider us the coffee department of your business</p>
                <a href="{{ route('front.wholesale') }}">get in tauch</a>
            </div>
        </div>
        <div class="wholesale-right">
            <img src="{{asset('images/Wholesale2.jpg')}}" alt="">
        </div>
    </div>

    <div class="up-footer">

        <div class="up-footer_item">
            <a href="#">
                <div class="up-footer_item-img">
                    <img src="{{asset('images/Subscriptions-Homepage.jpg')}}" alt="">
                </div>
                <div class="up-footer_item-text">
                    <h3>Coffee Subscriptions</h3>
                    <p>If you know what you want, and just want it to show up without thinking about. Our subscription service is for you</p>
                </div>
            </a>
        </div>

        <div class="up-footer_item">
            <a href="{{ route('front.wholesale') }}">
                <div class="up-footer_item-img">
                    <img src="{{asset('images/Locations-Homepage.jpg')}}" alt="">
                </div>
                <div class="up-footer_item-text">
                    <h3>Wholesale Products</h3>
                    <p>Don’t get us wrong, we love coffee. But, we also really love the surrounding products that help us to make and enjoy delicious coffee. We’re proud to be able to wholesale a range of quality products</p>
                </div>
            </a>
        </div>

        <div class="up-footer_item">
            <a href="{{ route('front.teams') }}">
                <div class="up-footer_item-img">
                    <img src="{{asset('images/Team-Homepage.jpg')}}" alt="">
                </div>
                <div class="up-footer_item-text">
                    <h3>The Team</h3>
                    <p>We have a stellar bunch of people working with us in New Zealand, Australia, and Japan</p>
                </div>
            </a>
        </div>

    </div>

</div>

@endsection
