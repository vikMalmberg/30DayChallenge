<template>
    <div class="">
        <a :href="'/personal/challenges/'+ this.id" >
            <button @click="isClicked = true"
                    :disabled="isClicked"
                    class="bg-yellow-lighter
                        hover:bg-yellow
                        text-yellow-darker
                        font-bold
                        py-2
                        focus:outline-none
                        mt-4
                        rounded-full
                        w-16
                        lg:w-32">
                Check in
             </button>
         </a>
    </div>
</template>

<script>
    export default {
        props: ['id'],
        mounted() {
            console.log(this.id)
        },
        data () {
            return {
                isClicked:false
            }
        }
    }
</script>
