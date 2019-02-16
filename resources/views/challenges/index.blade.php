@extends('layouts.app')


@section('content')

@if (session('message'))
    <success-message-component
        :successmsg="'{{ session('message') }}'"
        >
    </success-message-component>
@endif
@if($challenges->isEmpty())
    <div class="w-full flex flex-col pt-8 pb-8 ">
        <h1 class="font-hairline text-center font-sans">There are no challenges currently available.</h1>
    </div>
    <div class="mx-auto w-full flex justify-center">
        <img  src="{{url('/svg/nochallenges.svg')}}">
    </div>
        <h4 class="font-hairline text-center font-sans pt-4">Go and create one!</h4>
        <div class="w-full text-center mt-8">
            <a class="bg-teal-dark
                        no-underline
                        py-2
                        px-8
                        hover:bg-teal
                        text-white
                        font-bold
                        rounded"
            href="{{ route('challenges.create') }}">Create</a>
        </div>
@else

<h1 class="font-hairline mb-6 text-center font-sans">All Challenges</h1>
<div class="container  w-4/5 mx-auto border-teal rounded-lg shadow-lg">
    <div class="topbar w-full ">
        <div class="flex justify-around bg-grey-light rounded-t-lg">
            <div class="w-12 lg:w-48 pt-2  lg:text-base text-xs h-10 text-grey-dark font-sans text-grey-darkest font-medium">NAME</div>
            <div class="w-12 lg:w-48 pt-2  lg:text-base text-xs h-10 text-grey-dark font-sans text-grey-darkest font-medium">DURATION</div>
            <div class="w-12 lg:w-48 pt-2  ml-4 lg:ml-0 lg:text-base text-xs h-10 text-grey-dark font-sans text-grey-darkest font-medium">START</div>
            <div class="w-12 lg:w-48 pt-2  lg:text-base text-xs h-10 text-grey-dark font-sans text-grey-darkest font-medium">DAYS</div>
            <div class="text-center w-12 lg:w-32 pt-2 lg:text-base text-xs h-10 text-grey-dark font-sans text-grey-darkest font-medium">STATUS</div>
        </div>

        @foreach($challenges as $challenge)
            <div class=" hover:bg-grey pb-16 h-12 flex justify-around border-t-2">
                <a href="/challenges/{{ $challenge->id }}" class ="no-underline text-teal-dark font-bold">
                    <div class="text-xs lg:text-base w-12 lg:w-48 pt-6 pb-6">{{ $challenge->name }}</div>
                </a>
                <div class="text-xs lg:text-base w-12 lg:w-48 pt-6 pb-6 ">{{ $challenge->duration() }} days</div>
                <div class="text-xs ml-4 lg:ml-0 lg:text-base w-12 lg:w-48 pt-6 pb-6 ">{{ $challenge->starts_at }}</div>
                <div class="text-xs lg:text-base w-12 lg:w-48 pt-6 pb-6">
                    @foreach($challenge->WeekdaysToCheckIn() as $weekday)
                        <span>{{ $weekday}}</span>
                    @endforeach
                </div>
                @if(!$challenge->ActiveForSignedInUser())
                    @include("challenges.partials.inactive_challenge")
                @else
                    @include('challenges.partials.active_challenge')
                @endif
            </div>
        @endforeach
    </div>
{{ $challenges->links() }}
</div>
@endif
@endsection
