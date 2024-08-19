import App from './App.vue';
import { createApp } from 'vue';

// router setup
import router from './routes/router';
import PrimeVue from 'primevue/config';
import Aura from '@primevue/themes/nora';
// import 'primevue/resources/themes/aura/theme.css'; // theme
// import 'primevue/resources/primevue.min.css'; // core css
import 'primeicons/primeicons.css'; // icons
import "vue3-toastify/dist/index.css";

const app = createApp(App);
app.use(router)
app.use(PrimeVue, {
    theme: {
        preset: Aura,
        options: {
            prefix: 'p',
            darkModeSelector: 'system',
            cssLayer: false
        },
    }
});
app.mount('#app');

