<script setup>
import Paginator from "@/Pages/Laracasts/Shared/Paginator.vue";
import {Inertia} from '@inertiajs/inertia';
import {ref,watch} from "vue";
import debounce from 'lodash/debounce';
/*

    Throttling will delay executing a function. It will reduce the notifications of an event that fires multiple times.
    Debouncing will bunch a series of sequential calls to a function into a single call to that function.
    It ensures that one notification is made for an event that fires multiple times.

 */
const props = defineProps({
    filters:{
        type:Object,
        default:{search:''}
    },
    users: {
        type: Object,
        default: {},
    },
});
const search = ref(props.filters.search);
watch(
    search,
    debounce(function (value) {

        Inertia.get(
            route('laracasts.users'),
            { search: value },
            {
                preserveState: true,
                replace: true,
            }
        );
    }, 1000)
);
</script>
<script>
import Layout from '@/Pages/Laracasts/Shared/Layout.vue';
export default { layout: Layout };
</script>
<template>
    <section class="mx-auto mt-2 space-y-2 font-mono">
        <div class="flex justify-between">
            <h1>Users</h1>
            <input
                type="text"
                class="rounded border bg-slate-100 p-1 text-slate-800 placeholder-slate-500"
                v-model="search"
                placeholder="Search..."
            />
        </div>
        <div class="w-full overflow-hidden rounded shadow">
            <div class="w-full overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr
                            class="text-md border-b border-gray-600 bg-gray-100 text-left font-semibold uppercase tracking-wide text-gray-900"
                        >
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Age</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Date</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        <tr
                            class="text-gray-700"
                            v-for="(user, index) in users.data"
                            :key="`${user.name ?? index * index}.${index}`"
                        >
                            <td class="border px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div
                                        class="relative mr-3 h-8 w-8 rounded-full md:block"
                                    >
                                        <img
                                            class="h-full w-full rounded-full object-cover"
                                            src="https://picsum.photos/200"
                                            alt=""
                                            loading="lazy"
                                        />
                                        <div
                                            class="absolute inset-0 rounded-full shadow-inner"
                                            aria-hidden="true"
                                        ></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-black">
                                            {{ user.name }}
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td class="text-ms border px-4 py-3 font-semibold">
                                {{ user.age }}
                            </td>
                            <td class="border px-4 py-3 text-xs">
                                <span
                                    class="rounded-sm px-2 py-1 font-semibold leading-tight text-green-700"
                                    :class="
                                        user.status === 'Available'
                                            ? 'bg-green-100 text-green-800'
                                            : 'bg-red-100 text-red-800'
                                    "
                                >
                                    {{ user.status }}
                                </span>
                            </td>
                            <td class="border px-4 py-3 text-sm">
                                {{ user.birthdate }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <Paginator
        class="mx-auto flex justify-between space-x-2 bg-opacity-95"
        :links="users.links"
    ></Paginator>
</template>

<style scoped></style>
