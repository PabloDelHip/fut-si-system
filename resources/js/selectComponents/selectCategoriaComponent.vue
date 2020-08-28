<template>
    <div class="row col-12">
        <div  class="col-12">
            <div class="form-group">
                <label>Categoria</label>
                <ValidationProvider name="Instalacion" rules="required" v-slot="{ errors }"> 
                    <select :class="['form-control', errors[0] ? 'is-invalid' : '']" v-model="id_categoria" @change="mySelectEvent($event)">
                        <option v-for="(opcion) in opciones" :key="opcion._id" :value="opcion._id">{{ opcion.titulo }}</option>
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
                id_categoria: '',
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
            mySelectEvent(){
                this.$emit('onCategoria', this.id_categoria);
            },
            async selectCategorias()
            {
                axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                await axios.get('http://localhost:8080/proyecto_fut-si/public/show-categorias')
                .then(response => {
                    this.opciones = response.data.categoria;
                    console.log(response.data.categoria);
                    
                })
                .catch(e => {
                    // Podemos mostrar los errores en la consola
                    console.log(e);
                })
            },
        },
        watch: {
            '$store.state.id_categoria': function() {
                this.id_categoria = this.$store.state.id_categoria;
            }
        },
        computed: {
            validated() {
                return true
            },
        },
        mounted(){
            this.selectCategorias();
        }
    }
</script>
