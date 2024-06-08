import './bootstrap.js';
import 'bootstrap/dist/css/bootstrap.min.css';
import { createApp } from 'vue';


const app = createApp({});

import AuthForm from './components/AuthForm.vue';
app.component('auth-form', AuthForm);

app.mount('#app');
