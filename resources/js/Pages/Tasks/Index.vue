<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import DangerButton from "@/Components/DangerButton.vue";
import LinkButton from "@/Components/LinkButton.vue";
import AlertMessage from '@/Components/AlertMessage.vue';
import Pagination from '@/Components/Pagination.vue';

const props = defineProps({
    tasks: {
        type: Object,
        required: true
    }
})

const destroy = (id) => {
    if (confirm('Are you sure?')) {
        router.delete(route('tasks.destroy', id))
    }
}

const excerpt = (value, length = 50) => {
    return value.length > length ? value.substring(0, length) + '...' : value
}
</script>

<template>
    <Head title="Tasks" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Tasks
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                        <div class="min-w-full align-middle">
                            <AlertMessage />

                            <Link :href="route('tasks.create')" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Add new task
                            </Link>

                            <table class="min-w-full divide-y divide-gray-200 border mt-4">
                                <thead>
                                <tr>
                                    <th class="bg-gray-50 px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Name</span>
                                    </th>
                                    <th class="bg-gray-50 px-6 py-3 text-left">
                                        <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Description</span>
                                    </th>
                                    <th class="bg-gray-50 px-6 py-3 text-left"></th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                                    <tr v-for="task in tasks.data">
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ task.name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            {{ excerpt(task.description) }}
                                        </td>
                                        <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                                            <LinkButton :href="route('tasks.edit', task.id)">
                                                Edit
                                            </LinkButton>
                                            <DangerButton @click="destroy(task.id)" type="button" class="ml-2 rounded-md bg-red-600 px-3 py-2 text-xs font-semibold uppercase tracking-widest text-white shadow-sm">
                                                Delete
                                            </DangerButton>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                            <Pagination :pagination="tasks" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
