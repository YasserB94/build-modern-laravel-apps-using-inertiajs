<script setup>
import NavLink from '@/Pages/Laracasts/Shared/NavLink.vue';
const links = [
    {
        title: 'home',
        routeName: 'laracasts',
        element: 'a',
    },
    {
        title: 'users',
        routeName: 'laracasts.users',
        element: 'a',
    },
    {
        title: 'time',
        routeName: 'laracasts.time',
        element: 'a',
    },
    {
        title: 'settings',
        routeName: 'laracasts.settings',
        element: 'a',
    },
    {
        title: 'logout',
        routeName: 'laracasts.logout',
        element: 'button',
        method: 'POST',
    },
];
</script>
<template>
    <nav class="flex justify-center border-b-2 border-emerald-500">
        <ul class="my-1 flex max-w-md items-center space-x-2">
            <li v-for="(link, i) in links" :key="`${link.title}${i}`">
                <NavLink
                    :href="route(link.routeName)"
                    :element="link.element"
                    :title="link.title"
                    :method="link.method && link.method"
                    :active="route().current(link.routeName)"
                />
            </li>
        </ul>
    </nav>
</template>
<style scoped></style>
