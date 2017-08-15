import Vue from 'vue'
import Vuex from 'vuex'

import state from './state'
import mutations from './mutations'
import actions from './actions'

import toolbar from './modules/toolbar/main'

Vue.use(Vuex)

export default new Vuex.Store({
    state,
    mutations,
    actions,
    modules: {
        toolbar
    }
})