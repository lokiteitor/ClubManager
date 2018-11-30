<template>
    <div class="container-fluid">
        <div class="row" v-if="!isCliente">
            <div class="col-md-8 offset-md-2 ">
                <form class="form-inline d-flux justify-content-end" @submit.prevent>
                    <div class="form-group" >
                        <input type="email" name="cliente" id="cliente" class="form-control" placeholder="Email" aria-describedby="Hcliente" v-model="clienteid">                        
                        <button class="btn btn-outline-success"  type="submit" @click="getData">Buscar</button>
                    </div>
                </form>                
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <table class="table table-striped table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Fecha</th>                        
                            <th scope="col">Concepto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in consumos" v-bind:key="item.index" scope="row">
                            <td>{{item.fecha}}</td>
                            <td>{{item.concepto}}</td>
                            <td>{{item.precio.toFixed(2)}}</td>
                            <td>{{item.cantidad}}</td>
                            <td>{{item.total.toFixed(2)}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</template>
<script>
export default {
    props:{
        'isCliente':{
            default:false
        }
    },    
    // TODO: Computar el clienteid cuando isCliente y haci cargar los datos en automatico
    data(){
        return{
            clienteid : '',
            consumos: [],
            inicio: null,
            fin: null,
            precio: null,
        }
    },
    methods:{
        getData(){
            axios.get('/api/usuario/'+this.clienteid+'/consumo').then(res => {
                let resp = res.data.data
                
                resp.forEach(element => {
                    let registro = {
                        'fecha':element.fecha,
                        'concepto':element.producto.nombre,
                        'precio': element.producto.precio,
                        'cantidad':element.cantidad,
                        'total':element.cantidad*element.producto.precio
                    }
                    this.consumos.push(registro)
                });



            }).catch(err => {
                swal({
                    type:'error',
                    title: 'Error',
                    text: 'Error al consultar los consumos'
                })
            })
        },
        pagar(){
            
        }
    }    
}
</script>
