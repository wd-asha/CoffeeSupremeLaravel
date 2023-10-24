@extends('layouts.contacts')
@section('title', 'Coffee Supreme - FAQ & Returns')
@section('content')

    <div class="wrapper">

        <div class="breadcrumbs">
            <h6>
                <a href="{{ route('front') }}">Home</a>
                <i class="fas fa-caret-right"></i>
                <span>FAQ & Returns</span>
            </h6>
        </div>

        <h2>FAQ & Returns</h2>

        <div class="helps">
            <div class="introduce">
                <h4>Customer Service</h4>
                <p>Need to talk to a human?</p>
                <p>Call or email; we’d be happy to hear from you. If face-to-face is what you’re after, see our location page and feel free to swing by. The kettle is always on</p>
                <p>shopnz@coffeesupreme.com</p>
                <p>NZ: 0800 937 627</p>
                <p>AU: 1800 232 671</p>
            </div>
            <div class="faq1">
                <h4>Orders</h4>
                <div class="faq-box">
                    <div class="faq-title">
                        <p>What do I do if I receive a faulty/wrong product?</p>
                        <i class="fas fa-angle-down"></i>
                    </div>
                    <div class="faq-content">
                        <p>Email us at shopnz@coffeesupreme.com and we can make it right. You can also call us on 0800 937 627</p>
                    </div>
                </div>
                <div class="faq-box">
                    <div class="faq-title">
                        <p>Can I cancel my order?</p>
                        <i class="fas fa-angle-down"></i>
                    </div>
                    <div class="faq-content">
                        <p>If you need to cancel an order you’ve placed please get in touch with us straight away. If you need to cancel a coffee subscription, you can edit your subscription from your account page</p>
                    </div>
                </div>
                <h4>Returns</h4>
                <div class="faq-box">
                    <div class="faq-title">
                        <p>What is your returns policy?</p>
                        <i class="fas fa-angle-down"></i>
                    </div>
                    <div class="faq-content">
                        <p>We accept returns of products/merchandise purchased from the Coffee Supreme Website. If the item is in new/unused condition you may send it back for a refund. Returns must be sent back with tracking within 21 days of delivery<br>We’ll process the refund for the item/s when it has been delivered to Coffee Supreme Ltd. We’ll send a confirmation email once we’ve processed the refund<br>Please choose carefully, we do not accept returns of coffee beans/grounds as this is a fresh product and we package it fresh to order. If the bag of coffee is an error on our part, we’ll replace it for the correct order<br>Returns are the customers responsibility until received by Coffee Supreme Ltd. Returns are not applicable for sale items.</p>
                    </div>
                </div>
            </div>
            <div class="faq2">
                <h4>Delivery</h4>
                <div class="faq-box">
                    <div class="faq-title">
                        <p>How long will it take for my order to arrive?</p>
                        <i class="fas fa-angle-down"></i>
                    </div>
                    <div class="faq-content">
                        <p>Thank you for keeping us busy, we're feeling the love. Please allow 2-3 days for delivery outside of Auckland and 7 working days for those in Auckland. No Saturday delivery<br>International Delivery DHL: 1-2 weeks<br>If your order is late to arrive, please email us at shopnz@coffeesupreme.com. We’ll contact our shipping provider on your behalf. If you include your phone number on your order, you'll automatically receive SMS shipping updates from Courier Post, tracking your order<br>Please include a phone number with all international orders</p>
                    </div>
                </div>
                <div class="faq-box">
                    <div class="faq-title">
                        <p>How much is shipping and delivery?</p>
                        <i class="fas fa-angle-down"></i>
                    </div>
                    <div class="faq-content">
                        <p>NZ Shipping rates:<br>We are currently offering free shipping on all orders nationwide<br>International Rates:<br>We ship internationally via DHL. Shipping costs are calculated at checkout</p>
                    </div>
                </div>
                <h4>Payments</h4>
                <div class="faq-box">
                    <div class="faq-title">
                        <p>What payment methods do you accept?</p>
                        <i class="fas fa-angle-down"></i>
                    </div>
                    <div class="faq-content">
                        <p>For online payment we accept:<br>Credit card payment (VISA, Mastercard and AMEX), PayPal, Google Pay</p>
                    </div>
                </div>
                <div class="faq-box">
                    <div class="faq-title">
                        <p>Is tax included in my order total?</p>
                        <i class="fas fa-angle-down"></i>
                    </div>
                    <div class="faq-content">
                        <p>Yes, order totals are tax inclusive</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
