import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import { createApp } from 'vue';
import ShareNinja from './components/ShareNinja.vue';

document.addEventListener('DOMContentLoaded', () => {
    const app = createApp({}); // Create an empty Vue application
    app.component('share-ninja', ShareNinja); // Register your component globally
    app.mount('#app'); // Mount the Vue app to #app
});
