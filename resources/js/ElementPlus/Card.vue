<script lang="ts" setup>
// code...
</script>

<template>
  <el-card shadow="never">
    <template #header>
      <div class="card-header">
        <slot name="header" />
      </div>
    </template>
    <slot />
  </el-card>
</template>

<style scoped>
.card-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
</style>
