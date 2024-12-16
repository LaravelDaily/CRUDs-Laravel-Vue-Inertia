<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()

const message = computed(() => page.props.message)
</script>

<template>
    <div v-if="message" class="w-full bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
        {{ message }}
    </div>
</template>
