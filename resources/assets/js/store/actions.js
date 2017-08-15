export default {
    pushAgents(context, payload) {
        context.commit('PUSH_AGENTS', payload)
    },
    changeUser(context, payload) {
        context.commit('CHANGE_USER', payload)
    }
}