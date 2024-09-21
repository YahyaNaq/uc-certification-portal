import App from './App.vue';
import { createApp } from 'vue';

// router setup
import router from './routes/router';
import PrimeVue from 'primevue/config';
import Aura from '@primevue/themes/nora';
// import 'primevue/resources/themes/aura/theme.css'; // theme
// import 'primevue/resources/primevue.min.css'; // core css
// import "primevue/resources/themes/lara-light-green/theme.css"; // Import PrimeVue theme
// import "primevue/resources/primevue.min.css"; // Import PrimeVue CSS
import 'primevue/resources/themes/aura-light-green/theme.css';
import 'primeicons/primeicons.css'; // icons
import "vue3-toastify/dist/index.css";
import ConfirmationService from 'primevue/confirmationservice';

const app = createApp(App);
app.use(router)
app.use(PrimeVue);
app.use(ConfirmationService);
app.mount('#app');

