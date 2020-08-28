<template>
    <div class="row col-12">
        <div  class="col-12">
            


            <div class="form-group">
                <label>Instalaciones</label>
                <!-- <ValidationProvider name="Instalacion" rules="required" v-slot="{ errors }">  -->
                    
                        <multiselect  v-model="value" @input="tag" tag-placeholder="Add this as new tag" placeholder="Seleccionar Instalaciones" label="nombre" track-by="_id" :options="options" :multiple="true" :taggable="true"></multiselect>
                        <!-- <pre class="language-json"><code>{{ value  }}</code></pre> -->
                    
                    <!-- <span :class="['error', 'invalid-feedback', errors[0] ? 'ver' : '']">{{ errors[0] }}</span>
                </ValidationProvider> -->
            </div>
        </div>
    </div>
    
</template>

<script>

    import { ValidationProvider, ValidationObserver } from 'vee-validate/dist/vee-validate.full';
    import Multiselect from 'vue-multiselect'
    export default {
        
        components: {Multiselect,ValidationProvider, ValidationObserver},
        data() {
            return {
                id_instalaciones: null,
                value: [],
                options: [],
                headers: {
                    'Access-Control-Allow-Origin': '*',
                    'Content-Type': 'application/json',
                },
                bandera:false,
                datos:[]
            }
        },
        methods: {
            tag (newTag,id) {

                this.$emit('onInstalaciones', this.value);
            },
            selectInstalaciones()
            {

                axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                axios.get('http://localhost:8080/proyecto_fut-si/public/show-instalaciones')
                .then(response => {
                    this.options = response.data.instalacion;
                    
                    
                })
                .catch(e => {
                    // Podemos mostrar los errores en la consola
                    console.log(e);
                })
            }
        },
        computed: {
            validated() {
                return true
            },
        },
        watch: {
            '$store.state.torneos_instalaciones': function() {
                this.value = this.$store.state.torneos_instalaciones;
                // console.log("aqui perrooooooooooooooooooooo");
                // console.log(this.value);
            }
            
        },
        mounted(){
            this.selectInstalaciones();
        }
    }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
