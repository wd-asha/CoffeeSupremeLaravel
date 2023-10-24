@extends('layouts.wholesale')
@section('title', 'Coffee Supreme - wholesale')
@section('content')

    <div class="wrapper">

        <div class="breadcrumbs">
            <h6>
                <a href="{{ route('front') }}">Home</a>
                <i class="fas fa-caret-right"></i>
                <span>Wholesale</span>
            </h6>
        </div>

        <div class="wholesale">
            <div class="wholesale-img">
                <img src="{{asset('images/wholesale.jpg')}}" alt="">
            </div>
            <div class="wholesale-text">
                <h4>Wholesale Enquires</h4>
                <p>If you're looking to partner with a roaster you can work well with to build your coffee business, you found us. We've been eating coffee for breakfast since the 90s, and we've learned a bunch of things since then that could be really helpful. And we're not just talking about keyboard shortcuts on your Nokia 5110</p>
                <p>We like to think of ourselves as the coffee department of successful cafes</p>
                <p>Collaborating with good, like-minded folks is something we love here at Supreme - whether it's with people who grow coffee, people who make it, or people who simply love to drink it. We reckon that keeping good company is one of the key things to building a decent business</p>
                <p>Simply fill in the enquiry form below to show you're keen</p>
                <p>If you've got a cafe in Japan that would really benefit from the years of experience we've amassed in New Zealand and Australia, get in touch with us</p>
            </div>
            <div class="wholesale-form">
                <h2>Wholesale Enquiry</h2>
                <form method="post" action="">
                    <div class="form-control">
                        <label for="name"></label>
                        <input type="text" placeholder="Name" id="name">
                    </div>
                    <div class="form-control">
                        <label for="cafeName"></label>
                        <input type="text" placeholder="Cafe Name" id="cafeName">
                    </div>
                    <div class="form-control">
                        <label for="email"></label>
                        <input type="email" placeholder="E-mail" id="email">
                    </div>
                    <div class="form-control">
                        <label for="phone"></label>
                        <input type="text" placeholder="Phone" id="phone">
                    </div>
                    <div class="btn-box">
                        <a href="#" type="submit" class="submit_btn">Submit</a>
                        <div id="btnBack"></div>
                    </div>
                </form>
            </div>
        </div>

    </div>

@endsection