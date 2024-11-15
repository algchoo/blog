import './bootstrap';
import { createApp } from 'vue';
import StarRating from './components/StarRating.vue';

// Create the Vue application instance and register the component
const app = createApp({});
app.component('star-rating', StarRating);
app.mount('#app');
