<template>
    <v-layout row justify-center>
        <v-dialog v-model="dialog" persistent width="50%">
            <v-card>
                <v-card-text>
                    <h1 class="title">Adicionar Atendente</h1>
                    <h2 class="subheading mb-5">Depois de adicionado o atendente estará apto a fazer atendimentos no site.</h2>
                    <v-layout row wrap>
                        <v-flex xs12 sm6>
                            <v-text-field label="Nome" :rules="rules['name']" v-model="agent.name" required></v-text-field>
                        </v-flex>
                        <v-flex xs12 sm6>
                            <v-text-field label="Email" :rules="rules['email']" v-model="agent.email" required></v-text-field>
                        </v-flex>
                        <v-flex xs12 sm6>
                            <v-text-field label="Senha" :rules="rules['password']" v-model="agent.password" required type="password"></v-text-field>
                        </v-flex>
                        <v-flex xs12 sm6>
                            <v-text-field label="Confirma Senha" :rules="rules['password_confirmation']" v-model="agent.password_confirmation" required type="password"></v-text-field>
                        </v-flex>   
                    </v-layout>
                </v-card-text>
                
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <router-link to="/" tag="v-btn" class="blue--text darken-1 elevation-0" @click.native="dialog = false">
                        Cancelar
                    </router-link>
                    <v-btn class="blue--text darken-1 elevation-0" @click.native="save">
                        Salvar
                    </v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
    </v-layout>
</template>

<script>
    import Agent from '../../domain/Agent'

    export default {
        name: 'AgentForm',
        data() {
            return {
                dialog: true,
                rules: [],
                agent: new Agent
            }
        },
        methods: {
            save() {
                this.$http.post('users', this.agent)
                     .then(() => {
                        this.agent = new Agent
                        this.$router.push('/')
                     })
                     .catch((error) => {
                         this.rules = error.response.data
                     })
            }
        }
    }
</script>