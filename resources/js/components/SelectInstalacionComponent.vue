<template>
    <div class="row col-12">
        <div  class="col-6">
            <div class="form-group">
                <label>Instalaciones</label>
                <ValidationProvider name="Instalacion" rules="required" v-slot="{ errors }"> 
                    <!-- <select :class="['form-control', errors[0] ? 'is-invalid' : '']" v-model="id_instalacion" @change="mySelectEvent($event)">
                        <option v-for="(opcion,index) in opciones" :value="opcion.id">{{ opcion.text }}</option>
                    </select> -->
                    <select class="select2" multiple="multiple" data-placeholder="Seleccionar Instalaciones" style="width: 100%;">
                        <option v-for="(instalacion,index) in instalaciones" :value="instalacion._id">{{ instalacion.nombre }}</option>
                    </select>
                    <span :class="['error', 'invalid-feedback', errors[0] ? 'ver' : '']">{{ errors[0] }}</span>
                </ValidationProvider>
            </div>
        </div>
    </div>
    
</template>

<script>
    import Select2 from 'v-select2-component';
    import { ValidationProvider, ValidationObserver } from 'vee-validate/dist/vee-validate.full';
    
    export default {
        
        components: {Select2,ValidationProvider, ValidationObserver},
        data() {
            return {
                id_instalacion: '',
                instalaciones: [], // or [{id: key, text: value}, {id: key, text: value}]
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
                this.bandera = true;
                this.id_municipio = '';
                this.datos = {
                    id_estado: this.id_estado,
                    id_municipio: this.id_municipio
                }
                let municipio = this.selectMunicipio(this.id_estado);
                this.datosEstado(this.datos);

            },
            mySelectMunicipio(){
                
                
                this.datos = {
                    id_estado: this.id_estado,
                    id_municipio: this.id_municipio
                }
                this.datosEstado(this.datos);
            },
            datosEstado(datos) {
                console.log(datos);
                this.$emit('onSelectEstado', datos);
            },
            async selectMunicipio(id_municipio)
            {
                
                axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                await axios.get('http://localhost:3000/estado/municipios/'+id_municipio, {
                    headers: this.headers
                })
                .then(response => {
                    let municipios = response.data.municipio;

                    // para cada elemento, se crea un nuevo objeto con las nuevas propiedades.
                    municipios = municipios.map( item => { 
                    return { id: item._id , text : item.nombre }; 
                    });
                    this.lista_municipios = municipios;

                    
                })
                .catch(e => {
                    // Podemos mostrar los errores en la consola
                    console.log(e);
                })
            },
            selectInstalaciones()
            {

                axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                axios.get('http://localhost:8080/proyecto_fut-si/public/show-instalaciones')
                .then(response => {
                    this.instalaciones = response.data.instalacion;
                    console.log(this.instalaciones)
                    
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
                '$store.state.id_estado_municipio': function() {
                    console.log("cara de bolaaaaa lolaaaa");
                    console.log(this.$store.state.id_estado_municipio.id_estado);
                    console.log(this.$store.state.id_estado_municipio.id_municipio);
                this.id_estado = this.$store.state.id_estado_municipio.id_estado;
                this.id_municipio = this.$store.state.id_estado_municipio.id_municipio;
                this.datos = {
                    id_estado: this.id_estado,
                    id_municipio: this.id_municipio
                }
                this.selectMunicipio(this.id_estado);
                this.bandera = true;
                
            }
        },
        mounted(){
            this.selectInstalaciones();
            if(this.$store.state.id_estado_municipio==null)
            {
               
                this.id_estado = this.$store.state.id_estado_municipio.id_estado;
                this.id_municipio = this.$store.state.id_estado_municipio.id_municipio;

            }
        }
    }
</script>
