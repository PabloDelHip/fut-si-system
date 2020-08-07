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
                                        <label>Nombre del torneo</label>

                                        <ValidationProvider name="nombre" rules="required" v-slot="{ errors }">
                                            <input name="nombre" :class="['form-control', errors[0] ? 'is-invalid' : ''] " v-model="nombre"  type="text">
                                            <span class="error invalid-feedback">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>

                                 <div class="col-sm-6">
                                    <div class="form-group">
                                        <SelectInstalaciones></SelectInstalaciones>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Duración de cada tiempo</label>
                                        <small>(En minutos)</small>
                                        <ValidationProvider name="tiempo" rules="numeric|required" v-slot="{ errors }">
                                            <input type="text" :class="['form-control', errors[0] ? 'is-invalid' : ''] " v-model="duracion_tiempo" name="tiempo">
                                            <span class="error invalid-feedback">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Sexo</label>
                                        <ValidationProvider name="Instalacion" rules="required" v-slot="{ errors }"> 
                                            <select class="select2 form-control" data-placeholder="Seleccionar Sexo" style="width: 100%;">
                                                <option value="H">Hombre</option>
                                                <option value="M">Mujer</option>
                                                <option value="MX">Mixto</option>
                                            </select>
                                            <span :class="['error', 'invalid-feedback', errors[0] ? 'ver' : '']">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label>Fecha De Inicio del Torneo:</label>
                                        <ValidationProvider name="Fecha Inicio" rules="required" v-slot="{ errors }">
                                            <div class="input-group date" data-provide="datepicker">
                                                <input type="text" class="form-control form-control-sm" v-model="fecha_inicio" readonly>
                                                <div class="input-group-addon">
                                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span :class="['error', 'invalid-feedback', errors[0] ? 'ver' : '']">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label>Fecha Estimada De Finalización Del Torneo:</label>
                                        <ValidationProvider name="Fecha Inicio" rules="required" v-slot="{ errors }">
                                            <div class="input-group date" data-provide="datepicker">
                                                <input type="text" class="form-control form-control-sm" v-model="fecha_final_temporada" readonly>
                                                <div class="input-group-addon">
                                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span :class="['error', 'invalid-feedback', errors[0] ? 'ver' : '']">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <label>Fecha Limite de pagos:</label>
                                        <ValidationProvider name="Fecha Inicio" rules="required" v-slot="{ errors }">
                                            <div class="input-group date" data-provide="datepicker">
                                                <input type="text" class="form-control form-control-sm" v-model="fecha_limite_pagos" readonly>
                                                <div class="input-group-addon">
                                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span :class="['error', 'invalid-feedback', errors[0] ? 'ver' : '']">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>

                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Costo De Inscripción</label>
                                        <input type="text" v-model="costo_inscripcion" class="form-control" name="codigo_postal">
                                    </div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Costo De Albitraje</label>
                                        <ValidationProvider name="Telefono" rules="numeric" v-slot="{ errors }">
                                            <input type="text" :class="['form-control', errors[0] ? 'is-invalid' : ''] " v-model="telefono" name="telefono">
                                            <span class="error invalid-feedback">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>

                                <div class="col-sm-6"></div>

                                <div class="col-sm-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input v-model="lunes" class="custom-control-input" type="checkbox" id="_vestuarios" value="true">
                                            <label for="_vestuarios" class="custom-control-label">Lunes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input v-model="martes" class="custom-control-input" type="checkbox" id="_casacas" value="option1">
                                            <label for="_casacas" class="custom-control-label">Martes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input v-model="miercoles" class="custom-control-input" type="checkbox" id="_estacionamiento" value="option1">
                                            <label for="_estacionamiento" class="custom-control-label">Miercoles</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input v-model="jueves" class="custom-control-input" type="checkbox" id="_cafeteria" value="option1">
                                            <label for="_cafeteria" class="custom-control-label">Jueves</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input v-model="viernes" class="custom-control-input" type="checkbox" id="_restaurantes" value="option1">
                                            <label for="_restaurantes" class="custom-control-label">Viernes</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input v-model="sabado" class="custom-control-input" type="checkbox" id="_tiendas" value="option1">
                                            <label for="_tiendas" class="custom-control-label">Sabado</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input v-model="domingo" class="custom-control-input" type="checkbox" id="_tiendas" value="option1">
                                            <label for="_tiendas" class="custom-control-label">Domingo</label>
                                        </div>
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
                                </div> -->
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
    import SelectInstalaciones from './SelectInstalacionComponent';
    // import { required, email } from 'vee-validate/dist/rules';
    export default {
        props: ['id'],
        components: {SelectInstalaciones, ValidationObserver, ValidationProvider},
        data() {
            return{
                nombre: '',
                descripcion: '',
                duracion_tiempo: '',
                sexo_jugadores: '',
                fecha_inicio: '',
                fecha_final_temporada: '',
                fecha_limite_pagos: '',
                costo_inscripcion: '',
                costo_albitraje: '',
                notas:'',
                lunes: '',
                martes: '',
                miercoles: '',
                jueves: '',
                viernes: '',
                sabado: '',
                domingo: '',
                instalaciones: [],
                categoria: '',
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
                    // if(typeof this.direccion === 'undefined')
                    // {
                    //     this.direccion = '';
                    // }
                    ///////////////////////////////////////////
                    this.datos = [{
                        nombre: this.nombre,
                        descripcion: this.descripcion,
                        duracion_tiempo: this.duracion_tiempo,
                        sexo_jugadores: this.sexo_jugadores,
                        fecha_inicio: this.fecha_inicio,
                        fecha_final_temporada: this.fecha_final_temporada,
                        fecha_limite_pagos: this.fecha_limite_pagos,
                        costo_inscripcion: this.costo_inscripcion,
                        costo_albitraje: this.costo_albitraje,
                        notas: this.notas,
                        lunes: this.lunes,
                        martes: this.martes,
                        miercoles: this.miercoles,
                        jueves: this.jueves,
                        viernes: this.vienes,
                        sabado: this.sabado,
                        domingo: this.domingo,
                        instalaciones: this.instalaciones,
                        categoria: this.categoria,
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
                        // this.titulo = response.data.organizaciones[0].titulo;
                        // this.estado = response.data.organizaciones[0].estado_pais;
                        // this.municipio = response.data.organizaciones[0].municipio;
                        // this.direccion = response.data.organizaciones[0].direccion;
                        // this.codigo_postal = response.data.organizaciones[0].codigo_postal;
                        // this.telefono = response.data.organizaciones[0].telefono;
                        // this.celular = response.data.organizaciones[0].celular;
                        // this.email = response.data.organizaciones[0].email;
                        // this.sitio_web = response.data.organizaciones[0].sitio_web;
                        // this.notas = response.data.organizaciones[0].notas;

                        // this.$store.state.id_estado_municipio = {
                        //     id_estado: this.estado,
                        //     id_municipio: this.municipio
                        // };

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