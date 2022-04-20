import Vue from "vue";
import Router from "vue-router";

import LoginComponent from './components/LoginComponent.vue'
import RegisterComponent from './components/RegisterUserComponent.vue'

Vue.use(Router)

export default new Router({
    mode:'history',
    routes:[
        {
            path:'/', component:LoginComponent
        },
        {
            path:'/register', component:RegisterComponent
        }
    ]
})