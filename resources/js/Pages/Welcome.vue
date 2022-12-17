<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import { onMounted } from 'vue'
import { Bicycle, Goods, Location } from '@element-plus/icons-vue'

const props = defineProps({
  store: {
    type: Object,
    default: () => {
    }
  }
})

onMounted(() => {})
</script>

<template>
  <Head title="GoodMeal" />

  <el-row>
    <el-col>
      <div
        v-for="(product, index) in props.store"
        :key="index"
        class="mb-3 rounded-l border border-slate-300 rounded-lg "
        style="width: 350px"
      >
        <div
          class="large_image"
          :style="{backgroundImage:`url(${product.large_image})`}"
        >
          <p class="text-white bg-pink-500 rounded-full pl-3 ml-3 w-2/4">
            {{ product.hours_operation_start }} - {{ product.hours_operation_end }} hrs
          </p>
          <p class="text-pink-600 bg-pink-200 rounded-full pl-3 ml-3 w-2/4 mt-3">
            {{ product.type_delivery }}
          </p>
        </div>

        <el-image
          :src="product.small_image"
          class="flex-fill rounded-full img-rounde"
        />

        <div class="px-4 py-2">
          <span style="font-weight: bold">{{ product.name }}</span>
          <div>
            <span
              class="text-pink-600"
              style="font-weight: bold;padding-right: 10px"
            >Desde $1.000</span>
            <span class="text-gray-400 line-through">$2.000</span>
          </div>

          <el-row
            gutter="20"
            class="mt-2"
          >
            <el-col :span="9">
              <el-icon :size="18">
                <Bicycle />
              </el-icon>
              <span>{{ product.delivery_time }}</span>
            </el-col>

            <el-col :span="9">
              <el-icon :size="18">
                <Location />
              </el-icon>
              <span>{{ product.distance }}</span>
            </el-col>

            <el-col :span="6">
              <span v-if="product.sales_day < 10">{{ product.sales_day }}</span>
              <span v-else>10 +</span>
              <el-icon :size="18">
                <Goods />
              </el-icon>
            </el-col>
          </el-row>
        </div>
      </div>
    </el-col>
  </el-row>
</template>

<style scoped>
.img-rounde {
  margin-top: -50px;
  margin-right: 20px;
  float: right;
  width: 100px;
  border-color: white;
  border-width: 10px;
}

.large_image {
  height: 100px;
  border-radius: 10px 10px 0px 0px;
}
</style>
