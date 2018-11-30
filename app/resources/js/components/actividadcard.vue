<template>
    <div class="card text-left">
      <div class="card-body">
        <h4 class="card-title">{{actividad.nombre}}</h4>
        <p class="card-text">{{actividad.descripcion}}</p>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" v-bind:data-target="'#id'+actividad.nombre" @click="mdetalles">
          Ver Actividad
        </button>        
      </div>
    <!-- Modal -->
      <div class="modal fade" v-bind:id="'id'+actividad.nombre" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">{{actividad.nombre}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-8">
                    <p>{{actividad.descripcion}}
                    </p>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label for="horarios">Horarios Disponibles</label>
                      <select class="form-control" name="horarios" id="horarios">
                        <option v-for="horario in horarios" v-bind:key="horario.index" >{{horario.hinicio}} - {{horario.hfin}}</option>
                      </select>
                    </div>
                  </div>
                </div>  
              </div>
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
              <button type="button" class="btn btn-primary">Reservar lugar</button>
            </div>
          </div>
        </div>
      </div>      
    </div>    
</template>
<script>
var idAct = 0
export default {
  props:{
    'actividad':'',
    'idActividad':
    {
      default:null,
      validator:function(value){
        idAct = value
        return true
      }
    }
  },
  data(){
    return{
      localActividad:idAct,
      horarios:[]
    }
  },

  methods:{
    mdetalles(){
      // Recolectar las clases registradas para estas actividades
      axios.get('/api/actividad/'+this.localActividad+'/clases').then(res => {
        this.horarios = []
        let datos = res.data.data
        datos.forEach(element => {
          let registro = {
            'hinicio':element.hinicio,
            'hfin': element.hfin
          }
          this.horarios.push(registro)
        });

      }).catch(err => {
        swal({
          type:'error',
          title:'Error al consultar',
          text: 'Se produjo un error al realizar la consulta'
        })
      })
    }
  }  
}
</script>
