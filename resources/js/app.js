import { createApp } from 'vue';
import AuthForm from './components/AuthForm.vue';
import ProductList from './components/ProductList.vue';
import CartList from './components/CartList.vue';

import './bootstrap.js';
import 'bootstrap/dist/css/bootstrap.min.css';

const app = createApp({});

axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

app.component('auth-form', AuthForm);
app.component('product-list', ProductList);
app.component('cart-list', CartList);

app.mount('#app');
