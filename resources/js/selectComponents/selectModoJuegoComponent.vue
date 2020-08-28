<template>
    <div class="row col-12">
        <div  class="col-12">
            <div class="form-group">
                <label>Modo de juego del torneo</label>
                <ValidationProvider name="Modo de juego" rules="required" v-slot="{ errors }"> 
                    <select :class="['form-control', errors[0] ? 'is-invalid' : '']" v-model="id_modo_juego" @change="mySelectEvent($event)">
                        <option v-for="(opcion) in opciones" :key="opcion._id" :value="opcion._id">{{ opcion.nombre }}</option>
                    </select>
                    <span :class="['error', 'invalid-feedback', errors[0] ? 'ver' : '']">{{ errors[0] }}</span>
                </ValidationProvider>
            </div>
        </div>
    </div>
    
</template>

<script>
    import { ValidationProvider, ValidationObserver } from 'vee-validate/dist/vee-validate.full';
    
    export default {
        
        components: {ValidationProvider, ValidationObserver},
        data() {
            return {
                id_modo_juego: '',
                opciones: [], // or [{id: key, text: value}, {id: key, text: value}]
            }
        },
        methods: { 
            mySelectEvent(){
                this.$emit('onModoJuego', this.id_modo_juego);
            },
            async selectModoJuego()
            {
                axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                await axios.get('http://localhost:8080/proyecto_fut-si/public/modos_juego/show')
                .then(response => {
                    this.opciones = response.data.modos_juego;
                    console.log(response.data);
                    
                })
                .catch(e => {
                    // Podemos mostrar los errores en la consola
                    console.log(e);
                })
            },
        },
        watch: {
            '$store.state.id_modo_juego': function() {
                this.id_modo_juego = this.$store.state.id_modo_juego;
            }
        },
        mounted(){
            this.selectModoJuego();
        }
    }
</script>
