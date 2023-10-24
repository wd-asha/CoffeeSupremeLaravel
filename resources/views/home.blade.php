@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{--<div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>--}}
            <h4>Categories</h4>
            @foreach($categories as $category)
                {{ $category->id }})
                {{ $category->title }}<br>
            @endforeach
            <br>
            <h4>Coffees</h4>
            @foreach($coffees as $coffee)
                {{ $coffee->coffee_title }}<br>
                {{ $coffee->category->title }}<br>
                {{ $coffee->brand->title }}<br>
                {{ $coffee->grind->title }}<br>
                {{ $coffee->weight->title }}<br>
                {{ $coffee->coffee_taste }}<br>
                {{ $coffee->coffee_about }}<br>
                <img src="{{ $coffee->coffee_image }}" alt="" width="100" height="100"><br>
            @endforeach

        </div>
    </div>
</div>
@endsection
