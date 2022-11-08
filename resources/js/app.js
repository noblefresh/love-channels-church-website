import './bootstrap';

import { createApp } from 'vue';
import app from './components/Test.vue';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

Vue.component('AddCartBtn', require('./components/AddCartBtn.vue').default);

createApp(app).mount('#app');
