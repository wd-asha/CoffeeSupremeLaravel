@extends('layouts.contacts')
@section('title', 'Coffee Supreme - Coffee for Office')
@section('content')

    <div class="wrapper">

        <div class="breadcrumbs">
            <h6>
                <a href="{{ route('front') }}">Home</a>
                <i class="fas fa-caret-right"></i>
                <span>Coffee For The Office</span>
            </h6>
        </div>

        <h2>Coffee For The Office</h2>

        <div class="office">
            <div class="office-text">
                <p>It's a Coffee Supreme service that lets us share the way we do coffee in our own office</p>
                <p>Powered by our delicious coffee and the brilliant filter machines by our friends at Moccamaster, Coffee For The Office is an annual subscription where the coffee arrives every Monday morning</p>
                <p>In a nutshell, we’ll deliver everything you need to brew the best coffee for you and your colleagues. We’ll invoice your business for the coffee and we’ll cover the Moccamaster and the other bits. Depending on the size of your team and the frequency of meetings and visitors, we’ll tailor the size of your coffee order to ensure the coffee keeps flowing. The minimum order is 1kg per week</p>
                <p>We know that coffee isn’t meant to be hard. Instead, it should be delicious, shareable and readily available</p>
                <p>So be like Coffee Supreme — drink filter. It’s like water, but cooler</p>
                <p>To find out more about our Coffee For The Office package, give us a bell or drop us a line. To make sure we can work out the best deal for you, be sure to let us know:</p>
                <ul>
                    <li>How many coffee drinkers there are in your office</li>
                    <li>The rough layout of your office — is there more than one floor? A couple of staff rooms? Multiple locations?</li>
                    <li>Do you host meetings? If so, roughly how many per week?</li>
                </ul>
                <p>If you’re not quite sure, or you’ll need to twist the boss’ arm, don’t be shy — we can exchange lengthy emails about ROI and Cost/Benefit analysis</p>
                <p>Contact details:<br>
                    0800 937 627<br>
                    fortheoffice@coffeesupreme.com</p>
            </div>
            <div class="office-img">
                <img src="images/office.jpg" alt="">
            </div>
        </div>

    </div>

@endsection
