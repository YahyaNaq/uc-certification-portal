import '../../bootstrap';

import Create from '../views/certificates/Create.vue';
import Index from '../views/certificates/Index.vue';
// import Edit from './components/Edit.vue';

const routes = [
  {
      name: 'Create',
      path: '/create',
      component: Create
  },
  {
      name: 'Index',
      path: '/',
      component: Index
  },
  // {
  //     name: 'Edit',
  //     path: '/edit/:id',
  //     component: Edit
  // }
];

export default routes;