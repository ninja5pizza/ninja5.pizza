import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import { createApp } from 'vue';
import ShareNinja from './components/ShareNinja.vue';

document.addEventListener('DOMContentLoaded', () => {
    const app = createApp({});
    app.component('share-ninja', ShareNinja);
    app.mount('#app');
});
