<script setup>
import { Link } from "@inertiajs/inertia-vue3";
</script>

<template>
    <nav class="border-b-2 border-emerald-500 flex justify-center">
        <ul class="flex content-center w-full max-w-md justify-between">
            <li>
                <Link
                    href="/laracasts/"
                    class="px-1.5 py-0.5 duration-300 hover:text-emerald-900"
                    >Home
                </Link>
            </li>
            <li>
                <Link
                    href="/laracasts/users"
                    class="px-1.5 py-0.5 duration-300 hover:text-emerald-900"
                    >Users
                </Link>
            </li>
            <li>
                <Link
                    href="/laracasts/settings"
                    class="px-1.5 py-0.5 duration-300 hover:text-emerald-900"
                    >Settings
                </Link>
            </li>
            <li>
                <Link
                    method="POST"
                    :data="{comingFromALinkAttribute:'seems sketchy!'}"
                    href="/laracasts/logout"
                    as="button"
                    class="rounded border px-1.5 py-0.5 shadow duration-500 hover:shadow-inner"
                    >Logout
                </Link>
            </li>
        </ul>
    </nav>
</template>

<style scoped></style>
