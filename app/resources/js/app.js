
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
/* Componentes */
/* Vistas */
import App from './views/app'
import login from './views/login'
import actividades from './views/actividades'
import estadocuenta from './views/estadocuenta'
import calendario from './views/calendario'
/* Administrador */
import empleadosadm from './views/empleadosadm'
import clientesadm from './views/clientes'
import clientecuenta from './views/cuenta'
/* 3party */
import fullCalendar from 'vue-fullcalendar'
Vue.component('full-calendar', fullCalendar)

Vue.use(VueRouter)

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

/* Enrutador */
const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'login',
            component: login,
            meta: {
                title: 'Login'
            }
        },
        {
            path: '/actividades',
            name: 'actividades',
            components: {
                default: actividades,
            },
            meta: {
                title: 'Actividades'
            }
        },
        {
            path: '/cuenta',
            name: 'cuenta',
            component:estadocuenta,
            meta: {
                title: 'Estado de Cuenta'
            }
        },
        {
            path: '/calendario',
            name: 'calendario',
            component: calendario,
            meta:{
                title: 'Actividades Reservadas'
            }
        },
        {
            path: '/administrador/empleados',
            name: 'empleadosadm',
            component: empleadosadm,
            meta:{
                title: 'Empleados'
            }
        },
        {
            path: '/administrador/clientes/registrar',
            name: 'clientesadm',
            component: clientesadm,
            meta:{
                title: 'Clientes'
            }
        },
        {
            path: '/administrador/clientes/cuenta',
            name: 'clientecuenta',
            component: clientecuenta,
            meta: {
                title: 'Estado de cuenta del cliente'
            }
        }        

    ],
});

/* Antes de mostrar modificar titulo de pagina y validar autentificacion */
router.beforeEach((to,from,next) => {
    document.title = _.defaultTo(to.meta.title,'')
    next()
})


const app = new Vue({
    el: '#app',
    components: { App },
    router,    
});
