@extends('layouts.app')

@section('content')
<form method="POST" action="/challenges/{{ $challenge->id }}">
    @csrf
    <body class ="bg-grey-lighter h-screen font-sans">
        <div class="container mx-auto h-80 flex justify-center items-center">
            <div class="w-4/5 lg:w-2/5">
                <h1 class="font-hairline mb-6 text-center">{{ $challenge->name }}</h1>
                <div class="border-teal p-8 border-t-12 bg-white mb-6 rounded-lg shadow-lg">
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
                        <label class="font-bold text-grey-darker block mb-2">Description</label>
                        <textarea
                        disabled
                        name="description"
                        rows="6"
                        class="block appearance-none w-full bg-white
                                border border-grey-light
                                hover:border-grey px-2 py-2 rounded shadow"
                        >{{ $challenge->description }}</textarea>
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
                    <div class="mb-2">
                        <label class="font-bold text-grey-darker block mb-2">Days since start</label>
                        <input
                        disabled
                        name="ends_at"
                        type="text"
                        class="block appearance-none w-full bg-white
                               border border-grey-light
                               hover:border-grey px-2 py-2 rounded shadow"
                        value = "{{ $challenge->daysSinceStart() }}"
                        >
                    </div>
                </div>
            </div>
        </div>
    </body>
</form>
@endsection
