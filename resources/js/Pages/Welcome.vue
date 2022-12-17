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

onMounted(() => {
  console.log(props.store)
})

</script>

<template>
  <Head title="GoodMeal" />

  <el-row>
    <el-col>
      <el-card
        v-for="product in $props.store"
        class="mb-3"
        style="width: 350px"
      >
        <div class="flex-fill">
          <p
            class="text-white bg-pink-500 rounded-full pl-4 ml-4 my-2"
            style="width: 75%;"
          >
            {{ product.hours_operation_start }} - {{ product.hours_operation_end }} hrs
          </p>
          <p
            class="text-pink-600 bg-pink-200 rounded-full pl-4 ml-4 my-2"
            style="width: 75%;"
          >
            {{ product.type_delivery }}
          </p>
        </div>

        <el-image
          :src="product.large_image"
          class="flex-fill image"
        />

        <el-image
          :src="product.small_image"
          class="flex-fill rounded-full img-rounde"
        />

        <div class="pt-4">
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
      </el-card>
    </el-col>
  </el-row>
</template>

<style scoped>
.text {
  font-size: 14px;
}

.image {
  width: 100%;
  display: block;
  height: 150px;
}

.img-rounde {
  margin-top: -50px;
  margin-right: 20px;
  float: right;
  width: 100px;
  border-color: white;
  border-width: 10px;
}
</style>
