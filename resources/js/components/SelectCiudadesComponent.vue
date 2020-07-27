<template>
    <div class="row col-12">
        <div  class="col-6">
            <div class="form-group">
                <label>Estado</label>
                <ValidationProvider name="Estado" rules="required" v-slot="{ errors }"> 
                    <select :class="['form-control', errors[0] ? 'is-invalid' : '']" v-model="id_estado" @change="mySelectEvent($event)">
                        <option v-for="(opciones,index) in myOptions" :value="opciones.id">{{ opciones.text }}</option>
                    </select>
                    <span :class="['error', 'invalid-feedback', errors[0] ? 'ver' : '']">{{ errors[0] }}</span>
                </ValidationProvider>
            </div>
            <!--<ValidationProvider name="Estado" rules="required" v-slot="{ errors }">
                <label>Estado</label>
                <Select2 name="estado" ref="select2" v-model="id_estado" :options="myOptions" :settings="{ settingOption: value, settingOption: value }" @change="myChangeEvent($event)" @select="mySelectEvent($event)" />
                <span :class="['error', 'invalid-feedback', errors[0] ? 'ver' : '']">{{ errors[0] }}</span>
            </ValidationProvider>-->
        </div>
        
        <div class="col-6">
            <label>Municipio</label>
            <ValidationProvider name="Municipio" rules="required" v-slot="{ errors }"> 
                <select ref="select_municipio" :class="['form-control', errors[0] ? 'is-invalid' : '']" :disabled="!bandera" v-model="id_municipio" @change="mySelectMunicipio($event)">
                    <option v-for="(opciones,index) in lista_municipios" :value="opciones.id">{{ opciones.text }}</option>
                </select>
                <span :class="['error', 'invalid-feedback', errors[0] ? 'ver' : '']">{{ errors[0] }}</span>
            </ValidationProvider>
            <!--<ValidationProvider name="Municipio" rules="required" v-slot="{ errors }">
                <label>Municipio</label>
                <Select2  name="municipio" :disabled="!bandera" v-model="id_municipio" :options="lista_municipios" :settings="{ settingOption: value, settingOption: value }" @select="mySelectEvent($event)" />
                <span :class="['error', 'invalid-feedback', errors[0] ? 'ver' : '']">{{ errors[0] }}</span>
            </ValidationProvider>-->
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
                id_estado: '',
                id_municipio:'',
                myOptions: [], // or [{id: key, text: value}, {id: key, text: value}]
                lista_municipios:[],
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
                console.log("cara de bola")
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
            selectEstados()
            {

                axios.defaults.headers.common['Access-Control-Allow-Origin'] = '*';
                axios.get('http://localhost:3000/estados', {
                    headers: this.headers
                })
                .then(response => {
                    let estados = response.data.estados;

                    // para cada elemento, se crea un nuevo objeto con las nuevas propiedades.
                    estados = estados.map( item => { 
                    return { id: item._id , text : item.nombre }; 
                    });

                    this.myOptions = estados;
                    
                    
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
            this.selectEstados();
            if(this.$store.state.id_estado_municipio==null)
            {
               
                this.id_estado = this.$store.state.id_estado_municipio.id_estado;
                this.id_municipio = this.$store.state.id_estado_municipio.id_municipio;

            }
        }
    }
</script>
