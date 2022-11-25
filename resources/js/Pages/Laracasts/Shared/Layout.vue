<script setup>
import Nav from '@/Pages/Laracasts/Shared/Nav.vue';

defineProps({
    pageTitle: {
        type: String,
        default: '',
    },
});
</script>

<template>
    <header
        class="flex w-full items-center border-b-2 border-emerald-900 px-4 pt-2 pb-1"
    >
        <h1>
            Lara<span v-if="pageTitle.length > 0"> | {{ pageTitle }}</span>
        </h1>
        <Nav class="ml-auto lg:mx-auto" :key="route().current()"/>
    </header>
    <main class="mx-4 max-w-lg md:mx-auto">
        <slot />
    </main>
</template>

<style scoped></style>
