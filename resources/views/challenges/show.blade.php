@extends('layouts.app')

@section('content')
<form method="POST" action="/challenges/{{ $challenge->id }}">
    @csrf
    <body class ="bg-grey-lighter h-screen font-sans">
        <div class="container mx-auto h-80 flex justify-center items-center">
            <div class="w-1/3">
                <h1 class="font-hairline mb-6 text-center">Create a challenge</h1>
                <div class="border-teal p-8 border-t-12 bg-white mb-6 rounded-lg shadow-lg">
                    <div class="mb-4">
                        <label class="font-bold text-grey-darker block mb-2">Challenge name</label>
                        <input
                        disabled
                        name="name"
                        type="text"
                        class="block appearance-none w-full bg-white
                                border border-grey-light
                                hover:border-grey px-2 py-2 rounded shadow"
                        value = "{{ $challenge->name }}"
                        >
                    </div>
                    <div class="mb-2">
                        <label class="font-bold text-grey-darker block mb-2">Starting date</label>
                        <input
                        disabled
                        name="starts_at"
                        type="date"
                        class="block appearance-none w-full bg-white
                               border border-grey-light
                               hover:border-grey px-2 py-2 rounded shadow"
                       value = "{{ $challenge->starts_at }}"
                        >
                    </div>
                    <div class="mb-2">
                        <label class="font-bold text-grey-darker block mb-2">Ending date</label>
                        <input
                        disabled
                        name="ends_at"
                        type="date"
                        class="block appearance-none w-full bg-white
                               border border-grey-light
                               hover:border-grey px-2 py-2 rounded shadow"
                        value = "{{ $challenge->ends_at }}"
                        >
                    </div>
                    <div class="flex items-center justify-between">
                        <button class ="bg-teal-dark hover:bg-teal
                                        text-white font-bold
                                        py-2 px-4 mt-4 rounded">Sign up</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</form>
@endsection
