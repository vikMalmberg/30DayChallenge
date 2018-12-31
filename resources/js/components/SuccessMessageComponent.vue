<template>
    <div v-if="!isHidden" class="container w-2/3 mx-auto">
        <div class=" mb-4 w-1/2 mx-auto  bg-teal-lightest border-t-4 border-teal rounded-b text-teal-darkest px-4 py-3 shadow-md" role="alert">
          <div class="flex justify-between">
            <div>
                <p class="font-bold">Success</p>
                <p class="text-sm">{{ successmsg }}</p>
            </div>
            <button @click="isHidden = true">X</button>
          </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['successmsg'],
        data() {
            return{
                isHidden:false
            }
        }
    }
</script>
