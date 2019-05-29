import Vue from 'vue'
import  VueRouter from 'vue-router'

import Dashboard from '../views/Dashboard'
import page2 from '../views/p2'


Vue.use(VueRouter)
const  router = new VueRouter ({
    routes : [
        {
            path : '/',
            name : "dashboard",
            component :Dashboard
        },
        {
            path : '/page2',
            name : "page2",
            component :page2
        },

 
    ]
})

export default router