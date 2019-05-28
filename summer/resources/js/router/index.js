import Vue from 'vue'
import  VueRouter from 'vue-router'

import Dashboard from '../views/Dashboard'


Vue.use(VueRouter)
const  router = new VueRouter ({
    routes : [
        {
            path : '/',
            name : "dashboard",
            component :Dashboard
        },
 
    ]
})

export default router