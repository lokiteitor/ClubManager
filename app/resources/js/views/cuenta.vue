<template>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Registrar pago
                    </div>
                    <div class="card-body">
                        <form class="form-inline" >
                            <div class="form-group" style="margin-right:2ex" >
                                <label for="inicio">Inicio: </label>
                                <input type="date" name="inicio" id="inicio" class="form-control" aria-describedby="Hinicio">                                
                            </div>

                            <div class="form-group" style="margin-right:2ex" >
                              <label for="fin">Fin: </label>
                              <input type="date" name="fin" id="fin" class="form-control" aria-describedby="Hfin">                              
                            </div>
                            <div class="form-group">
                              <label for="cantidad">Cantidad</label>
                              <input type="text" name="cantidad" id="cantidad" class="form-control"  >     
                            </div>
                            <div></div>
                            <div class="form-group justify-content-end" style="margin-left:2em">
                                <button type="button" class="btn btn-lg btn-success">Pagar</button>
                            </div>
                        </form>   
                    </div>
                </div> 
            </div>
        </div>
        <br>
        <tabla-cuenta></tabla-cuenta>
    </div>
</template>
<script>
import tabla from './../components/tablacuenta'
export default {
    components:{
        'tabla-cuenta':tabla
    }
}
</script>
