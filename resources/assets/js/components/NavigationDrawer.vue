<template>
    <v-navigation-drawer class="grey lighten-4" light permanent height="100%">
        <v-toolbar flat class="transparent">
            <v-list class="pa-0">
                <router-link to="/" tag="v-list-tile" avatar>
                    <v-list-tile-avatar>
                        <img :src="user.avatar || '/images/avatar-default.png'" />
                    </v-list-tile-avatar>

                    <v-list-tile-content>
                        <v-list-tile-title>{{ user.name }}</v-list-tile-title>
                    </v-list-tile-content>
                </router-link>
            </v-list>
        </v-toolbar>

        <v-divider></v-divider>

        <v-list dense>
            <v-subheader>ATENDENTES</v-subheader>

            <div class="text-xs-center" v-show="await">
                <v-progress-circular indeterminate class="primary--text"></v-progress-circular>
            </div>

            <v-list-tile v-for="agent in agents" :key="agent.name" avatar class="">
                <v-list-tile-avatar>
                    <img :src="agent.avatar || '/images/avatar-default.png'" alt="">
                </v-list-tile-avatar>

                <v-list-tile-content>
                    <v-list-tile-title>{{ agent.name }}</v-list-tile-title>
                    <v-list-tile-sub-title>
                        <small v-if="agent.online" class="green--text darken-4">online</small>
                        <small v-if="!agent.online" class="red--text darken-4">offline</small>
                    </v-list-tile-sub-title>
                </v-list-tile-content>
            </v-list-tile>

            <router-link to="/agent/create" tag="v-list-tile" class="mt-3">
                <v-list-tile-action>
                    <v-icon class="grey--text text--darken-1">add_circle_outline</v-icon>
                </v-list-tile-action>
                <v-list-tile-title>Adicionar Atendente</v-list-tile-title>
            </router-link>

            <v-list-tile>
                <v-list-tile-action>
                    <v-icon class="grey--text text--darken-1">settings</v-icon>
                </v-list-tile-action>
                <v-list-tile-title>Configurações</v-list-tile-title>
            </v-list-tile>
        </v-list>
    </v-navigation-drawer>
</template>

<script>
    import _ from 'lodash'

    export default {
        name: 'NavigatorDrawer',
        computed: {
            agents() {
                return this.$store.state.agents
            },
            user() {
                return this.$store.state.user
            }
        },
        data() {
            return {
                await: true
            }
        },
        mounted() {
           this.getAgents()
        },
        methods: {
            getAgents() {
                this.$http.get('/users')
                    .then((response) => {
                        this.$store.dispatch('pushAgents', _.filter(response.data.agents, agent => agent.email !== this.user.email))
                        this.await = false

                        setTimeout(() => {
                            this.$socket.emit('ping-agents')
                        }, 2000)
                    })
                    .catch((error) => console.log(error))
            }
        },
        sockets: {
            'agent-connected': function (data) {
                this.agents.forEach((agent) => {
                  if(agent.email === data.email) {
                      agent.online = true
                      return
                  }
                })
            },
            'agent-disconnected': function (data) {
                this.agents.forEach((agent) => {
                    if(agent.email === data.email) {
                        agent.online = false
                        return
                    }
                })
            },
            'agent-created': function() {
                this.getAgents()
            }
        },
    }
</script>