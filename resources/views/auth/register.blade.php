@extends('layouts.app')

@section('content')
<h1 class=" font-sans font-hairline mb-6 text-center">Sign Up </h1>
<div class="container mx-auto h-full flex justify-center items-center">
    <div class="w-full max-w-xs">

      <form action="{{ route('register') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
          <label class="block text-grey-darker text-sm font-bold mb-2" for="Email">
            Email
          </label>
          <input class="shadow appearance-none border rounded w-full py-2
                        px-3 text-grey-darker leading-tight
                        focus:outline-none
                        focus:shadow-outline"
                id="Email"
                type="Email"
                name="email"
                />

        </div>
        <div class="mb-4">
          <label class="block text-grey-darker text-sm font-bold mb-2" for="Username">
            Username
          </label>
          <input class="shadow appearance-none border rounded w-full py-2
                        px-3 text-grey-darker leading-tight
                        focus:outline-none
                        focus:shadow-outline"
                id="Username"
                type="Username"
                name="username"
                />

        </div>
        <div class="mb-2">
          <label class="block text-grey-darker text-sm font-bold mb-2" for="password">
            Password
          </label>
          <input class="shadow appearance-none rounded border w-full py-2
                        px-3 text-grey-darker mb-3 leading-tight
                        focus:outline-none focus:shadow-outline"
                id="password"
                type="password"
                name="password" >
        </div>
        <div class="mb-6">
          <label class="block text-grey-darker text-sm font-bold mb-2" for="confirm_password">
            Confirm password
          </label>
          <input class="shadow appearance-none border rounded w-full py-2
                        px-3 text-grey-darker mb-3 leading-tight
                        focus:outline-none focus:shadow-outline"
                id="confirm_password"
                type="password"
                name="password_confirmation"
                required  >
        </div>
        <div class="flex items-center justify-between">
          <button class="bg-blue hover:bg-blue-dark
                         text-white font-bold py-2 px-4 rounded
                         focus:outline-none focus:shadow-outline" type="submit">
            Sign Up
          </button>
        </div>
      </form>
    </div>
</div>
@endsection
