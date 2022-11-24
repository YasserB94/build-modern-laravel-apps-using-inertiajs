<script setup>
import {Link} from "@inertiajs/inertia-vue3";
defineProps({
    title: {
        type: String,
        default: 'No title specified',
    },
    href: {
        type: String,
        default: '/laracasts',
    },
    element: {
        type: String,
        default: 'a',
    },
    active: {
        type: Boolean,
        default: false,
    },
    method:{
        type:String,
        default:'GET',
    }
});
</script>

<template>
    <Link :href="href"
          :as="element"
          :active="active"
          :method="method"
          class="capitalize transition duration-300 text-emerald-900 p-1"
          :class="{' hover:text-emerald-600 hover:underline':element==='a',
          'text-emerald-600 underline':element==='a'&&active,
          'border rounded shadow hover:shadow-inner':element==='button',
          }"
    >
        {{title}}
    </Link>
</template>

<style scoped>

</style>
