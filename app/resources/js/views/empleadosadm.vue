<template>
    <div class="container">
        <div class="row">
            <!-- Registro y consulta de empleados -->               
            <div class="col-md-4 ">
                <registro-form></registro-form>
            </div>
            <div class="col-md-8">
                <registro-form></registro-form>
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
