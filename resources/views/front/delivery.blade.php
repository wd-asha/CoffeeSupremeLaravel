@extends('layouts.contacts')
@section('title', 'Coffee Supreme - Shipping & Delivery')
@section('content')

    <div class="wrapper">

        <div class="breadcrumbs">
            <h6>
                <a href="{{ route('front') }}">Home</a>
                <i class="fas fa-caret-right"></i>
                <span>Shipping & Delivery</span>
            </h6>
        </div>

        <h2>Shipping & Delivery</h2>

        <div class="office">
            <div class="office-text">
                <p>We are currently offering free shipping on all orders nationwide</p>
                <p>Excludes any order of Boring Milk, which has a flat delivery rate of $6 per box</p>
                <p>All going to plan, place your order before 3pm and we'll ship it that day.​ ​Please allow ​an extra ​3-4 days for your delivery to land</p>
                <p>International Delivery DHL: 1 - 2 weeks</p>
                <p>No Saturday delivery</p>
                <p>International shipping costs are calculated automatically at checkout. We ship via DHL Express to offer you the safest and fastest service. It's not the cheapest, but we reckon it's the best in terms of ensuring your package gets to you in good time.</p>
                <p>Please include a phone number with international orders</p>
            </div>
            <div class="office-img">
                <img src="images/delivery.jpg" alt="">
            </div>
        </div>

    </div>

@endsection
