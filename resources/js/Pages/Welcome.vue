<script setup>
import { Head } from '@inertiajs/inertia-vue3'

</script>

<template>
  <Head title="GoodMeal" />

  <el-row>
    <el-col>
      <el-card
        style="width: 350px"
      >
        <div class="flex-fill">
          <p
            class="text-white bg-pink-500 rounded-full pl-4 ml-4 my-2"
            style="width: 75%;"
          >
            Hoy 1
          </p>
          <p
            class="text-pink-600 bg-pink-200 rounded-full pl-4 ml-4 my-2"
            style="width: 75%;"
          >
            Hoy 2
          </p>
        </div>
        <el-image
          src="https://shadow.elemecdn.com/app/element/hamburger.9cf7b091-55e9-11e9-a976-7f4d0b07eef6.png"
          class="flex-fill image"
        />

        <div style="padding: 14px">
          <span style="font-weight: bold">Yummy hamburger</span>
          <div>
            <span
              class="text-pink-600"
              style="font-weight: bold;padding-right: 10px"
            >Desde $1.000</span>
            <span class="text-gray-400 line-through">$2.000</span>
          </div>

          <el-row gutter="20">
            <el-col :span="9">
              <span style="">img</span>
              <span>45 min</span>
            </el-col>

            <el-col :span="9">
              <span style="" />
              <span>45 km</span>
            </el-col>

            <el-col :span="6">
              <span>+45 km</span>
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

</style>
