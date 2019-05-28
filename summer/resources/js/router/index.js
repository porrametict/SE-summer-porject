import Vue from 'vue'
import  VueRouter from 'vue-router'

import p1 from '../views/p1'
import p2 from '../views/p2'
Vue.use(VueRouter)
const  router = new VueRouter ({
    routes : [
        {
            path : '/',
            name : "home",
            component :p1
        },
        {
            path : '/p2',
            name : "p2",
            component :p2
        }
    ]
})

export default router