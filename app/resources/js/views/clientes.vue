<template>
    <div class="container">
        <div class="row">
            <!-- Registro y consulta de clientes -->               
            <div class="col-md-4 ">
                <registro-form isCliente="true" isRegistro="true" tituloRegistro="Registrar Cliente"></registro-form>
            </div>
            <div class="col-md-8">
                <registro-form isCliente="true" isModificacion="true" tituloRegistro="Consultar Cliente"></registro-form>
            </div>
        </div>
    </div>    
</template>
<script>
import registro from './../components/registro'
export default {
    components:{
        'registro-form':registro
    }
}
</script>
