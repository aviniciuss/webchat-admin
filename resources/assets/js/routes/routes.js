import Vue from 'vue'
import VueRouter from 'vue-router'

import Dashboard from '../components/Dashboard.vue'
import AgentForm from '../components/agent/AgentForm.vue'

Vue.use(VueRouter)

let routes = [
    { path: '', component: Dashboard },
    { path: '/agent/create', component: AgentForm },
]

const router = new VueRouter({ routes })

export default router