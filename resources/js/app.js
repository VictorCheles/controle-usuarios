/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;

/* Add Vuex */
import store from './store/store';

/* Add Router */
import router from './router';

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))


    //Principal APP
    Vue.component('app-component', require('./AppComponent.vue').default);

//Components

    //NavBar
    Vue.component('nav-bar-component', require('./components/navbar/NavBarComponent.vue').default);
        //buttons NavBar
        Vue.component('btn-logged-component', require('./components/navbar/components/ButtonsLoggedComponent.vue').default);
        Vue.component('btn-logged-out-component', require('./components/navbar/components/ButtonsLoggedOutComponent.vue').default);
    
    //Modal
    Vue.component('modal-component', require('./components/modal/ModalComponent.vue').default);

     //Form de Edição e Registro de Usuários
     Vue.component('form-edit-register-user-component', require('./components/edit-register-form-user/FormEditRegisterUserComponent.vue').default);

     //Alert
     Vue.component('alert-component', require('./components/alert/AlertComponent.vue').default);

//PAGES
    //Login
    Vue.component('login-component', require('./pages/LoginComponent.vue').default);

    //Registro de novo Usuário
    Vue.component('register-user-component', require('./pages/RegisterUserComponent.vue').default);

    //Edição de usuário
    Vue.component('edit-user-component', require('./pages/EditUserComponent.vue').default);

    //Lista de Usuários cadastrados
    Vue.component('list-users-component', require('./pages/ListUsersComponent.vue').default);



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
    router
});
