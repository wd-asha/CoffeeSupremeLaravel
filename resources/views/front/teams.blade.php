@extends('layouts.teams')
@section('content')

    <div class="wrapper">

        <div class="breadcrumbs">
            <h6>
                <a href="{{ route('front') }}">Home</a>
                <i class="fas fa-caret-right"></i>
                <span>Our Team</span>
            </h6>
        </div>

        <h2>Our Team</h2>

        <div class="news">
            <div class="categories">
                <h5>Countries</h5>
                @foreach($countries as $country)
                    <a href="{{ route('filterTeam', $country->id) }}" class="category
@php if((int)$id === $country->id) echo 'category-active'; @endphp">
                        {{ $country->country_title }}
                    </a>
                @endforeach
            </div>
            <div class="teams">
                <div class="latest-team">
                    <p>We have a stellar bunch of people working for us in New Zealand, Australia, and Japan. If you fancy joining our team, check the Careers page for any opportunities to jump on board</p>
                </div>
                @foreach($teams as $team)
                    <div class="team">
                        <div class="team-img">
                            <img src="../../../../{{ $team->team_image }}" alt="">
                            <h3>{{ $team->team_title }}</h3>
                            <h4>{{ $team->team_dept }},&emsp;<span>{{ $team->town->town_title }}</span></h4>
                        </div>
                    </div>
                @endforeach

                <div>
                    {{ $teams->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>

        </div>

    </div>

@endsection
