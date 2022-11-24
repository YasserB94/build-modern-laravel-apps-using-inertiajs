<script setup>
import Nav from '@/Pages/Laracasts/Shared/Nav.vue';
import NavLink from '@/Pages/Laracasts/Shared/NavLink.vue';


defineProps({
    time: {
        default: `Default! ${new Date(1994, 1, 25, 8, 30).toString()}`,
        type: String,
    },
});
</script>

<template>
    <header>
        <h1>Time</h1>
        <Nav></Nav>
    </header>
    <div
        class="m-2 mt-[100vh] flex h-fit max-w-md justify-between rounded border p-4"
    >
        <p class="my-auto h-fit w-full text-center">
            Time is <span class="text-emerald-600">{{ time }}</span>
        </p>
        <NavLink
            :href="route('laracasts.time')"
            :title="'update time'"
            :element="'button'"
            preserveScroll
        />
    </div>
</template>

<style scoped></style>
