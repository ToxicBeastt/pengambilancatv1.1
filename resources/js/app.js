

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'


import axios from 'axios'

axios.defaults.baseURL = 'http://localhost:8000/api/'

Vue.use(VueRouter)


// Router Imported
import {routes} from './routes';

// Import Notification Class
import Notification from './Helpers/Notification';
window.Notification = Notification

// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

// Imported Simple-Alert
import VueSimpleAlert from "vue-simple-alert";

Vue.use(VueSimpleAlert);


const router = new VueRouter({
    routes,
    mode: 'history'
})

const app = new Vue({
    el: '#app',
    router
});
