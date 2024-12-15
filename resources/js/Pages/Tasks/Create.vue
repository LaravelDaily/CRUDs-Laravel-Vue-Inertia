<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";

const form = useForm({
    name: '',
    description: '',
    user_id: ''
})
</script>

<template>
    <Head title="New Task" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                New Task
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="form.post(route('tasks.store'))">
                            <div>
                                <div>
                                    <label for="name" class="block text-sm font-medium text-gray-700">
                                        Name
                                    </label>
                                    <input v-model="form.name" type="text" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <p class="mt-2 text-sm text-red-600" v-show="form.errors.name">
                                        {{ form.errors.name }}
                                    </p>
                                </div>

                                <div class="mt-4">
                                    <label for="description" class="block text-sm font-medium text-gray-700">
                                        Description
                                    </label>
                                    <input v-model="form.description" type="text" id="name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                    <p class="mt-2 text-sm text-red-600" v-show="form.errors.description">
                                        {{ form.errors.description }}
                                    </p>
                                </div>
                            </div>

                            <div class="mt-4">
                                <PrimaryButton type="submit" :disabled="form.processing" class="inline-block rounded-md bg-blue-500 px-4 py-3 text-xs font-semibold uppercase tracking-widest text-white shadow-sm disabled:opacity-25">
                                    Save task
                                </PrimaryButton>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
