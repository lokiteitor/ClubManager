<template>
    <div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
	            <full-calendar :events="fcEvents" locale="en"></full-calendar>

            </div>
            <detalle-actividad></detalle-actividad>
        </div>
    </div>
</template>
<script>
import detalleactividad from './../components/detalleactividad.vue'

var demoEvents = [
	{
      title : 'Sunny Out of Office',
      start : '2016-08-25',
      end : '2017-07-27'
    }
]
export default {
  data () {
	return {
	  fcEvents : demoEvents
	}
  },
  components : {
    'full-calendar': require('vue-fullcalendar'),
    'detalle-actividad': detalleactividad
  }    
    
}
</script>

