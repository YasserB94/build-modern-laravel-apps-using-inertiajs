<script setup>
import NavLink from '@/Pages/Laracasts/Shared/NavLink.vue';
const links = [
    {
        title: 'home',
        href: '/laracasts',
        element: 'a',
    },
    {
        title: 'users',
        href: '/laracasts/users',
        element: 'a',
    },
    {

    },
    {
        title: 'time',
        href: '/laracasts/time',
        element: 'a',
    },
    {
        title: 'settings',
        href: '/laracasts/settings',
        element: 'a',
    },
    {
        title: 'logout',
        href: '/laracasts/logout',
        element: 'button',
        method: 'POST',
    },
];
</script>
<template>
    <nav class="flex justify-center border-b-2 border-emerald-500">
        <ul class="flex max-w-md space-x-2 items-center my-1">
            <li v-for="link in links">
                <NavLink
                    :href="link.href"
                    :element="link.element"
                    :title="link.title"
                    :method="link.method && link.method"
                />
            </li>
        </ul>
    </nav>
</template>
<style scoped></style>
