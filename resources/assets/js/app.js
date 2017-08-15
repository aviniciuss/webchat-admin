import Vue from 'vue'
import Vuetify from 'vuetify'
import VueSocketio from 'vue-socket.io'
import axios from 'axios'

import App from './Main.vue'
import router from './routes/routes'
import store from './store/store'

Vue.use(Vuetify)
Vue.use(VueSocketio, 'http://localhost:3000')

Vue.http = Vue.prototype.$http = axios

new Vue({
    store,
    router,
    beforeMount() {
        this.getAuthenticatedUser()
    },
    methods: {
        getAuthenticatedUser() {
            this.$http.get('authenticated-user')
                .then((response) => this.$store.dispatch('changeUser', response.data))
        }
    },
    render: h => h(App)
}).$mount('#app')