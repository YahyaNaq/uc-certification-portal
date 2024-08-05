import App from './App.vue';
import { createApp } from 'vue';

// router setup
import router from './routes/router';

createApp(App)
    .use(router)
    .mount('#app');
