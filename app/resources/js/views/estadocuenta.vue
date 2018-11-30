<template>
    <div>
        <tabla-cuenta isCliente="true"></tabla-cuenta>
    </div>
</template>
<script>
import tabla from './cuenta'
export default {
    components:{
        'tabla-cuenta':tabla
    }
}
</script>
