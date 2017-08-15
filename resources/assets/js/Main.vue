<template>
    <v-app>
        <navigation-drawer></navigation-drawer>

        <toolbar></toolbar>

        <main>
            <v-container fluid>
                <router-view></router-view>
            </v-container>
        </main>
    </v-app>
</template>

<script>
    import NavigationDrawer from './components/NavigationDrawer.vue'
    import Toolbar from './components/Toolbar.vue'

    export default {
        name: 'webchat-admin',
        components: {
            NavigationDrawer,
            Toolbar
        },
        mounted() {
            this.$socket.emit('ping-agents')
        }
    }
</script>

<style src="../../../node_modules/vuetify/dist/vuetify.min.css" type="text/css"></style>
