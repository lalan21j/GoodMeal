<script setup lang="ts">
import { Head, Link } from '@inertiajs/inertia-vue3'
import { onMounted } from 'vue'
import { ArrowRight, Back } from '@element-plus/icons-vue'

defineProps({
  orders: {
    type: Object,
    default: () => {
    }
  }
})

onMounted(() => {})
</script>

<template>
  <div>
    <Head title="GoodMeal" />

    <div>
      <Link href="/">
        <el-icon
          :size="30"
          class="float-left"
        >
          <Back class="font-bold pt-3 ml-2" />
        </el-icon>
      </Link>
      <p class="text-center font-bold pt-5">
        Mis &Oacute;rdenes
      </p>
    </div>

    <el-row
      v-for="(order, index) in orders"
      :key="index"
      :gutter="20"
    >
      <el-col
        :span="22"
        class="border border-slate-300 rounded-lg mx-4 my-1"
      >
        <div>
          <span class="bg-teal-400 text-white font-bold p-1 float-right border rounded-b-lg">Rescatada</span>
        </div>

        <div class="p-3">
          <Link :href="/orderLists/ + order.id">
            <el-icon
              :size="25"
              class="float-right"
              style="margin-top: 58px; margin-right: -70px"
            >
              <ArrowRight class="border rounded-full bg-gray-300 p-1" />
            </el-icon>
          </Link>

          <p class="text-teal-400 text-lg font-bold">
            {{ order.created_at }}
          </p>
          <p>Tienda: {{ order.store_name }}</p>
          <p>N° de Orden: {{ order.order_number }}</p>
          <p>Monto Total: {{ order.amount_total }}</p>
          <p>Horario: {{ order.schedule }}</p>
        </div>
      </el-col>
    </el-row>
  </div>
</template>

<style scoped></style>
