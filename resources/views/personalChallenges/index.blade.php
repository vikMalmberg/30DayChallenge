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
    <table class="topbar w-full">
        <tr class="mb-4 bg-grey-lighter h-10 text-grey-dark font-sans">
            <th class="text-center pl-4 pr-4 font-medium">NAME</th>
            <th class="text-center pl-4 pr-4 font-medium">DURATION</th>
            <th class="text-center pl-4 pr-4 font-medium"></th>
        </tr>
        @foreach($challenges as $challenge)
            <tr>
                <td class="text-center pl-4 pr-4 pt-2 pb-2 border-t-2">{{ $challenge->name }}</td>
                <td class="text-center pl-4 pr-4 pt-2 pb-2 border-t-2">{{ $challenge->duration() }} days</td>
                @include("personalChallenges.partials.{$challenge->status}",['id' => $challenge->id])
            </tr>
        @endforeach
    </table>
</div>



@endsection
