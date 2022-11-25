<script setup>
import { reactive } from 'vue';
import {Inertia} from "@inertiajs/inertia";
const props = defineProps(
    {
        errors:{
            type:Object,
            default:{},
        }
    }
)
const form = reactive({
    name: '',
    email: '',
    password: '',
});
const submit = ()=>{
    Inertia.post(route('laracasts.users.create.submit'),form);
}
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
                        class="focus:shadow-inner rounded border-0 shadow focus:border-0 active:border-0"
                        v-model="form.name"
                        name="name"
                        type="text"
                    />
                    <p v-if="errors.name" class="text-xs text-red-400" v-text="errors.name"></p>
                </div>
                <div class="flex max-w-md flex-col space-x-2">
                    <label for="email">Email</label>
                    <input
                        class="focus:shadow-inner rounded border-0 shadow focus:border-0 active:border-0"
                        v-model="form.email"
                        name="email"
                        type="email"
                    />
                    <p v-if="errors.email" class="text-xs text-red-400" v-text="errors.email"></p>
                </div>
                <div class="flex max-w-md flex-col space-x-2">
                    <label for="password">Password</label>
                    <input
                        class="focus:shadow-inner rounded border-0 shadow focus:border-0 active:border-0"
                        v-model="form.password"
                        name="password"
                        type="password"
                    />
                    <p v-if="errors.password" class="text-xs text-red-400" v-text="errors.password"></p>
                </div>
                <button
                    type="submit"
                    class="hover:shadow-inner ml-auto block rounded border px-4 py-2 shadow"
                >
                    Submit
                </button>
            </form>
        </main>
    </section>
</template>

<style scoped></style>
