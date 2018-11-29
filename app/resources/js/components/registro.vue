<template>
    <div class="card">
        <div class="card-header">            
            <form class="form-inline my-2 my-lg-0 d-flex justify-content-end" @submit.prevent>
                <div class="text-left">
                    <p>
                        {{tituloRegistro}}
                    </p>
                </div>
                <div class="d-flex justify-content-end" v-if="isModificacion">
                    <input class="form-control mr-sm-2" type="text" placeholder="Buscar" v-model="busqueda">
                    <button class="btn btn-outline-success my-2 my-sm-0"  type="submit" @click="buscar">Buscar</button>

                </div>
            </form>              
          
        </div>
        <div class="card-body">
            <form>
                <div class="form-group" v-if="isRegistro">
                  <label for="email">Email</label>
                  <input type="email" name="email" id="email" class="form-control" placeholder="Email" aria-describedby="Hemail" v-model="email">
                  <small id="Hemail" class="text-muted">Ingrese su correo electronico</small>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Nombre"
                        aria-describedby="Hnombre" v-model="nombre">
                    <small id="Hnombre" class="text-muted">Ingrese el nombre</small>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido" id="apellido" class="form-control" placeholder=""
                        aria-describedby="Hapellido" v-model="apellido">
                    <small id="Hapellido" class="text-muted">Ingrese el apellido paterno</small>
                </div>
                <div class="form-group">
                    <label for="apellidoM">Apellido Materno</label>
                    <input type="text" name="apellidoM" id="apellidoM" class="form-control" placeholder=""
                        aria-describedby="HapellidoM" v-model="apellidoM">
                    <small id="HapellidoM" class="text-muted">Ingrese el apellido materno</small>
                </div>
                <div class="form-group">
                    <label for="direccion">Direccion</label>
                    <input type="text" name="direccion" id="direccion" class="form-control" placeholder=""
                        aria-describedby="Hdireccion" v-model="direccion">
                    <small id="Hdireccion" class="text-muted">Ingrese la direccion</small>
                </div>
                <div class="form-group">
                    <label for="telefono">Telefono</label>
                    <input type="tel" name="telefono" id="telefono" class="form-control" placeholder=""
                        aria-describedby="Htelefono" v-model="telefono">
                    <small id="Htelefono" class="text-muted">Ingrese un numero telefonico</small>
                </div>
                <label v-if="!isCliente">Tipo de empleado</label>
                <div class="form-check" v-if="!isCliente">
                    <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="tipo" value="empleado" v-model="tipo">
                        Empleado
                    </label>
                </div>
                <div class="form-check" v-if="!isCliente">
                    <label class="form-check-label">
                        <input type="radio" name="tipo" class="form-check-input" value="administrador" v-model="tipo">
                        Administrador
                    </label>
                </div>
                <br>
                <label v-if="isModificacion">Modificar Contraseña</label>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="password"
                        aria-describedby="Hpassword" v-model="password">
                    <small id="Hpassword" class="text-muted">Ingrese su contraseña</small>
                </div>
                <div class="form-group">
                    <label for="Rpassword">Repita la contraseña</label>
                    <input type="password" name="Rpassword" id="Rpassword" class="form-control" placeholder="password"
                        aria-describedby="HRpassword" v-model="Rpassword">
                    <small id="HRpassword" class="text-muted">Ingrese nuevamente la constraseña</small>
                </div>
                <div class="form-group" v-if="isRegistro">
                    <button type="button" name="registrar" id="registrar" class="btn btn-primary btn-lg btn-block" @click="registrar">Registrar</button>
                </div>
                <div class="form-group d-flex justify-content-end" v-if="isModificacion">
                    <button type="button" class="btn btn-primary btn-lg" style="margin-right:1ex"  @click="modificar">Modificar</button>
                    <div></div>
                    <button type="button" class="btn btn-danger btn-lg" @click="borrar">Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</template>
<script>
var bolcliente = false
export default {
    props:{
    'tituloRegistro':'',
    'isModificacion':false,
    'isRegistro': false,
    'isCliente': {
        default: false,
        validator: function(value){
            bolcliente = value
            return true
        }
    }
    },
    data(){
        return  {
            email:null,
            nombre:null,
            apellido:null,
            apellidoM:null,
            direccion:null,
            telefono:null,            
            password:null,
            Rpassword:null,
            tipo:'cliente',
            usuario: [],
            busqueda: null,
            iscliente: bolcliente
        }        
    },
    computed:{
        registroData:function(){
            // revisar el tipo
            if(this.iscliente == "true"){
                this.tipo = "cliente"
            }
            return{
                email: this.email,
                nombre: this.nombre,
                ap_paterno: this.apellido,
                ap_materno: this.apellidoM,
                direccion: this.direccion,
                password: this.password,
                telefono: this.telefono,
                tipo: this.tipo
            }
        }        
    },
    methods:{
        registrar(){
            // TODO: validar que los password coincidan
            axios.post('/api/usuario',this.registroData).then(res => {
                swal(
                    'Registro exitoso',
                    'El usuario se registro exitosamente',
                    'success'
                )
                console.log("success")
            }).catch(err => {
                console.log("error")
                swal({
                    type: 'error',
                    title: 'Error durante el registro',
                    text: 'El registro del usuario fallo verifique los datos'
                })
            })
        },
        buscar(){
            axios.get(`/api/usuario/${this.busqueda}`,{params:{cliente:this.iscliente}}).then( res => {
                this.usuario = res.data.data
                this.email = this.usuario.email
                this.nombre = this.usuario.nombre
                this.apellido = this.usuario.ap_paterno
                this.apellidoM = this.usuario.ap_materno
                this.direccion = this.usuario.direccion
                this.telefono = this.usuario.telefono                
                this.password = this.usuario.password
                this.Rpassword = this.usuario.password
                this.tipo = this.usuario.tipo
            }).catch( err => {
                swal({
                    type: 'error',
                    title: 'Error durante la consulta',
                    text: 'La consulta del usuario fallo verifique los datos'
                })                
            })
        },
        modificar(){
            axios.patch(`/api/usuario/${this.busqueda}`,this.registroData).then( res => {
                this.usuario = res.data.data
                this.email = this.usuario.email
                this.nombre = this.usuario.nombre
                this.apellido = this.usuario.ap_paterno
                this.apellidoM = this.usuario.ap_materno
                this.direccion = this.usuario.direccion
                this.telefono = this.usuario.telefono                
                this.password = this.usuario.password
                this.Rpassword = this.usuario.password
                this.tipo = this.usuario.tipo
                swal({
                    type: 'success',
                    title: 'Modificacion exitosa',
                    text: 'El registro se ha actualizado correctamente'
                })
            }).catch( err => {
                swal({
                    type: 'error',
                    title: 'Error durante la modificacion',
                    text: 'La modificacion del usuario fallo verifique los datos'
                })                
            })            
        },
        borrar(){
            axios.delete('/api/usuario/'+this.busqueda).then(res => {
                swal({
                    type: 'success',
                    title: 'Usuario eliminado',
                    text: 'Usuario eliminado correctamente'
                })
            }).catch(err => {
                swal({
                    type: 'error',
                    title: 'Error al eliminar',
                    text: 'Error al eliminar el usuario'
                })
            })
        }
    }
}
</script>
