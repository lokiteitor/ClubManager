<template>
    <!-- Listar las actividades con cards -->
    <div>
        <div class="col-md-12">     
            <div class="card-columns">
                <actividad-carta                                 
                v-for="actividad in actividades" 
                v-bind:key="actividad.id"
                v-bind:actividad="actividad"
                v-bind:nombre="actividad.nombre"
                v-bind:descripcion="actividad.descripcion"
                v-bind:idActividad="actividad.id"
                ></actividad-carta>                
                
            </div>
            
        </div>        
    </div>

</template>
<script>
import actividadcard from './../components/actividadcard.vue'
export default {
    created(){
        this.getData()
    },
    components:{
        'actividad-carta':actividadcard
    },
    data(){
        return{
            actividades: []
        }        
    },
    methods:{
        getData(){
            axios.get('/api/actividad').then(res => {
                this.actividades = res.data.data
            }).catch(err => {
                swal({
                    type: 'error',
                    title: 'Error en la consulta',
                    text: 'Error al consultar las actividades'
                })
            })
        }
    }
}
</script>
