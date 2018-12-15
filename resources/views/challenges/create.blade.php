@extends('layouts.app')
@section('content')
<form method="POST" action="/challenges">
        @csrf
    <create-challenge-component></create-challenge-component>
</form>
@endsection
