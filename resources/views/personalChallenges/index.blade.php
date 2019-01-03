@extends('layouts.app')


@section('content')

@if (session('message'))
    <success-message-component
        :successmsg="'{{ session('message') }}'"
        >
    </success-message-component>
@endif

<h1 class="font-hairline mb-6 text-center font-sans">My Challenges</h1>
<div class="container  w-2/3 mx-auto border-teal rounded-lg shadow-lg">
    <div class="topbar w-full ">
        <div class="flex justify-around bg-grey-light rounded-t-lg">
            <div class="w-48 pt-2  h-10 text-grey-dark font-sans text-grey-darkest font-medium">NAME</div>
            <div class="w-48 pt-2  h-10 text-grey-dark font-sans text-grey-darkest font-medium">DURATION</div>
            <div class="w-48 pt-2  h-10 text-grey-dark font-sans text-grey-darkest font-medium">DAYS</div>
            <div class="text-center w-32 pt-2 h-10 text-grey-dark font-sans text-grey-darkest font-medium">STATUS</div>

        </div>

        @foreach($challenges as $challenge)
            <div class=" hover:bg-grey pb-16 h-12 flex justify-around border-t-2">
                <div class="w-48 pt-6 pb-6 ">{{ $challenge->name }}</div>
                <div class="w-48 pt-6 pb-6 ">{{ $challenge->duration() }} days</div>
                <div class="w-48 pt-6 pb-6">
                    @foreach($challenge->WeekdaysToCheckIn() as $weekday)
                        <span>{{ $weekday}}</span>
                    @endforeach
                </div>
                @include("personalChallenges.partials.{$challenge->status}",['id' => $challenge->id])
            </div>
        @endforeach
    </div>



@endsection
