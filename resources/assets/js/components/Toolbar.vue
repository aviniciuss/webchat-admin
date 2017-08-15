<template>
    <v-toolbar fixed dark class="primary">
        <v-toolbar-side-icon></v-toolbar-side-icon>

        <v-toolbar-title class="white--text">{{ appname }}</v-toolbar-title>

        <v-spacer></v-spacer>

        <menu-more-vert></menu-more-vert>
    </v-toolbar>
</template>

<script>
    import MenuMoreVert from './MenuMoreVert.vue'

    export default {
        name: 'Toolbar',
        data() {
            return {
                'appname': this.$store.state.appname
            }
        },
        components: {
            MenuMoreVert
        }
    }
</script>