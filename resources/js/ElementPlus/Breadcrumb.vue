<script lang="ts" setup>
import { Link } from '@inertiajs/inertia-vue3'
import { ArrowRight } from '@element-plus/icons-vue'

defineProps({
  crumb: { type: Object, default: () => {} }
})
</script>

<template>
  <el-breadcrumb
    :separator-icon="ArrowRight"
    class="py-3"
  >
    <el-breadcrumb-item
      v-for="(items, index) in $props.crumb"
      :key="index"
    >
      <Link :href="items.path">
        {{ items.name }}
      </Link>
    </el-breadcrumb-item>
  </el-breadcrumb>
</template>

<style scoped>

</style>
