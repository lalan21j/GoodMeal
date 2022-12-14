<script lang="ts" setup>
defineProps({
  records: { type: Array, default: () => [] }
})
</script>

<template>
  <el-table
    :data="$props.records"
    stripe
    style="width: 100%"
    highlight-current-row
  >
    <slot />
  </el-table>
</template>

<style scoped>
</style>
