<script setup lang="ts">
import { Head, Link } from '@inertiajs/inertia-vue3'
import { onMounted } from 'vue'
import { Back } from '@element-plus/icons-vue'

defineProps({
  order: {
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
      <Link href="/orderLists">
        <el-icon
          :size="30"
          class="float-left"
        >
          <Back class="font-bold pt-3 ml-2" />
        </el-icon>
      </Link>
      <p class="text-center font-bold pt-5">
        Detalle de la orden
      </p>
    </div>

    <el-row :gutter="20">
      <el-col
        :span="22"
        class="border border-slate-300 rounded-lg mx-4 my-1"
      >
        <div>
          <span class="bg-teal-400 text-white font-bold p-1 float-right border rounded-b-lg">Rescatada</span>
        </div>

        <el-col class="p-3">
          <p class="font-bold py-4 text-xl">
            {{ order.store_name }}
          </p>
          <p class="text-justify">
            <b>Direcci&oacute;n:</b> {{ order.store_direction }}
          </p>
          <p><b>Horario de retiro:</b> {{ order.schedule }}</p>
          <p><b>Fecha de retiro:</b> {{ order.retirement_date }}</p>
          <p><b>N° de orden:</b> {{ order.order_number }}</p>

          <el-divider />

          <p class="font-bold">
            Productos
          </p>

          <el-row
            v-for="list in order.list_products"
            :gutter="20"
          >
            <el-col :span="2">
              {{ list.quantity }}
            </el-col>
            <el-col :span="18">
              {{ list.name }}
            </el-col>
            <el-col :span="4">
              <p class="float-right">
                ${{ list.price }}
              </p>
            </el-col>
          </el-row>

          <el-divider />

          <el-row>
            <el-col :span="12">
              <p class="font-bold">
                Delivery
              </p>
            </el-col>
            <el-col :span="12">
              <p class="float-right">
                ${{ order.delivery }}
              </p>
            </el-col>
          </el-row>
          <el-row>
            <el-col :span="12">
              <p class="font-bold">
                Monto total
              </p>
            </el-col>
            <el-col :span="12">
              <p class="float-right">
                ${{ order.total }}
              </p>
            </el-col>
          </el-row>
        </el-col>
      </el-col>
    </el-row>
  </div>
</template>

<style scoped></style>
