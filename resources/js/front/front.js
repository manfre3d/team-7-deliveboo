// questo codice ci consente di utilizzare axios nel nostro file
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// questo sezione del codice e necessaria per utilizzare vue
window.Vue = require('vue');

import App from './App.vue';
import router from './router';
import AOS from 'aos';
import 'aos/dist/aos.css';

const app = new Vue({
  el: '#app',
  render: h => h(App),
  router,
  mounted() {
      AOS.init()
    },
});