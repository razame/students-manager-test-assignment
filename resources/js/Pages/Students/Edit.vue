<template>
    <div class="container content-center">
        <div
            class="justify-self-center mx-auto mt-20 max-w-sm p-6 bg-white border border-gray-200 rounded-lg dark:border-gray-300"
        >
            <form @submit.prevent="submit" class="max-w-md mx-auto">
                <div class="mb-4">
                    <h1
                        class="mb-4 text-4xl font-bold leading-none tracking-tight text-gray-900 md:text-3xl lg:text-3xl"
                    >
                        Edit Student
                    </h1>
                </div>
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Name:</label>
                    <input
                        id="name"
                        v-model="form.name"
                        type="text"
                        class="mt-1 p-2 w-full border rounded-md"
                    />
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700"
                        >Email:</label
                    >
                    <input
                        id="email"
                        v-model="form.email"
                        type="text"
                        class="mt-1 p-2 w-full border rounded-md"
                    />
                </div>
                <div class="mb-4">
                    <label for="username" class="block text-gray-700"
                        >Username:</label
                    >
                    <input
                        id="username"
                        v-model="form.username"
                        type="text"
                        class="mt-1 p-2 w-full border rounded-md"
                    />
                </div>
                <button
                    type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
                >
                    Submit
                </button>
            </form>
        </div>
    </div>
</template>

<script setup>
import { router, usePage } from "@inertiajs/vue3";

const { data } = usePage().props;
const form = data.student;

function submit() {
    console.log(form);
    router.put(`/students/${form.id}`, form);
}
</script>
