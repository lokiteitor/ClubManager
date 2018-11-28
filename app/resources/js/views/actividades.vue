<template>
    <!-- Listar las actividades con cards -->
    <div>
        <div v-for="n in 10">
            <actividad-carta></actividad-carta>
        </div>
    </div>
</template>
<script>
import actividadcard from './../components/actividadcard.vue'
export default {
    components:{
        'actividad-carta':actividadcard
    }
}
</script>
