import Vue from 'vue'
import  VueRouter from 'vue-router'

import Dashboard from '../views/Dashboard'
import CreateSurvey from '../views/CreateSurvey'
import Report from '../views/Report'
import Question from '../views/Question'



Vue.use(VueRouter)
const  router = new VueRouter ({
    routes : [
        {
            path : '/',
            name : "dashboard",
            component :Dashboard
        },
        {
            path : '/Create-survey',
            name : "CreateSurvey",
            component :CreateSurvey
        },
        {
            path : '/Report/:s_id',
            name : "Report",
            component :Report
        },
        {
            path: '/ans/:s_id',
            name: "Question",
            component: Question
        },

    ]
})

export default router