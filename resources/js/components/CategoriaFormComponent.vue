<template>
    <div>
        <router-link :to="{name: 'ver_categorias'}" >Ver Categorias</router-link>
        
         <section class="content">
            <div class="container-fluid">
                <div class="row">

                <!-- right column -->
                <div class="col-md-8">
                    <!-- general form elements disabled -->
                    <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Alta Categoria</h3>
                        
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
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Edad Minima</label>
                                        <ValidationProvider name="Edad Minima" rules="numeric" v-slot="{ errors }">
                                            <input type="text" :class="['form-control', errors[0] ? 'is-invalid' : ''] " v-model="edad_minima" name="edad_minima">
                                            <span class="error invalid-feedback">{{ errors[0] }}</span>
                                        </ValidationProvider>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Edad Maxima</label>
                                        <ValidationProvider name="Edad Maxima" rules="numeric" v-slot="{ errors }">
                                            <input type="text" :class="['form-control', errors[0] ? 'is-invalid' : ''] " v-model="edad_maxima" name="edad_maxima">
                                            <span class="error invalid-feedback">{{ errors[0] }}</span>
                                        </ValidationProvider>
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
    // import { required, email } from 'vee-validate/dist/rules';
    export default {
        props: ['id'],
        components: {ValidationObserver, ValidationProvider},
        data() {
            return{
                titulo: '',
                edad_minima: 0,
                edad_maxima: 0,

                show: false,
                bandera: true,
                bandera_modificar: false,
                bandera_guardar: true,
            }
        },
        methods: {
            async submit () {
                const isValid = await this.$refs.observer.validate();
                if (!isValid) {
                    alert("Verifique que el formulario fue llenado de forma correcta");  
                }
                else
                {
                    if(Number(this.edad_minima) > Number(this.edad_maxima))
                    {
                        this.$swal.fire({
                            icon: 'warning',
                            title: 'Verificar edad',
                            text: 'La edad minima no puede ser mayor a la edad maxima',
                            confirmButtonText: 'Ok'})
                    }
                    else
                    {
                            //////////////////////////////////////
                        if(typeof this.edad_minima === 'undefined')
                        {
                            this.edad_minima = '';
                        }

                        if(typeof this.edad_maxima === 'undefined')
                        {
                            this.edad_maxima = '';
                        }
                        ///////////////////////////////////////////
                        this.datos = [{
                            titulo: this.titulo,
                            edad_minima: this.edad_minima,
                            edad_maxima: this.edad_maxima,
                        }];
                        this.show=true;
                        this.bandera = false;

                        if(this.bandera_guardar)
                        {
                            
                            axios.post('http://localhost:8080/proyecto_fut-si/public/save-categoria',
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
                            
                            await axios.put('http://localhost:8080/proyecto_fut-si/public/update-categoria/'+this.id,
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
                    
                }
            },
            async alertaConfirmacion()
            {
               
                
                this.$swal.fire({
                    icon: 'success',
                    title: 'Bien',
                    text: 'Categoria guardada de forma correcta',
                    confirmButtonText: 'Continuar.'})
                    .then((result) => {
                    if (result.value) {
                        this.show = false;
                        this.bandera = true;
                        location.href ="http://localhost:8080/proyecto_fut-si/public/panel-fut-si/categorias";
                    }
                });
            },
            async showCategoria()
            {
                if(this.id != null)
                {
                    
                    await axios.get('http://localhost:8080/proyecto_fut-si/public/show-one-categoria/'+this.id)
                    .then(response => {
                        console.log(response.data);
                        // this.$store.state.id_estado_municipio =[]
                        this.titulo = response.data.categoria[0].titulo;
                        this.edad_minima = response.data.categoria[0].edad_minima;
                        this.edad_maxima = response.data.categoria[0].edad_maxima;

                    })
                    .catch(error => {
                        console.log(error);
                        alert("error al cargar la información");
                        
                    });
                }
               
            }
        },
        created() {
            let info = this.showCategoria();
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