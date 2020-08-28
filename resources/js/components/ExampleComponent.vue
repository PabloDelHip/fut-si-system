<template>
    <div>
        <router-link :to="{name: 'ver_instalaciones'}" >Alta Instalaciones</router-link>
        
         <section class="content">
            <div class="container-fluid">
                <div class="row">

                <!-- right column -->
                <div class="col-md-8">
                    <!-- general form elements disabled -->
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Alta Instalaciones</h3>
                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <ValidationObserver v-slot="{  validate }" ref="observer">
                        <form role="form" @submit.prevent="validate().then(submit)">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Nombre de la instación</label>

                                        <ValidationProvider name="nombre" rules="required" v-slot="{ errors }">
                                            <input name="nombre" :class="['form-control', errors[0] ? 'is-invalid' : ''] " v-model="nombre"  type="text">
                                            <span class="error invalid-feedback">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                    

                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <SelectCiudades  @onSelectEstado="SelectEstado"></SelectCiudades>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Dirección</label>
                                        <ValidationProvider name="Direccion" rules="required" v-slot="{ errors }">
                                            <input type="text" :class="['form-control', errors[0] ? 'is-invalid' : ''] " v-model="direccion" name="direccion">
                                            <span class="error invalid-feedback">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Codigo Postal</label>
                                        <input type="text" v-model="codigo_postal" class="form-control" name="direccion">
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Telefono</label>
                                        <ValidationProvider name="Telefono" rules="numeric" v-slot="{ errors }">
                                            <input type="text" :class="['form-control', errors[0] ? 'is-invalid' : ''] " v-model="telefono" name="telefono">
                                            <span class="error invalid-feedback">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Celular</label>
                                        <ValidationProvider name="Telefono" rules="numeric" v-slot="{ errors }">
                                            <input type="text" :class="['form-control', errors[0] ? 'is-invalid' : ''] " v-model="celular" name="celular">
                                            <span class="error invalid-feedback">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <ValidationProvider name="Email" rules="email" v-slot="{ errors }">
                                        <label>Email</label>
                                        <input type="text" :class="['form-control', errors[0] ? 'is-invalid' : ''] " v-model="email" name="email">
                                        <span class="error invalid-feedback">{{ errors[0] }}</span>
                                    </ValidationProvider>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Sitio web</label>
                                        
                                        <ValidationProvider name="Sitio Web" :rules="{ regex: /^(http?:\/\/www\.|https?:\/\/www\.|http?:\/\/|https?:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/ }" v-slot="{ errors }">
                                            <input type="text" :class="['form-control', errors[0] ? 'is-invalid' : ''] " v-model="sitio_web" name="sitio_web">
                                            <span class="error invalid-feedback">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>
                                <!--GOOGLE MAPS URL -->
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <GoogleMap :datosLat="latitud" :datosLng="longitud" @onLatLng="selectLatLng"></GoogleMap>
                                    </div>
                                </div>
                                <!--GOOGLE MAPS URL FIN-->


                                <div class="col-sm-4">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input v-model="vesturios" class="custom-control-input" type="checkbox" id="_vestuarios" value="true">
                                            <label for="_vestuarios" class="custom-control-label">Vesturios</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input v-model="camisetas" class="custom-control-input" type="checkbox" id="_casacas" value="option1">
                                            <label for="_casacas" class="custom-control-label">Casacas</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input v-model="estacionamiento" class="custom-control-input" type="checkbox" id="_estacionamiento" value="option1">
                                            <label for="_estacionamiento" class="custom-control-label">Estacionamiento</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input v-model="cafeteria" class="custom-control-input" type="checkbox" id="_cafeteria" value="option1">
                                            <label for="_cafeteria" class="custom-control-label">Cafeteria</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input v-model="restaurante" class="custom-control-input" type="checkbox" id="_restaurantes" value="option1">
                                            <label for="_restaurantes" class="custom-control-label">Restaurantes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input v-model="tiendas" class="custom-control-input" type="checkbox" id="_tiendas" value="option1">
                                            <label for="_tiendas" class="custom-control-label">Tiendas</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Texto Adicional</label>
                                        <textarea v-model="notas" class="form-control" rows="3" placeholder></textarea>
                                    </div>
                                </div>

                               <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Imagenes de las instalaciones</label>
                                        <UploadImage @onImage="SelectImage"></UploadImage>
                                        <!--COMPONENTE IMAGENES-->
                                    </div>
                                 </div> 
                            </div>
                            <div class="col-12 row" v-if="bandera_guardar">
                                <div class="col-4">
                                    <button type="submit" :disabled="!bandera" class="btn btn-block btn-success">
                                        Guardar Instalación
                                        <i v-if="show" class="fas fa-sync-alt fa-spin"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12 row" v-if="bandera_modificar">
                                <div class="col-4">
                                    <button type="submit" :disabled="!bandera" class="btn btn-block btn-success">
                                        Modificar Instalación {{  }}
                                        <i v-if="show" class="fas fa-sync-alt fa-spin"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                        </ValidationObserver>
                    </div>
                    <!-- /.card-body -->
                    </div>
                </div>
                <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    <!-- /.content -->
        
    </div>
    
</template>

<script>
    import GoogleMap from './GoogleMapComponent';
    import SelectCiudades from './SelectCiudadesComponent';
    import UploadImage from './UploadImageComponent';
    import { ValidationProvider, ValidationObserver } from 'vee-validate/dist/vee-validate.full';
    
    // import { required, email } from 'vee-validate/dist/rules';
    export default {
        props: ['id'],
        components: {SelectCiudades,GoogleMap, ValidationProvider, ValidationObserver,UploadImage},
        data() {
            return{
                value: '',
                nombre: '',
                estado: '',
                municipio: '',
                direccion: '',
                codigo_postal: '',
                telefono: '',
                celular: '',
                email: '',
                sitio_web: '',
                latitud: '',
                longitud: '',
                vesturios: false,
                camisetas: false,
                estacionamiento: false,
                cafeteria: false,
                restaurante: false,
                tiendas: false,
                notas: '',
                imagenes: [],
                datos: [],
                index:0,
                show: false,
                bandera: true,
                bandera_modificar: false,
                bandera_guardar: true,
                estado_municipio: [],
                imagenes: []
                
            }
        },
        methods: {
            selectLatLng(datos) {
                this.latitud = datos.latitud;
                this.longitud = datos.longitud;
                
                
            },
            SelectEstado(datos) {
                
                console.log("somo los estados man");
                console.log(datos);
                this.estado = datos.id_estado;
                this.municipio = datos.id_municipio;
                
            },
            SelectImage(datos,index) {
                this.imagenes = datos;
                this.index = index;
            },
            async submit () {
                const isValid = await this.$refs.observer.validate();
                if (!isValid) {
                    alert("Verifique que el formulario fue llenado de forma correcta");  
                }
                else
                {
                    
                    
                    //////////////////////////////////////
                    if(typeof this.codigo_postal === 'undefined')
                    {
                        this.codigo_postal = '';
                    }
                    if(typeof this.telefono === 'undefined')
                    {
                        this.telefono = '';
                    }
                    if(typeof this.celular === 'undefined')
                    {
                        this.celular = '';
                    }
                    if(typeof this.email === 'undefined')
                    {
                        this.email = '';
                    }
                    if(typeof this.sitio_web === 'undefined')
                    {
                        this.sitio_web = '';
                    }
                    if(typeof this.latitud === 'undefined')
                    {
                        this.latitud = '';
                        this.longitud = '';
                    }
                    if(typeof this.notas === 'undefined')
                    {
                        this.notas = '';
                    }
                    if(typeof this.vesturios === 'undefined')
                    {
                        this.vesturios = false;
                    }
                    if(typeof this.camisetas === 'undefined')
                    {
                        this.camisetas = false;
                    }
                    if(typeof this.estacionamiento === 'undefined')
                    {
                        this.estacionamiento = false;
                    }
                    if(typeof this.cafeteria === 'undefined')
                    {
                        this.cafeteria = false;
                    }
                    if(typeof this.restaurante === 'undefined')
                    {
                        this.restaurante = false;
                    }
                    if(typeof this.tiendas === 'undefined')
                    {
                        this.tiendas = false;
                    }
                    ///////////////////////////////////////////
                    this.datos = [{
                        nombre: this.nombre,
                        estado: this.estado,
                        municipio: this.municipio,
                        direccion: this.direccion,
                        codigo_postal: this.codigo_postal,
                        telefono: this.telefono,
                        celular: this.celular,
                        email: this.email,
                        sitio_web: this.sitio_web,
                        latitud: this.latitud,
                        longitud: this.longitud,
                        vesturios: this.vesturios,
                        camisetas: this.camisetas,
                        estacionamiento: this.estacionamiento,
                        cafeteria: this.cafeteria,
                        restaurante: this.restaurante,
                        tiendas: this.tiendas,
                        notas: this.notas,
                    }];
                    this.show=true;
                    this.bandera = false;

                    if(this.bandera_guardar)
                    {
                        
                        axios.post('http://localhost:8080/proyecto_fut-si/public/save-instalaciones ',
                        { datos: this.datos })
                        .then(response => {
                            //console.log(response.data);
                            let id_instalacion =  response.data.instalacion._id;
                        
                            let alerta = this.alertaConfirmacion(id_instalacion);
                            this.show = false;
                            this.bandera = true;
                            
                        })
                        .catch(error => {
                            console.log(error);
                            alert("Hay un error al momento de guardar");
                            
                            this.show = false;
                            this.bandera = true;
                        });
                    }
                    else
                    {
                        
                        axios.delete('http://localhost:3000/imagenes-instalaciones/'+this.id)
                        .then(response => {
                            let update = this.updateInstalacion();
                        })
                        .catch(error => {
                            alert("Hay un error al de eliminar imagenes");
                            
                            this.show = false;
                            this.bandera = true;
                        });
                    }
                    
                }
            },
            async updateInstalacion()
            {
                await axios.put('http://localhost:8080/proyecto_fut-si/public/update-instalacion/'+this.id,
                { datos: this.datos })
                .then(response => {
                    
                    let alerta = this.alertaConfirmacion(this.id);
                    this.show = false;
                    this.bandera = true;
                    
                })
                .catch(error => {
                    alert("Hay un error favor de volver a intentar");
                    
                    this.show = false;
                    this.bandera = true;
                });
            },
            async alertaConfirmacion (id_instalacion)
            {
                let images = [];
                this.index = this.imagenes.length;
                
                for(var i=0; i < this.index; i++)
                {
                    
                    
                    if (typeof this.imagenes[i].path !== 'undefined') {
                       
                        images.push({path: this.imagenes[i].path});

                        await axios.post('http://localhost:8080/proyecto_fut-si/public/save-imagenes-instalaciones',
                                { datos: images[i],
                                    id_instalacion  })
                                .then((response) => {
                                    
                                }).catch((error) => {
                                
                                    console.log(error.response);
                                });
                    }
                    
                    
                }
                
                this.$swal.fire({
                    icon: 'success',
                    title: 'Bien',
                    text: 'Instalación guardada de forma correcta',
                    confirmButtonText: 'Continuar.'})
                    .then((result) => {
                    if (result.value) {
                        this.show = false;
                        this.bandera = true;
                        location.href ="http://localhost:8080/proyecto_fut-si/public/panel-fut-si/instalaciones";
                    }
                });
            },
            async showDateInstalacion()
            {
                if(this.id != null)
                {
                    await axios.get('http://localhost:3000/instalacion/'+this.id)
                    .then(response => {
                        console.log("chido perro");
                        console.log(response.data.instalacion[0]);
                        this.$store.state.id_estado_municipio =[]
                        this.$store.state.datos_lat = '';
                        this.$store.state.datos_lng = '';

                        
                        this.nombre = response.data.instalacion[0].nombre;
                        this.estado = response.data.instalacion[0].estado_pais;
                        this.municipio = response.data.instalacion[0].municipio;
                        this.direccion = response.data.instalacion[0].direccion;
                        this.codigo_postal = response.data.instalacion[0].codigo_postal;
                        this.telefono = response.data.instalacion[0].telefono;
                        this.celular = response.data.instalacion[0].celular;
                        this.email = response.data.instalacion[0].email;
                        this.sitio_web = response.data.instalacion[0].sitio_web;
                        this.latitud = response.data.instalacion[0].latitud_map;
                        this.longitud = response.data.instalacion[0].longitud_map;
                        this.vesturios = response.data.instalacion[0].vesturios;
                        this.camisetas = response.data.instalacion[0].camisetas;
                        this.estacionamiento = response.data.instalacion[0].estacionamiento;
                        this.cafeteria = response.data.instalacion[0].cafeteria;
                        this.restaurante = response.data.instalacion[0].restaurante;
                        this.tiendas = response.data.instalacion[0].tiendas;
                        this.notas = response.data.instalacion[0].notas;

                        this.$store.state.id_estado_municipio = {
                            id_estado: this.estado,
                            id_municipio: this.municipio
                        };
                        console.log(this.$store.state.id_estado_municipio);
                        this.$store.state.datos_lat = response.data.instalacion[0].latitud_map;
                        this.$store.state.datos_lng = response.data.instalacion[0].longitud_map;

                        axios.get('http://localhost:3000/imagenes-instalaciones/'+this.id)
                        .then(response => {
                            this.$store.state.images_instalaciones = response.data;
                            

                        })
                        .catch(error => {
                            alert("error al cargar las imagenes")
                            console.log(error.response); 
                        });
                        

                    })
                    .catch(error => {
                        alert("error al cargar la información");
                        
                    });
                }
               
            }
        },
        created() {
            let info = this.showDateInstalacion();
        },
        mounted() {
            
            if(this.id != null)
            {
                this.bandera_modificar = true;
                this.bandera_guardar = false;
            }

            
        }
    }
</script>
<style>

.ver{
    display: block !important;
}
</style>