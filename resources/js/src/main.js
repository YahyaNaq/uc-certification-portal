import App from './App.vue';
import { createApp } from 'vue';

// router setup
import router from './routes/router';
import PrimeVue from 'primevue/config';
import Lara from '@primevue/themes/lara';
// import 'primevue/resources/themes/aura/theme.css'; // theme
// import 'primevue/resources/primevue.min.css'; // core css
import 'primeicons/primeicons.css'; // icons
import "vue3-toastify/dist/index.css";

const app = createApp(App);
app.use(router)
app.use(PrimeVue, {
    theme: {
        preset: Lara
    }
});
app.mount('#app');

