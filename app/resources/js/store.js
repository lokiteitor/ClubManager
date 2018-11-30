import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios'

Vue.use(Vuex)

// aqui guardamos y manipulamos los tokens
export default new Vuex.Store({
    state:{
        status: '',
        token: localStorage.getItem('token') || '',
        usuario: localStorage.getItem('usuario') || '',
        tipo: localStorage.getItem('tipo') || ''
    },
    mutations:{
        auth_request(state){
            state.status = 'cargando'
        },
        auth_success(state,token,usuario,tipo){
            state.status = 'Autorizado'
            state.token = token
            state.usuario = usuario
            state.tipo = tipo
        },
        auth_error(state){
            state.store = 'error'
        },
        logout(state){
            state.status = ''
            state.token = ''
            state.tipo = ''
        },
        noauth(state){
            state.status = ''
            state.token = ''
            state.usuario = ''
            state.tipo = ''
        }


    },
    actions: {
        // esta accion nos loguea
        login({commit},usrdata) {
            return new Promise((resolve,reject) => {
                // cambiamos el estado
                commit('auth_request')
                axios.get('/api/login',{params:usrdata}).then(res => {
                    // actualizar
                    const token = res.data.token
                    const usuario = res.data.usuario
                    const tipo = res.data.tipo
                    localStorage.setItem('token',token)
                    localStorage.setItem('usuario',usuario)
                    localStorage.setItem('tipo',tipo)
                    // TODO : usar este header en vez del request
                    axios.defaults.headers.common['Authorization'] = token
                    commit('auth_success',token,usuario,tipo)
                    /// esto que hace ?
                    resolve(res)
        
                }).catch(err => {
                    commit('auth_error')
                    localStorage.removeItem('token')
                    localStorage.removeItem('usuario')
                    localStorage.removeItem('tipo')
                    reject(err)
                })
            })
        },
        // esta accion nos saca
        logout({commit}){
            return new Promise((resolve,reject) => {
                localStorage.removeItem('token')
                localStorage.removeItem('usuario')
                localStorage.removeItem('tipo')
                commit('noauth')
                delete axios.defaults.headers.common['Authorization']
                resolve()
            })
        }                
    },
    getters: {
        isLoggedIn: state => !!state.token,
        authStatus: state => state.status,
        authUser: state => state.usuario,
        authTipo: state => state.tipo
    }
});




