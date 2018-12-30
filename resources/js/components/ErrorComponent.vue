<template>
    <div class="container">
      <div class="mb-2 bg-red-lightest border border-red-light text-red-dark px-4 py-3 rounded relative" role="alert">
        <strong class="font-bold">Error : </strong>
        <span class="block sm:inline">{{errormsg}}</span>
      </div>
    </div>
</template>

<script>
    export default {
        props: ['errormsg']
    }
</script>
