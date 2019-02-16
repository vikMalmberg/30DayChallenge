@extends('layouts.app')
@section('content')
@if ($errors->any())
  <div class="w-5/6 lg:w-1/2 mx-auto h-80  justify-center items-center">
      @foreach ($errors->all() as $error)
        <error-component :errormsg="'{{$error}}'"></error-component>
      @endforeach
  </div>
@endif
<form method="POST" action="/challenges">
        @csrf
    <create-challenge-component></create-challenge-component>
</form>
@endsection
