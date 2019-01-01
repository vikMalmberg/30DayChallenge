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
                        <h2 class=" pl-12 font-hairline text-grey-dark">Active :</h2>
                        <h2 class="pl-4 font-normal">{{ $activeChallengeCount }}</h2>
                </div>
            </div>
        </div>


    </div>
</div>
</div>

@endsection


