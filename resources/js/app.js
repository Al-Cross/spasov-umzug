require('./bootstrap');

import { createApp } from 'vue';

//Main pages
import Dropdown from './components/Dropdown.vue';

const app = createApp({
    data() {
        return { mobileMenuOpen: false };
    }
});

app.component('Dropdown', Dropdown);

app.mount('#app');