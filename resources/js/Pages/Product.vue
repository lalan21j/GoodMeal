<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import { onMounted, ref } from 'vue'
import { Timer, CirclePlus, Location } from '@element-plus/icons-vue'

defineProps({
  products: {
    type: Object,
    default: () => {
    }
  }
})

const activeName = ref('first')

onMounted(() => {})
</script>

<template>
  <div>
    <Head title="GoodMeal" />

    <div class="mb-3 rounded-l border border-slate-300 rounded-lg">
      <div
        class="large_image"
        :style="{backgroundImage:`url(${products.large_image})`}"
      />

      <el-image
        :src="products.small_image"
        class="flex-fill rounded-full img-rounde"
      />
    </div>

    <p class="font-bold mt-4 pl-2">
      Acerca de la tienda
    </p>

    <el-row class="mx-3 mt-4">
      <el-col
        :span="24"
        class="mb-2"
      >
        <el-icon :size="18">
          <Location />
        </el-icon>
        <span class="text-pink-300 text-justify">{{ products.direction }}</span>
      </el-col>
      <el-col
        :span="24"
        class="mb-2"
      >
        <el-icon :size="18">
          <Timer />
        </el-icon>
        <span class="text-justify">Horario de retiro: Hoy {{ products.hours_operation_start }} a {{ products.hours_operation_end }}</span>
      </el-col>
      <el-col
        :span="24"
        class="mb-2"
      >
        <span class="text-justify">Calificaci&oacute;n</span>
      </el-col>
    </el-row>

    <el-tabs
      v-model="activeName"
      class="demo-tabs"
    >
      <el-tab-pane
        label="Ver todo"
        name="first"
      />
      <el-tab-pane
        label="Snacks"
        name="second"
      />
      <el-tab-pane
        label="L&aacute;cteos y quesos"
        name="third"
      />
      <el-tab-pane
        label="Congelados"
        name="fourth"
      />
    </el-tabs>

    <el-row :gutter="20">
      <el-col
        v-for="(product, index) in products.product"
        :key="index"
        :span="7"
        class="border border-slate-300 rounded-lg mx-1"
      >
        <div>
          <div class="demo-image__preview">
            <el-image
              :src="products.small_image"
              class="py-2"
              :zoom-rate="1.2"
              :preview-src-list="[products.small_image]"
              fit="cover"
            />
          </div>

          <el-icon
            size="30"
            class="float-right cursor-pointer"
            style="margin-top: -110px"
          >
            <CirclePlus class="text-pink-600" />
          </el-icon>
        </div>

        <p class="bg-blue-400 text-white rounded-md pl-3">
          40% dcto
        </p>

        <p class="text-pink-600">
          ${{ product.price }}
        </p>

        <p class="text-gray-400 text-sm text-justify">
          {{ product.description }}
        </p>
      </el-col>
    </el-row>

    <el-row>
      <el-button
        size="large"
        class="mx-2 mt-4"
        style="width: 100%"
      >
        Comprar
      </el-button>
    </el-row>
  </div>
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
  background-size: cover;
  width: 100%;
}
</style>
