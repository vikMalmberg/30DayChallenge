<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-grey-lighter">
        <nav class="flex items-center justify-between flex-wrap bg-teal p-6">
          <div class="block lg:hidden">
            <button class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
              <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
            </button>
          </div>
          <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
            <div class="text-sm lg:flex-grow">
              @if(Auth::user())
              <a href="{{route('personal.challenges.index')}}" class="block mt-4 lg:inline-block no-underline lg:mt-0 text-teal-lighter hover:text-white mr-4">
                My Challenges
              </a>
              @endif
              <a href="{{route('challenges.index')}}" class="block mt-4 lg:inline-block no-underline lg:mt-0 text-teal-lighter hover:text-white mr-4">
                Challenges
              </a>
              <a href="{{route('challenges.create')}}" class="block mt-4 lg:inline-block lg:mt-0 no-underline text-teal-lighter hover:text-white mr-4">
                Create
              </a>
            </div>
            @if(!Auth::user())
            <div>
              <a href="/login" class="inline-block text-sm px-4 py-2 leading-none border rounded no-underline text-white border-white hover:border-transparent hover:text-teal hover:bg-white mt-4  lg:mt-0">Sign in</a>
            </div>
            <div>
              <a href="/register" class="inline-block text-sm px-4 py-2 leading-none border rounded no-underline text-white border-white hover:border-transparent hover:text-teal hover:bg-white ml-4 mt-4 lg:mt-0">Register</a>
            </div>
            @else
            <div>
              <a href="/logout" class="inline-block text-sm px-4 py-2 leading-none border rounded no-underline text-white border-white hover:border-transparent hover:text-teal hover:bg-white ml-4 mt-4 lg:mt-0">Sign out</a>
            </div>
            @endif

          </div>
        </nav>
    <div id="app">
        <main class="py-4 ">
            @yield('content')
        </main>
    </div>
</body>
</html>
