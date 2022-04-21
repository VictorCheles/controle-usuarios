export default{
    state:{
        login: {
            token:false,
        }
    },
    mutations:{
        setToken(state,token){
            state.login.token = token
        },
        eraseToken(state){
            state.login.token = false
        }
    },
    actions:{
        token({ commit },newToken){
            commit('setToken',newToken)
        },
        tokenLogout({ commit }){
            commit('eraseToken')
        }
    },
    getters: {
        token(state){
            return state
        }
    }
}