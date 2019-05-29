import Vue from 'vue'
import  VueRouter from 'vue-router'

import Dashboard from '../views/Dashboard'
import page2 from '../views/p2'
import France from '../views/France'
import Home from '../views/Home'


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
        {
            path : '/France',
            name : "France",
            component :France
        },{
            path : '/Home',
            name : "Home",
            component :Home
        },
 
    ]
})

export default router