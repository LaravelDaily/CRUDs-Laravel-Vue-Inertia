<script setup>
defineProps({
    value: {
        type: String,
    },
    required: {
        type: Boolean,
    }
});
</script>

<template>
    <label class="block text-sm font-medium text-gray-700">
        <span v-if="value">{{ value }}</span>
        <span v-else><slot /></span>
        <span v-if="required">*</span>
    </label>
</template>
