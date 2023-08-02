require('./bootstrap');

import Vue from 'vue'

//Main pages
import Dropdown from './components/Dropdown.vue'


const app = new Vue({
    el: '#app',
    components: { Dropdown },
    data() {
        return { mobileMenuOpen: false }
    }
});
