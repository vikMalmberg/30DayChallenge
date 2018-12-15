@extends('layouts.app')
@section('content')
<form method="POST" action="/challenges">
    @csrf
    <body class ="bg-grey-lighter h-screen font-sans">
        <div class="container mx-auto h-80 flex justify-center items-center">
            <div class="w-1/3">
                <h1 class="font-hairline mb-6 text-center font-sans">Create a challenge</h1>
                <div class="border-teal p-8 border-t-12 bg-white mb-6 rounded-lg shadow-lg">
                    <div class="mb-4">
                        <label class="font-bold text-grey-darker block mb-2">Challenge name</label>
                        <input
                        name="name"
                        type="text"
                        class="block appearance-none w-full bg-white
                                border border-grey-light
                                hover:border-grey px-2 py-2 rounded shadow"
                        value = "{{ old('name')  ?? ''}}"
                        >
                    </div>
                    <div class="mb-2">
                        <label class="font-bold text-grey-darker block mb-2">Duration</label>
                        <select class=" mb-4 block  w-full bg-white
                               border border-grey-light
                               hover:border-grey px-2 py-2 rounded shadow" name="duration">
                            <option value="Week">Week</option>
                            <option value="Month">Month</option>
                            <option value="Year">Year</option>
                        </select>
                    </div>
                    <div>
                        <label class="font-bold text-grey-darker block mb-2">Starting date</label>
                        <input
                        name="starts_at"
                        type="date"
                        class="block appearance-none w-full bg-white
                               border border-grey-light
                               hover:border-grey px-2 py-2 rounded shadow"
                       value = "{{ old('starts_at')  ?? ''}}"
                        >
                    </div>
                    <div class="flex items-center justify-between">
                        <button class ="bg-teal-dark hover:bg-teal
                                        text-white font-bold
                                        py-2 px-4 mt-4 rounded">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
</form>
@endsection
