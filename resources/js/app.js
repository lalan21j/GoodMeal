import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/inertia-vue3'
import { InertiaProgress } from '@inertiajs/progress'
import Layout from './Layouts/AppLayout'

// ElementPlus
import ElementPlus from 'element-plus'
// import 'element-plus/dist/index.css'
import esES from 'element-plus/es/locale/lang/es'

const appName = 'GOODMEAL'

createInertiaApp({
  title: (title) => `${title} - ${appName}`,
  resolve: (name) => {
    const page = require(`./Pages/${name}.vue`).default
    if (page.layout === undefined && !name.startsWith('Auth/') && name !== 'Welcome') {
      page.layout = page.layout || Layout
    }
    return page
  },
  setup ({ el, app, props, plugin }) {
    return createApp({ render: () => h(app, props) })
      .use(plugin)
      .mixin({ methods: { route } })
      .use(ElementPlus, { size: 'small', zIndex: 3000, locale: esES })
      .mount(el)
  }
})

InertiaProgress.init({ color: '#ff0000' })
