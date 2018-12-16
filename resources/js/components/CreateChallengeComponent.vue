<template>
<div>
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
                        >
                    </div>
                    <div class="mb-4">
                        <label class="font-bold text-grey-darker block mb-2">Select Challenge type</label>
                        <select v-model="selectedType" class=" mb-4 block  w-full bg-white
                               border border-grey-light
                               hover:border-grey px-2 py-2 rounded shadow" name="type">

                            <option value="1">Every day</option>
                            <option value="2">Specific days</option>

                        </select>
                    </div>
                    <div v-if="selectedType == 2" class="mb-2">
                        <label class="font-bold text-grey-darker block mb-2">Days</label>
                        <div class=" flex justify-center">
                            <input class="ml-1 " type="checkbox" name="days_of_week[]" value="1">
                            <label class="text-xs ml-1 mr-1">Monday</label>
                            <input class="text-xs " type="checkbox" name="days_of_week[]" value="2">
                            <label class="text-xs ml-1 mr-1">Tuesday</label>
                            <input class="text-xs " type="checkbox" name="days_of_week[]" value="3">
                            <label class="text-xs ml-1 mr-1">Wednesday</label>
                            <input class="text-xs " type="checkbox" name="days_of_week[]" value="4">
                            <label class="text-xs ml-1 mr-1">Thursday</label>
                        </div>
                        <div class ="mt-4 flex justify-center">
                            <input type="checkbox" name="days_of_week[]" value="5">
                            <label class="text-xs ml-1 mr-1">Friday</label>
                            <input type="checkbox" name="days_of_week[]" value="6">
                            <label class="text-xs ml-1 mr-1">Saturday</label>
                            <input type="checkbox" name="days_of_week[]" value="7">
                            <label class="text-xs ml-1 mr-1">Sunday</label>
                        </div>
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
                    <div >
                        <label class="font-bold text-grey-darker block mb-2">Starting date</label>
                        <input
                        name="starts_at"
                        type="date"
                        class="block appearance-none w-full bg-white
                               border border-grey-light
                               hover:border-grey px-2 py-2 rounded shadow"
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
</div>

</template>

<script>
export default {



  data () {
    return {
        'thirtyDay': true,
        'selectedType' : "1",

    }
  },
  methods: {
  }
}
</script>

