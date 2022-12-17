<script lang="ts" setup>
import { Head } from '@inertiajs/inertia-vue3'

defineProps({
  title: { type: String, default: 'EDUCATE' }
})
</script>

<template>
  <div>
    <Head :title="title" />
    <slot />
  </div>
</template>

<style scoped></style>
