<script setup>
import { reactive, ref } from 'vue';
import {useForm} from "@inertiajs/inertia-vue3";


const form = useForm({
    name: '',
    email: '',
    password: '',
});
const submit = ()=>{
    form.post(route('laracasts.users.create.submit'));
}
/*
// const processing = ref(false);
// const submit = () => {
//     Inertia.post(route('la racasts.users.create.submit'), form, {
//         onStart: () => {
//             processing.value = true;
//         },
//         onFinish: () => {
//             processing.value = false;
//         },
//     });
// };*/
</script>
<script>
import Layout from '@/Pages/Laracasts/Shared/Layout.vue';
export default { layout: Layout };
</script>
<template>
    <Head>
        <title>Create</title>
    </Head>
    <section>
        <header>
            <h1>Create a new User</h1>
        </header>
        <main>
            <form
                action="/"
                @submit.prevent="submit"
                class="my-4 mx-auto max-w-md space-y-2"
            >
                <div class="flex max-w-md flex-col space-x-2">
                    <label for="name">Name</label>
                    <input
                        class="rounded border-0 shadow  focus:shadow-inner"
                        v-model="form.name"
                        name="name"
                        type="text"
                        required
                    />
                    <p
                        v-if="form.errors.name"
                        class="text-xs text-red-400"
                        v-text="form.errors.name"
                    ></p>
                </div>
                <div class="flex max-w-md flex-col space-x-2">
                    <label for="email">Email</label>
                    <input
                        class="rounded  border-0 shadow  focus:shadow-inner focus:ring-0  "
                        v-model="form.email"
                        name="email"
                        type="email"
                        required
                    />
                    <p
                        v-if="form.errors.email"
                        class="text-xs text-red-400"
                        v-text="form.errors.email"
                    ></p>
                </div>
                <div class="flex max-w-md flex-col space-x-2">
                    <label for="password">Password</label>
                    <input
                        class="rounded border-0 shadow  focus:shadow-inner focus:ring-0  "
                        v-model="form.password"
                        name="password"
                        type="password"
                        required
                    />
                    <p
                        v-if="form.errors.password"
                        class="text-xs text-red-400"
                        v-text="form.errors.password"
                    ></p>
                </div>
                <button
                    type="submit"
                    class="ml-auto duration-1000 block disabled:opacity-10 rounded border px-4 py-2 shadow hover:shadow-inner"
                    :disabled="form.processing"
                >
                    Submit
                </button>
            </form>
        </main>
    </section>
</template>

<style scoped></style>
