<template>
    <div class="row col-12">
        <div  class="col-12">
            <div class="form-group">
                <label>Tipo De Torneo</label>
                <ValidationProvider name="Tipo Torneo" rules="required" v-slot="{ errors }"> 
                    <select :class="['form-control', errors[0] ? 'is-invalid' : '']" v-model="id_tipo_torneo" @change="mySelectEvent($event)">
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
                id_tipo_torneo: '',
                opciones: [], // or [{id: key, text: value}, {id: key, text: value}]
                value: ["Perro"],
                headers: {
                    'Access-Control-Allow-Origin': '*',
                    'Content-Type': 'application/json',
                },
                bandera:false,
                datos:[]
            }
        },
        methods: {
            myChangeEvent(val){
                 
            }, 
            mySelectEvent(){
                this.$emit('onTipoTorneo', this.id_tipo_torneo);
            },
            async selectTiposTorneos()
            {
                
                axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                await axios.get('http://localhost:3000/tipos-torneos', {
                    headers: this.headers
                })
                .then(response => {
                    console.log(response);
                    this.opciones = response.data.tipos_torneos;
                    
                })
                .catch(e => {
                    // Podemos mostrar los errores en la consola
                    console.log(e);
                })
            },
        },
        watch: {
            '$store.state.id_tipo_torneo': function() {
                this.id_tipo_torneo = this.$store.state.id_tipo_torneo;
                console.log("el tipo torneo: "+this.id_tipo_torneo)
            }
        },
        computed: {
            validated() {
                return true
            },
        },
        mounted(){
            this.selectTiposTorneos();
        }
    }
</script>
