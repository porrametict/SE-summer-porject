import Vue from 'vue'
import  VueRouter from 'vue-router'

import Dashboard from '../views/Dashboard'
import CreateSurvey from '../views/CreateSurvey'
import SurveyAnswers from '../views/SurveyAnswers'



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
            path : '/Survey-answers',
            name : "SurveyAnswers",
            component :SurveyAnswers
        },

    ]
})

export default router