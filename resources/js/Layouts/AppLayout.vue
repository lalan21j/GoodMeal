<script lang="ts" setup>
import { ref } from 'vue'
import { Inertia } from '@inertiajs/inertia'
import { Head, Link } from '@inertiajs/inertia-vue3'

const theme = ref('light')
const drawer = ref(null)

defineProps({
  title: { type: String, default: 'EDUCATE' }
})

const icons = [
  'mdi-facebook',
  'mdi-twitter',
  'mdi-linkedin',
  'mdi-instagram'
]
// logout
const logout = () => {
  Inertia.post(route('logout'))
}
</script>

<template>
  <div>
    <Head :title="title" />

    <v-app :theme="theme">
      <v-navigation-drawer
        expand-on-hover
        :rail="drawer"
        image="https://cdn.vuetifyjs.com/images/backgrounds/bg-2.jpg"
        theme="dark"
      >
        <v-list>
          <v-list-item
            prepend-avatar="https://randomuser.me/api/portraits/women/85.jpg"
            title="Sandra Adams"
            subtitle="sandra_a88@gmailcom"
          />
        </v-list>

        <v-divider />

        <v-list
          density="compact"
          nav
        >
          <Link
            href="tenant"
            method="get"
          >
            <v-list-item
              prepend-icon="mdi-folder"
              title="Instituciones"
              value="myfiles"
            />
          </Link>

          <v-list-item
            prepend-icon="mdi-account-multiple"
            title="Planes"
            value="shared"
          />

          <Link
            href="tenant"
            method="get"
          >
            <v-list-item
              prepend-icon="mdi-account-multiple"
              title="Docentes"
              value="shared"
            />
          </Link>
        </v-list>
      </v-navigation-drawer>

      <v-app-bar
        color="grey-lighten-2"
        elevation="0"
      >
        <template #title>
          <v-btn
            color="primary"
            :prepend-icon="drawer ? 'mdi-arrow-collapse-right' : 'mdi-arrow-collapse-left'"
            @click.stop="drawer = !drawer"
          />
          titulos
        </template>

        <v-spacer />
        <v-btn :prepend-icon="theme === 'light' ? 'mdi-weather-sunny' : 'mdi-weather-night'" />
        <v-btn @click="logout">
          Salir
        </v-btn>
      </v-app-bar>

      <v-main class="h-screen">
        <!-- class="d-flex justify-center align-center h-screen w-full" -->
        <v-card
          class="m-4"
        >
          <slot />
        </v-card>

        <!-- v-footer
          class="bg-indigo-lighten-1 text-center d-flex flex-column"
        >
          <div>
            <v-btn
              v-for="icon in icons"
              :key="icon"
              class="mx-4"
              :icon="icon"
              variant="text"
            />
          </div>

          <div>
            Phasellus feugiat arcu sapien, et iaculis ipsum elementum sit amet. Mauris cursus commodo interdum. Praesent ut risus eget metus luctus accumsan id ultrices nunc. Sed at orci sed massa consectetur dignissim a sit amet dui. Duis commodo vitae velit et faucibus. Morbi vehicula lacinia malesuada. Nulla placerat augue vel ipsum ultrices, cursus iaculis dui sollicitudin. Vestibulum eu ipsum vel diam elementum tempor vel ut orci. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.
          </div>

          <v-divider />

          <div>
            {{ new Date().getFullYear() }} — <strong>Vuetify</strong>
          </div>
        </v-footer -->
      </v-main>
    </v-app>
  </div>
</template>

<style scoped></style>
