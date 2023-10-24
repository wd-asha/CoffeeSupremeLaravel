@extends('layouts.locations')
@section('title', 'Coffee Supreme - Locations')
@section('content')

    <div class="wrapper">

        <div class="breadcrumbs">
            <h6>
                <a href="{{ route('front') }}">Home</a>
                <i class="fas fa-caret-right"></i>
                <span>Locations</span>
            </h6>
        </div>

        <h2>Our Locations</h2>

        <div class="locations">
            <div class="locations-menu">
                <div class="locations-list">
                    <div class="location active" id="location1">
                        <h3>Tokyo</h3>
                        <p>Japan</p>
                    </div>
                    <div class="location" id="location2">
                        <h3>Wellington</h3>
                        <p>New Zealand</p>
                    </div>
                    <div class="location" id="location3">
                        <h3>Melbourne</h3>
                        <p>Australia</p>
                    </div>
                    <div class="location" id="location4">
                        <h3>Christchurch</h3>
                        <p>New Zealand</p>
                    </div>
                    <div class="location" id="location5">
                        <h3>Brisbane</h3>
                        <p>Australia</p>
                    </div>
                    <div class="location" id="location6">
                        <h3>Auckland</h3>
                        <p>New Zealand</p>
                    </div>

                </div>

            </div>
            <div class="locations-texts">
                <div class="locations-text" id="locationsText1">
                    <h4>Tsujido</h4>
                    <p>Roastery & Cafe</p>
                    <p>Japan, 〒251-0047 Kanagawa, Fujisawa, Tsujido,<br>
                        1 Chome−16−20 B</p>
                    <p>Mon – Sun | 9am – 5pm</p>
                </div>

                <div class="locations-text" id="locationsText2">
                    <h4>MIDLAND PARK</h4>
                    <p>Cafe & Retail Store</p>
                    <p>31 Waring Taylor Street<br>
                        Wellington CBD</p>
                    <p>7:30am - 4pm | Mon - Fri</p>
                </div>

                <div class="locations-text" id="locationsText3">
                    <h4>Abbotsford Cafe & Roastery</h4>
                    <p>The works – Cafe, Retails, Roastery, and Offices</p>
                    <p>28-36 Grosvenor Street<br>
                        Abbotsford, Melbourne<br>
                        Australia</p>
                    <p>7:30am - 3:00pm | Mon - Fri<br>
                        8:00am - 3:00pm | Sat<br>
                        9:00am - 3:00on | Sun</p>
                </div>

                <div class="locations-text" id="locationsText4">
                    <h4>Coffee Supreme Christchurch</h4>
                    <p>Cafe & Retail</p>
                    <p>10 Welles Street<br>
                        Christchurch<br>
                        New Zealand</p>
                    <p>7:00am – 2:00pm | Mon – Fri<br>
                        8:00am – 2:00pm | Sat & Sun</p>
                </div>

                <div class="locations-text" id="locationsText5">
                    <h4>Brisbane Roastery</h4>
                    <p>Roastery & Offices<br>
                        Casual visits welcome</p>
                    <p>27 Balaclava St<br>
                        Woolloongabba<br>
                        Brisbane 4102
                    </p>
                </div>

                <div class="locations-text" id="locationsText6">
                    <h4>Great North Road</h4>
                    <p>Wholesale Offices<br>
                        Retail not available</p>
                    <p>376 Great North Road<br>
                        Grey Lynn<br>
                        Auckland<br>
                        New Zealand
                    </p>
                </div>
            </div>
            <div class="locations-img">
                <img src="images/locations/Tsujido.jpg" id="locationsImg1" alt="">
                <img src="images/locations/Midland-Park.jpg" id="locationsImg2" alt="">
                <img src="images/locations/Abbotsford.jpg" id="locationsImg3" alt="">
                <img src="images/locations/STC.jpg" id="locationsImg4" alt="">
                <img src="images/locations/Customs.jpg" id="locationsImg5" alt="">
                <img src="images/locations/Chairs.jpg" id="locationsImg6" alt="">
            </div>
        </div>

    </div>

@endsection
