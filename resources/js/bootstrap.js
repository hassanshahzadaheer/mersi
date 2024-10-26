import axios from 'axios';
// Import Alpine.js here if you prefer to keep all imports in one place
import Alpine from 'alpinejs';

window.axios = axios;

// Set up Axios defaults
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

window.Alpine = Alpine;
Alpine.start();
