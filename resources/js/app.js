import { createApp } from 'vue';
import AuthForm from './components/AuthForm.vue';
import ProductList from './components/ProductList.vue';

import './bootstrap.js';
import 'bootstrap/dist/css/bootstrap.min.css';

const app = createApp({});

app.component('auth-form', AuthForm);
app.component('product-list', ProductList);

app.mount('#app');
