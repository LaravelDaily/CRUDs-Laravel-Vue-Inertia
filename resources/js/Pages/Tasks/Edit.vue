<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm } from '@inertiajs/vue3';
import PrimaryButton from "@/Components/PrimaryButton.vue";
import InputLabel from '@/Components/InputLabel.vue';
import SelectInput from '@/Components/SelectInput.vue';
import InputError from '@/Components/InputError.vue';
import TextInput from '@/Components/TextInput.vue';

const props = defineProps({
    task: {
        type: Object,
        required: true
    },
    users: {
        type: Array,
        required: true
    }
})

const form = useForm(props.task)
</script>

<template>
    <Head title="Edit Task" />

    <AuthenticatedLayout>
        <template #header>
            <h2
                class="text-xl font-semibold leading-tight text-gray-800"
            >
                Edit Task
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="overflow-hidden overflow-x-auto p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="form.put(route('tasks.update', task.id))">
                            <div>
                                <div>
                                    <InputLabel for="name" value="Name" />

                                    <TextInput
                                        id="name"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.name"
                                        required
                                    />

                                    <InputError class="mt-2" :message="form.errors.name" />
                                </div>

                                <div class="mt-4">
                                    <InputLabel for="description" value="Description" />

                                    <TextInput
                                        id="description"
                                        type="text"
                                        class="mt-1 block w-full"
                                        v-model="form.description"
                                        required
                                    />

                                    <InputError class="mt-2" :message="form.errors.description" />
                                </div>

                                <div class="mt-4">
                                    <InputLabel for="email" value="Assigned to" />

                                    <SelectInput
                                        v-model="form.user_id"
                                        class="mt-1 block w-full"
                                        :options="props.users"
                                    />

                                    <InputError class="mt-2" :message="form.errors.user_id" />
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
