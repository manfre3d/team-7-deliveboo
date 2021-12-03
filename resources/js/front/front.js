// questo codice ci consente di utilizzare axios nel nostro file
window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// questo sezione del codice e necessaria per utilizzare vue
window.Vue = require('vue');

const app = new Vue({
    el: '#app',
});