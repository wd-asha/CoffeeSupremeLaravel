@extends('layouts.keeping')
@section('title', 'Coffee Supreme - Keeping Coffee')
@section('content')

<div class="wrapper">

    <div class="breadcrumbs">
        <h6>
            <a href="{{ route('front') }}">Home</a>
            <i class="fas fa-caret-right"></i>
            <span>Keeping Coffee</span>
        </h6>
    </div>


    <h2>Keeping Coffee</h2>
    <div class="main-splide">

        <div class="splide" role="group" aria-label="Splide Basic HTML Example">
            <div class="splide__track">
                <ul class="splide__list">
                    <li class="splide__slide">
                        <img src="images/keeping/Purpose_Desktop.jpg" alt="">
                        <div class="slide__text">
                            <div class="slide__text_title">
                                <h4>KEEPING COFFEE SUPREME</h4>
                            </div>
                            <div class="slide__text_caption">
                                It’s no easy feat producing really great coffee, let alone getting it to this side of the world. Here’s a little look into the ins and outs of what it takes to fill your mug
                            </div>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <img src="images/keeping/Felipe-Croce.jpg" alt="">
                        <div class="slide__text">
                            <div class="slide__text_title">
                                <h4>GROWING</h4>
                                <h3>01</h3>
                            </div>
                            <div class="slide__text_caption">
                                It’s a long game growing coffee
                            </div>
                            <p class="slide__text_p">Coffee trees can take up to three years before they’ll bear fruit. Typically there’s one harvest per year, so fields are tended to with love and care right throughout the season</p>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <img src="images/keeping/Sourcing.jpg" alt="">
                        <div class="slide__text">
                            <div class="slide__text_title">
                                <h4>SOURCING</h4>
                                <h3>02</h3>
                            </div>
                            <div class="slide__text_caption">
                                We take great care to build long term partnerships with producers.
                            </div>
                            <p class="slide__text_p">We like to support our suppliers through the good years and the bad. To us, that's sustainable and fair trading</p>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <img src="images/keeping/Harvesting-2.jpg" alt="">
                        <div class="slide__text">
                            <div class="slide__text_title">
                                <h4>HARVESTING</h4>
                                <h3>03</h3>
                            </div>
                            <div class="slide__text_caption">
                                Quality coffee is picked at its optimum ripeness
                            </div>
                            <p class="slide__text_p">This means multiple passes of the same tree to ensure each cherry is picked at it's right time. Once picked, the clock is ticking to ensure the coffee is processed in a timely fashion</p>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <img src="images/keeping/Processing.jpg" alt="">
                        <div class="slide__text">
                            <div class="slide__text_title">
                                <h4>PROCESSING</h4>
                                <h3>04</h3>
                            </div>
                            <div class="slide__text_caption">
                                Some are funky naturals and others need a little wash
                            </div>
                            <p class="slide__text_p">The processing of coffees is crucial to their flavour. Lots of factors like method, time, water and fermentation come into play here</p>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <img src="images/keeping/Drying.jpg" alt="">
                        <div class="slide__text">
                            <div class="slide__text_title">
                                <h4>DRYING</h4>
                                <h3>05</h3>
                            </div>
                            <div class="slide__text_caption">
                                The job’s not done yet, time to dry it
                            </div>
                            <p class="slide__text_p">Once the coffee has been processed it’s time to dry it to its optimum moisture content so it can be stored and prepared for export</p>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <img src="images/keeping/Exporting-3.jpg" alt="">
                        <div class="slide__text">
                            <div class="slide__text_title">
                                <h4>EXPORTING</h4>
                                <h3>06</h3>
                            </div>
                            <div class="slide__text_caption">
                                Sometimes coffee farms are in beautiful but remote places
                            </div>
                            <p class="slide__text_p">Their idyllic locations often require lots of planning and logistics to get the coffee to freight centres and ports, so then, the coffee can make its way to us</p>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <img src="images/keeping/Exporting-2.jpg" alt="">
                        <div class="slide__text">
                            <div class="slide__text_title">
                                <h4>SHIPPING</h4>
                                <h3>07</h3>
                            </div>
                            <div class="slide__text_caption">
                                Shipping a fresh product to the bottom of the world can be tricky
                            </div>
                            <p class="slide__text_p">We want to ensure the green coffee takes the best possible route, so it arrives at our roasteries in tip-top shape</p>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <img src="images/keeping/Roasting.jpg" alt="">
                        <div class="slide__text">
                            <div class="slide__text_title">
                                <h4>TASTING</h4>
                                <h3>08</h3>
                            </div>
                            <div class="slide__text_caption">
                                Now, it’s time for us to do what we do best.
                            </div>
                            <p class="slide__textStart_p">Our Roasting Dept fine-tune the roast profiles of the coffee to let their intrinsic qualities sparkle. If it's a blend, we'll combine single origins to create balanced (and banging) coffees</p>
                        </div>
                    </li>
                    <li class="splide__slide">
                        <img src="images/keeping/Delivery.jpg" alt="">
                        <div class="slide__text">
                            <div class="slide__text_title">
                                <h4>DELIVERY</h4>
                                <h3>09</h3>
                            </div>
                            <div class="slide__text_caption">
                                We roast, bag and tag our coffee fresh every day.
                            </div>
                            <p class="slide__text_p">This way we know the coffee you’re receiving is always going to be tasty. We use paper recyclable bags, because everyone knows how to recycle</p>
                        </div>
                    </li>
                </ul>
            </div>

        </div>


   </div>



@endsection
