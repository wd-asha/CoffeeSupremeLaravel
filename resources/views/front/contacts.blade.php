@extends('layouts.contacts')
@section('title', 'Coffee Supreme - Contacts')
@section('content')

    <div class="wrapper">

        <div class="breadcrumbs">
            <h6>
                <a href="{{ route('front') }}">Home</a>
                <i class="fas fa-caret-right"></i>
                <span>Contacts</span>
            </h6>
        </div>

        <h2>Contacts</h2>

        <div class="contacts">
            <div class="empty-box"></div>
            <div class="contacts-text">
                <h4>Get in touch</h4>
                <p>Along with the Supreme locations dotted around the place, we have office teams based in key centres. If you can’t visit us in person, you can drop us a line to share a cool story or ask us a smart question. We'll hear from you soon</p>
            </div>
            <div class="contact1">
                <h3>NEW ZEALAND</h3>
                <h4>ONLINE ORDERS</h4>
                <p>0800 937 627</p>
                <p>shopnz@coffeesupreme.com</p>
                <h4>WHOLESALE ORDERS</h4>
                <p>0800 937 627</p>
                <p>teamoffice@coffeesupreme.com</p>
            </div>
            <div class="contact2">
                <h3>AUSTRALIA</h3>
                <h4>ONLINE ORDERS</h4>
                <p>1800 232 671</p>
                <p>shopau@coffeesupreme.com</p>
                <h4>WHOLESALE ORDERS</h4>
                <p>1800 232 671</p>
                <p>us@coffeesupreme.com</p>
            </div>
            <div class="contact3">
                <h3>JAPAN</h3>
                <h4>ONLINE ORDERS</h4>
                <p>+81 3 5738 7246</p>
                <p>shopjp@coffeesupreme.com</p>
                <h4>WHOLESALE ORDERS</h4>
                <p>+81 3 5738 7246</p>
                <p>tokyo@coffeesupreme.com</p>
            </div>
        </div>

    </div>

@endsection
