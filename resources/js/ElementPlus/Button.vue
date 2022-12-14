<template>
  <el-button
    plain
    :type="type"
  >
    <slot />
  </el-button>
</template>

<script>
export default {
  name: 'ElementPlusButton',
  props: {
    type: {
      type: String,
      default: ''
    }
  }
}
</script>
