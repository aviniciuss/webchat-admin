export default {
    'PUSH_AGENTS'(state, payload) {
        state.agents = payload
    },
    'CHANGE_USER'(state, payload) {
        state.user = payload
    }
}