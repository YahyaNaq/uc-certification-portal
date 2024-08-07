import App from './App.vue';
import { createApp } from 'vue';

// router setup
import router from './routes/router';
import PrimeVue from 'primevue/config';
import Aura from '@primevue/themes/aura';
// import 'primevue/resources/themes/aura/theme.css'; // theme
// import 'primevue/resources/primevue.min.css'; // core css
import 'primeicons/primeicons.css'; // icons

createApp(App)
    .use(router)
    .use(PrimeVue, {
        preset: Aura,
    })
    .mount('#app');

