@extends('layouts.app')


@section('content')

@if (session('message'))
    <success-message-component
        :successmsg="'{{ session('message') }}'"
        >
    </success-message-component>
@endif

<h1 class="font-hairline mb-6 text-center font-sans">All Challenges</h1>
<div class="container  w-2/3 mx-auto border-teal rounded-lg shadow-lg">
    <div class="topbar w-full ">
        <div class="flex justify-around bg-grey-light rounded-t-lg">
            <div class="w-48 pt-2 mr-4 h-10 text-grey-dark font-sans text-grey-darkest font-medium">NAME</div>
            <div class="w-24 pt-2 mr-4 h-10 text-grey-dark font-sans text-grey-darkest font-medium">DURATION</div>
            <div class="text-center w-24 pt-2 h-10 pr-8 text-grey-dark font-sans text-grey-darkest font-medium">STATUS</div>
        </div>

        @foreach($challenges as $challenge)
            <div class=" hover:bg-grey pb-16 h-12 flex justify-around border-t-2">
                <div class="w-48 pt-6 pb-6 pr-4 pt-2">{{ $challenge->name }}</div>
                <div class="w-24 pt-6 pb-6 pl-4 pr-4 pt-2 pb-2">{{ $challenge->duration() }} days</div>
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
@endsection
