<script setup>
import { Link } from '@inertiajs/inertia-vue3';
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
    method: {
        type: String,
        default: 'GET',
    },
});
</script>

<template>
    <Link
        :href="href"
        :as="element"
        :active="active"
        :method="method"
        class="p-1 text-center capitalize text-emerald-900 transition duration-300"
        :class="{
            ' hover:text-emerald-600 hover:underline': element === 'a',
            'text-emerald-600 underline': element === 'a' && active,
            'rounded border shadow hover:shadow-inner': element === 'button',
        }"
    >
        {{ title }}
    </Link>
</template>

<style scoped></style>
