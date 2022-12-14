<script lang="ts" setup>
defineProps({
  header: { type: String, default: '' }
})
</script>

<template>
  <div
    id="login"
    class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100"
  >
    <el-card
      class="box-card w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg"
      shadow="never"
    >
      <template #header>
        <div class="card-header">
          <span class="text-capitalize font-bold text-gray-500">{{ header }}</span>
        </div>
      </template>
      <slot />
    </el-card>
  </div>
</template>

<style scoped>
.card-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
</style>
