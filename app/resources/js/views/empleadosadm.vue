<template>
    <div class="container">
        <div class="row">
            <!-- Registro y consulta de empleados -->               
            <div class="col-md-4 ">
                <registro-form tituloRegistro="Registrar Empleado" isRegistro='true'></registro-form>
            </div>
            <div class="col-md-8">
                <registro-form tituloRegistro="Modificar Empleado" isModificacion='true'></registro-form>
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
