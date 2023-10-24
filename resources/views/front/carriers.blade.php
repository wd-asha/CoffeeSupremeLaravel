@extends('layouts.carrers')
@section('title', 'Coffee Supreme - Carrers')
@section('content')

    <div class="wrapper">

        <div class="breadcrumbs">
            <h6>
                <a href="{{ route('front') }}">Home</a>
                <i class="fas fa-caret-right"></i>
                <span>Careers</span>
            </h6>
        </div>

        <h2>Carrers</h2>

        <div class="careers">
            <div class="work">
                <h4>Work with us</h4>
                <p>The Coffee Supreme team is a motivated crew of professionals striving for excellence in all things coffee and hospitality. From sourcing and roasting the best coffees, to supplying and operating exceptional hospitality sites, we’re all in on being the best in the business</p>
                <p>With teams in major cities throughout Australasia and Japan, we’re always on the lookout for talented and committed people who want a meaningful career in a multi-faceted and exciting industry. You can even meet a bunch of our people on the Team page</p>
                <img src="{{asset('images/carriera.jpg')}}" alt="">
            </div>
            <div class="role">
                <h4>About the role</h4>
                <p>The order fulfilment team plays a crucial role in the delivery of our mission of Better Coffee for All</p>
                <ul>
                    <li>Our cafe customers rely on us to get their orders to them safely and on time so that they can look after their own customers</li>
                    <li>Our at home customers also rely on us to get their orders to them so that they can enjoy a delicious cuppa without having to leave home</li>
                    <li>The CS team relies on us to deliver the amazing service that we have promised to our customers, building trust in our brand and maximising customer retention</li>
                </ul>
                <p>As a member of the order fulfilment team you will pick, prepare, package and despatch or deliver customer orders accurately and efficiently, and handle all customer contact in a professional and helpful manner in accordance with our values and mission</p>
                <p>It requires a very strong attention to detail as we have a wide variety of products and each customer has specific requirements. It's also a very busy department, so you'll need to be able to work quickly and efficiently to meet deadlines</p>
                <p>It's a full time salaried position (40 hours per week). The ordinary hours of work are 7.30am to 4.00pm Mondays to Fridays</p>
                <div class="btn-box">
                    <a class="product_btn">Apply Now
                        <div class="product_btn_back"></div>
                    </a>
                </div>
            </div>
            <div class="person">
                <h4>About the person</h4>
                <p>Our team vibe is fast paced, but fun!  If you work hard, move quickly, have a high attention to detail, and don't take yourself too seriously, you'll be a great fit</p>
                <p>As someone who sees our customers on a daily basis you'll also need to have great customer service skills</p>
                <p>Key skills required:</p>
                <ul>
                    <li>Physically strong and fit</li>
                    <li>Excellent customer service skills</li>
                    <li>Attention to detail</li>
                    <li>Strong communication skills</li>
                    <li>Ability to hustle and work to deadlines</li>
                    <li>High energy</li>
                    <li>Hospitality experience an advantage</li>
                    <li>Forklift licence an advantage</li>
                    <li>Full or restricted driver's licence an advantage (and ideally can drive a manual transmission)</li>
                </ul>
                <p>Click "Apply Now" or email your CV and a cover letter telling us a bit about yourself and why you'd be a great fit at Coffee Supreme to izzy@coffeesupreme.com.</p>
                <p>A full job description is available, so let us know if you're interested - come join our team</p>
            </div>
        </div>

    </div>

@endsection