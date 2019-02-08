@extends('layouts.app')

@section('content')

<div class="container w-1/4 mx-auto rounded-lg shadow-lg mt-16 font-hairline font-sans">
    <div class="rounded-lg">
    <div class="bg-grey-light rounded">
        <h2 class=" text-center p-4 bg-grey-light rounded  font-sans font-hairline ">Minis Profile</h2>
    </div>


    <div class="bg-grey-lighter rounded p-4">

        <div class="pl-4 mb-12">
            <div class="flex">
                <i class="w-16 fas fa-chart-line text-4xl text-teal"></i>
                <div class="flex  text-center mr-4 w-full">

                        <h2 class=" pl-12 font-hairline text-grey-dark">Current Streak :</h2>
                        <h2 class="pl-4 font-normal">{{ Auth::user()->streak}}</h2>
                </div>
            </div>
        </div>
        <div class="pl-4 mb-12">
            <div class="flex">
                <i class="w-16 far fa-check-square text-4xl text-teal"></i>
                <div class="flex text-center mr-4 w-full">
                        <h2 class=" pl-12 font-hairline text-grey-dark">Completed :</h2>
                        <h2 class="pl-4 font-normal">{{ $completedChallengeCount }}</h2>
                </div>
            </div>
        </div>
        <div class="pl-4 mb-12">
            <div class="flex">
                <i class="w-16 fas fa-thumbs-down text-4xl text-teal"></i>
                <div class="flex text-center mr-4 w-full">
                        <h2 class=" pl-12 font-hairline text-grey-dark">Failed :</h2>
                        <h2 class="pl-4 font-normal">{{ $failedChallengeCount }}</h2>
                </div>
            </div>
        </div>
        <div class="pl-4 mb-4">
            <div class="flex">
                <i class="w-16 fas fa-clipboard-list text-4xl text-teal"></i>
                <div class="flex text-center mr-4 w-full">
                        <a  class ="no-underline" href="{{ route('personal.challenges.index') }}">
                            <h2 class=" pl-12 font-hairline text-grey-dark">Active :</h2>
                        </a>
                        <h2 class="pl-4 font-normal">{{ $activeChallengeCount }}</h2>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="bg-red py-6 container w-2/5 mx-auto rounded-lg shadow-lg mt-16 font-hairline font-sans">
    <div class="pl-24 pr-12">
        <div class="flex justify-between">
            <p>Jan</p>
            <p>April</p>
            <p>Aug</p>
            <p>Dec</p>
        </div>
    </div>
    <div class="px-8">
        @for($week = 0; $week <7; $week++)
        <div class="flex pt-px">
            <p class="w-12">{{ $dayOfWeek[($week+1) % 7]  }}
            @for($day = 0; $day < 52; $day++)
                @include("contributions.partials.{$contributionManager->getColorOfDate($week + ($day*7))}")
            @endfor
        </div>
        @endfor
    </div>
</div>

@endsection


