<template>
    <div>
        <router-link :to="{name: 'ver_organizaciones'}" >Ver Organizaciones</router-link>
        
         <section class="content">
            <div class="container-fluid">
                <div class="row">

                <!-- right column -->
                <div class="col-md-8">
                    <!-- general form elements disabled -->
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Alta Organizaciones</h3>
                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <ValidationObserver v-slot="{ invalid, validate }" ref="observer">
                        <form role="form" @submit.prevent="validate().then(submit)">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Titulo de la organización</label>

                                        <ValidationProvider name="titulo" rules="required" v-slot="{ errors }">
                                            <input name="titulo" :class="['form-control', errors[0] ? 'is-invalid' : ''] " v-model="titulo"  type="text">
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
                                        <input type="text" v-model="direccion" class="form-control" name="direccion">
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Codigo Postal</label>
                                        <input type="text" v-model="codigo_postal" class="form-control" name="codigo_postal">
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
                                
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Texto Adicional</label>
                                        <textarea v-model="notas" class="form-control" rows="3" placeholder></textarea>
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
                                            Modificar Instalación
                                            <i v-if="show" class="fas fa-sync-alt fa-spin"></i>
                                        </button>
                                    </div>
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
    import { ValidationProvider, ValidationObserver } from 'vee-validate/dist/vee-validate.full';
    import SelectCiudades from './SelectCiudadesComponent';
    // import { required, email } from 'vee-validate/dist/rules';
    export default {
        props: ['id'],
        components: {SelectCiudades, ValidationObserver, ValidationProvider},
        data() {
            return{
                titulo: '',
                estado: '',
                municipio: '',
                horario: '',
                direccion: '',
                codigo_postal: '',
                telefono: '',
                celular: '',
                email: '',
                sitio_web:'',
                notas: '',
                show: false,
                bandera: true,
                bandera_modificar: false,
                bandera_guardar: true,
            }
        },
        methods: {
            SelectEstado(datos) {
                
                console.log("somo los estados man");
                console.log(datos);
                this.estado = datos.id_estado;
                this.municipio = datos.id_municipio;
                
            },
            async submit () {
                const isValid = await this.$refs.observer.validate();
                if (!isValid) {
                    alert("Verifique que el formulario fue llenado de forma correcta");  
                }
                else
                {
                    
                    
                    //////////////////////////////////////
                    if(typeof this.direccion === 'undefined')
                    {
                        this.direccion = '';
                    }

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

                    if(typeof this.notas === 'undefined')
                    {
                        this.notas = '';
                    }
                    ///////////////////////////////////////////
                    this.datos = [{
                        titulo: this.titulo,
                        estado: this.estado,
                        municipio: this.municipio,
                        direccion: this.direccion,
                        codigo_postal: this.codigo_postal,
                        telefono: this.telefono,
                        celular: this.celular,
                        email: this.email,
                        sitio_web: this.sitio_web,
                        notas: this.notas,
                    }];
                    this.show=true;
                    this.bandera = false;

                    if(this.bandera_guardar)
                    {
                        
                        axios.post('http://localhost:8080/proyecto_fut-si/public/save-organizaciones',
                        { datos: this.datos })
                        .then(response => {
                            console.log(response.data);
                            // let id_instalacion =  response.data.instalacion._id;
                        
                            let alerta = this.alertaConfirmacion();
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
                        
                        await axios.put('http://localhost:8080/proyecto_fut-si/public/update-organizacion/'+this.id,
                        { datos: this.datos })
                        .then(response => {
                            
                            let alerta = this.alertaConfirmacion();
                            this.show = false;
                            this.bandera = true;
                            
                        })
                        .catch(error => {
                            alert("Hay un error favor de volver a intentar");
                            
                            this.show = false;
                            this.bandera = true;
                        });
                    }
                    
                }
            },
            async alertaConfirmacion()
            {
               
                
                this.$swal.fire({
                    icon: 'success',
                    title: 'Bien',
                    text: 'Instalación guardada de forma correcta',
                    confirmButtonText: 'Continuar.'})
                    .then((result) => {
                    if (result.value) {
                        this.show = false;
                        this.bandera = true;
                        location.href ="http://localhost:8080/proyecto_fut-si/public/panel-fut-si/organizaciones";
                    }
                });
            },
            async showDateInstalacion()
            {
                if(this.id != null)
                {
                    await axios.get('http://localhost:8080/proyecto_fut-si/public/show-one-organizacion/'+this.id)
                    .then(response => {
                        console.log(response.data);
                        // this.$store.state.id_estado_municipio =[]
                        this.titulo = response.data.organizaciones[0].titulo;
                        this.estado = response.data.organizaciones[0].estado_pais;
                        this.municipio = response.data.organizaciones[0].municipio;
                        this.direccion = response.data.organizaciones[0].direccion;
                        this.codigo_postal = response.data.organizaciones[0].codigo_postal;
                        this.telefono = response.data.organizaciones[0].telefono;
                        this.celular = response.data.organizaciones[0].celular;
                        this.email = response.data.organizaciones[0].email;
                        this.sitio_web = response.data.organizaciones[0].sitio_web;
                        this.notas = response.data.organizaciones[0].notas;

                        this.$store.state.id_estado_municipio = {
                            id_estado: this.estado,
                            id_municipio: this.municipio
                        };

                    })
                    .catch(error => {
                        console.log(error);
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