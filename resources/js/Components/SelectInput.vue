<template>
    <select v-model="model" class="rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        <option>-- please choose the option --</option>
        <option v-for="(name, id) in options" :key="id" :value="id">
            {{ name }}
        </option>
    </select>
</template>

<script setup>
    const model = defineModel({
        type: String,
        required: true,
    });

    defineProps({
        options: {
            type: Array,
            required: true,
            default: () => [],
        },
    })
</script>
