require('./bootstrap');

import { createApp } from 'vue';

//Main pages
import Dropdown from './components/Dropdown.vue';
import AppHeader from './components/AppHeader.vue';

const app = createApp({
    data() {
        return { mobileMenuOpen: false };
    }
});

app.component('Dropdown', Dropdown);
app.component('AppHeader', AppHeader);

app.mount('#app');