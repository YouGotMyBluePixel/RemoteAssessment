/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


 require('./bootstrap');
window.Vue = require('vue').default;
//Bootstrap and jQuery libraries
import 'bootstrap/dist/css/bootstrap.min.css';
import 'jquery/dist/jquery.min.js';
//Datatable Modules
import "datatables.net-dt/js/dataTables.dataTables"
import "datatables.net-dt/css/jquery.dataTables.min.css"


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
 import Vue from 'vue'
 import VueRouter from 'vue-router'
 Vue.use(VueRouter)

 import Home from './components/AdminMainComponent.vue'
 import LinkTable from './components/Admin/LinkTable.vue'
 import PDFTable from './components/Admin/PdfTable.vue'
 const router = new VueRouter({
     mode: 'history',
     routes: [
         {
             path: '/',
             name: 'home',
             component: Home
         },
         {
            path: '/linktable',
            name: 'linktable',
            component: LinkTable
        },
        {
            path: '/pdfs',
            name: 'pdf',
            component: PDFTable
        },
         
     ],
 });
 const app = new Vue({
     el: '#app',
     router,
 });