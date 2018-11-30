<template>
    <div>
        <br>
        <div class="row">
            <div class="col-md-4 col-lg-4 offset-md-4 offset-lg-4">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent>
                            <div class="form-group">
                              <label for="Iusuario">Usuario</label>
                              <input type="text" name="Iusuario" id="Iusuario" class="form-control" placeholder="Email" aria-describedby="helpId" v-model="usuario">
                              <small id="helpId" class="text-muted">Ingrese su correo electronico</small>
                            </div>
                            <div class="form-group">
                              <label for="Ipass">Contraseña</label>
                              <input type="password" name="Ipass" id="Ipass" class="form-control" placeholder="Password" aria-describedby="passA" v-model="password">
                              <small id="passA" class="text-muted">Ingrese su contraseña</small>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary btn-block" @click="login">Ingresar</button> 
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
	computed:{
		formData: function(){
			return {
				usuario: this.usuario,
				password: this.password
			}
		}
	},
	data(){
		return{
			password:null,
			usuario:null
		}
	},
	methods:{
		login(){

            this.$store.dispatch('login',this.formData).then(res => {
                if(this.$store.getters.isLoggedIn){
                    swal({
                        text:'Bienvenido',
                        onAfterClose:this.redirigir                     
                    }
                    )                
                }else{
                   swal({type: 'error',
  						title: 'Oops...',
                          text: '¡Usuario o Contraseña equivocados!'
  					})                     
                }
                this.password = null
                this.usuario = null
            }).catch(err => {
                   swal({type: 'error',
  						title: 'Oops...',
  						text: '¡Usuario o Contraseña equivocados!'
  					}) 
            })
        },
        redirigir(){
            // redirigir
            if(localStorage.getItem('tipo') == 'administrador'){
                this.$router.push('/administrador/clientes/cuenta')
            }
            else if(localStorage.getItem('tipo') == 'empleado'){
                this.$router.push('/administrador/clientes/cuenta')
            }
            else if(localStorage.getItem('tipo') == 'cliente'){
                this.$router.push('/actividades')
            }
            
        }        
	}
}
</script>

