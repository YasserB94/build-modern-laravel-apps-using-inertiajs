<script setup>
const props = defineProps({
    greeting:{
        default:'I are default!',
        type:String,//Not Needed - Does nothing aka also shows string if Bool given ?
    },
    defaultExample:{
        default:'No prop was passed in for defaultExample, So you see me!',
        type:String//Because I can !
    },
    technologies:{
        type:Array,
    }
})
</script>

<template>
    <p>Hello Inertia</p>
    <p>{{greeting}} I am a prop</p>
    <p>{{defaultExample}}</p>
    <ul>
        <li v-for="technology in technologies"
        >
            {{technology}}
        </li>
    </ul>
</template>

<style scoped>

</style>
