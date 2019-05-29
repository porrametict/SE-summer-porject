import Vue from 'vue'
import  VueRouter from 'vue-router'

import Dashboard from '../views/Dashboard'
import ryeng from '../views/ryeng'
import uuu from '../views/99'



Vue.use(VueRouter)
const  router = new VueRouter ({
    routes : [
        {
            path : '/',
            name : "dashboard",
            component :Dashboard
        },{
            path : '/ryeng',
            name : "ryeng",
            component :ryeng
        },{
            path : '/99',
            name : "99",
            component :uuu
        },



 
    ]
})

export default router