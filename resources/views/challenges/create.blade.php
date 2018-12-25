@extends('layouts.app')
@section('content')
@if ($errors->any())
  <div class="w-1/2 mx-auto h-80  justify-center items-center">
      @foreach ($errors->all() as $error)
          <div class="mb-2 bg-red-lightest border border-red-light text-red-dark px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Error : </strong>
            <span class="block sm:inline">{{ $error }}</span>
          </div>
      @endforeach
  </div>
@endif
<form method="POST" action="/challenges">
        @csrf
    <create-challenge-component></create-challenge-component>
</form>
@endsection
