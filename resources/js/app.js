import ShoppingChart from "./components/ShoppingChart";
import ProductList from "./components/product_list/ProductList";
import sendMessage from "./components/sendMessage";
import InvoiceComponent from "./components/invoice/InvoiceComponent";
import VueRouter from "vue-router";
import Vuex from "Vuex" ;
import {routes} from '/routes'

require('./bootstrap');

window.Vue = require('vue');

Vue.use(VueRouter);
Vue.use(Vuex);

const router = new VueRouter({
    routes,
    mode:'history'
})

const store = new Vuex.Store({
    state:{

    },
    getters:{

    }
})

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components: {
        ShoppingChart,
        ProductList,
        sendMessage,
        InvoiceComponent
    },
    router,
    store
});
