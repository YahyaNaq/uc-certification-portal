import routes from './routes';
import { createRouter, createWebHistory } from 'vue-router';


// configure router
const router = createRouter({
    linkExactActiveClass: 'text-secondary',
    history: createWebHistory(),
    routes,
});

export default router;
