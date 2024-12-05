import { createApp } from 'vue';
import ShareNinja from './components/ShareNinja.vue';

document.addEventListener('DOMContentLoaded', () => {
    const app = createApp({});
    app.component('share-ninja', ShareNinja);
    app.mount('#app');
});
