// import Vue from 'vue'
// import App from './App.vue'
// import router from './router'

// Vue.config.productionTip = false

// // createApp(App).use(router).mount('#app')

// new Vue({
//   router,
//   render: h => h(App)
// }).$mount('#app')

import Vue from 'vue'
import App from './App'
import router from './router'

new Vue({
  router,
  render: h => h(App)
}).$mount('#app')