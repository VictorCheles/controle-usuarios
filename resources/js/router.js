import Vue from "vue";
import Router from "vue-router";
import store from './store/store';

import LoginComponent from './pages/LoginComponent.vue'
import RegisterComponent from './pages/RegisterUserComponent.vue'

import EditUserComponent from './pages/EditUserComponent.vue'
import ListUsersComponent from './pages/ListUsersComponent.vue'

Vue.use(Router)

const router =  new Router({
    mode:'history',
    routes:[
        {
            path:'/', 
            name:'index',
            component:LoginComponent
        },
        {
            path:'/register/:idUser?', 
            name:'register',
            component: RegisterComponent, 
            props: true,
        },
        {
            path:'/list', 
            name:'list',
            component:ListUsersComponent
        }
    ]
})

router.beforeEach((to,from,next)=>{
    if ((to.name !== 'index' && to.name !== 'register') && store.getters.token.login.token === false) next({ name: 'index' })
    else if (to.name === 'index' && store.getters.token.login.token !== false) next({ name: 'list' })
    else next()
})

export default router