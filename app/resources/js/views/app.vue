<template>
    <div class="container-fluid">
        <nav class="navbar navbar-expand-md navbar-light">
            <a class="navbar-brand" href="#">Club Manager</a>
            <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <router-link :to="{name:'actividades'}" class="nav-link" v-if="tipo == 'cliente' && isLoggedIn">Actividades</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name:'cuenta'}" class="nav-link" v-if="tipo == 'cliente' && isLoggedIn" >Cuenta</router-link>
                    </li>
 <!--                    <li class="nav-item">
                        <router-link :to="{name:'calendario'}" class="nav-link">Calendario</router-link>
                    </li> -->
                    <li class="nav-item">
                        <router-link :to="{name:'empleadosadm'}" class="nav-link" v-if="tipo != 'cliente' && isLoggedIn" >Empleados</router-link>
                    </li>
                    <div class="dropdown" v-if="tipo != 'cliente' && isLoggedIn">
                        <button class="btn btn-light dropdown-toggle" type="button" id="triggerCliente" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                    Clientes
                                </button>
                        <div class="dropdown-menu" aria-labelledby="triggerCliente">
                            <router-link :to="{name:'clientesadm'}" class="dropdown-item" href="#">Registrar y Modificar</router-link>
                            <router-link :to="{name:'clientecuenta'}" class="dropdown-item " href="#">Estado de cuenta</router-link>
                        </div>
                    </div>
                    <li class="nav-item">
                        <router-link :to="{name:'login'}" class="nav-link" v-if="!isLoggedIn">Login</router-link>
                    </li>                    
                    <li class="nav-item">
                        <a class="nav-link" @click="logout" v-if="isLoggedIn">Logout</a>
                    </li>                    
                </ul>


            </div>
        </nav>   
        <br>     
        <router-view ></router-view>         
    </div>
</template>
<script>
export default {
    computed: {
        isLoggedIn : function(){ return this.$store.getters.isLoggedIn},
        tipo : function(){return this.tipousuario}
    },
    data(){
        return{
            tipousuario: localStorage.getItem('tipo')
        }
    },
    methods: {
    logout: function () {
        this.$store.dispatch('logout')
        .then(() => {
        this.$router.push('/')
        }).catch(err => {
            console.log(err)
        })
    }
    },        
    
}
</script>

