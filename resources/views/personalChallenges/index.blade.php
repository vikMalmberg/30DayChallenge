@extends('layouts.app')


@section('content')
@if (session('message'))
    <div class=" mb-4 mx-auto w-1/2 bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md" role="alert">
      <div class="flex">
        <div class="py-1"><svg class="fill-current h-6 w-6 text-teal mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
        <div>
          <p class="font-bold">Success</p>
          <p class="text-sm">{{ session('message') }}</p>
        </div>
      </div>
    </div>
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
